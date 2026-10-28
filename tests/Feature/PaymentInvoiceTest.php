<?php

namespace Tests\Feature;

use App\Http\Livewire\PaymentValidation;
use App\Mail\SendMail;
use App\Models\Participant;
use App\Models\Payment;
use App\Models\UploadAbstract;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Mockery;
use Tests\TestCase;

class PaymentInvoiceTest extends TestCase
{
    private User $administrator;
    private Participant $presenter;

    protected function setUp(): void
    {
        parent::setUp();

        config(['database.default' => 'sqlite', 'database.connections.sqlite.database' => ':memory:',
            'filesystems.storage' => 'public']);
        DB::purge('sqlite');
        Carbon::setTestNow('2026-10-28 12:00:00');
        Mail::fake();

        (require database_path('migrations/2014_10_12_000000_create_users_table.php'))->up();
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('full_name1');
            $table->string('institution');
            $table->string('participant_type');
            $table->string('attendance');
            $table->timestamps();
        });
        (require database_path('migrations/2023_08_02_155503_create_upload_abstracts_table.php'))->up();
        (require database_path('migrations/2023_08_06_220350_create_payments_table.php'))->up();

        // Receipt numbering uses this MySQL function; production remains on MySQL.
        DB::connection()->getPdo()->sqliteCreateFunction('SUBSTRING_INDEX', static function ($value, $delimiter, $count) {
            $parts = explode($delimiter, $value);
            return implode($delimiter, $count >= 0 ? array_slice($parts, 0, $count) : array_slice($parts, $count));
        }, 3);

        $this->administrator = $this->user('administrator', 'invoice-admin@example.test');
        $this->presenter = Participant::create(['user_id' => $this->user('participant', 'invoice-presenter@example.test')->id,
            'full_name1' => 'Invoice Test Presenter', 'institution' => 'Test University',
            'participant_type' => 'presenter_reguler', 'attendance' => 'online']);
    }

    protected function tearDown(): void
    {
        Carbon::setTestNow();
        parent::tearDown();
    }

    private function user(string $role, string $email): User
    {
        $user = User::create(['role' => $role, 'email' => $email, 'password' => 'test-password']);
        $user->forceFill(['email_verified_at' => now()])->save();
        return $user;
    }

    private function payment(string $title, ?string $invoice, bool $withAbstract = true): Payment
    {
        $abstract = $withAbstract ? UploadAbstract::create(['participant_id' => $this->presenter->id,
            'topic' => 'engineering', 'type' => 'oral presentation', 'title' => $title,
            'authors' => 'Invoice Test Presenter', 'institutions' => 'Test University',
            'abstract' => 'Test abstract.', 'keywords' => 'test', 'presenter' => 'Invoice Test Presenter',
            'status' => 'accepted', 'invoice' => $invoice]) : null;

        return Payment::create(['participant_id' => $this->presenter->id, 'upload_abstract_id' => $abstract?->id,
            'fee' => 'IDR 500.000', 'discount' => '0', 'fee_after_discount' => 'IDR 500.000',
            'total_bill' => 'IDR 500.000', 'proof_of_payment' => 'proofs/'.$title.'.jpg',
            'validation' => 'not yet validated']);
    }

    private function invoiceLinks(string $html): array
    {
        $document = new \DOMDocument();
        $previous = libxml_use_internal_errors(true);
        $document->loadHTML($html);
        libxml_clear_errors();
        libxml_use_internal_errors($previous);

        $links = [];
        foreach ((new \DOMXPath($document))->query('//a[starts-with(@aria-label, "View invoice for abstract #")]') as $link) {
            $links[$link->getAttribute('aria-label')] = $link->getAttribute('href');
            $this->assertSame('_blank', $link->getAttribute('target'));
            $this->assertStringContainsString('noopener', $link->getAttribute('rel'));
        }
        return $links;
    }

    public function test_list_links_each_payment_to_its_own_abstract_invoice(): void
    {
        $first = $this->payment('First abstract', 'invoice/custom-issued-first.pdf');
        $second = $this->payment('Second abstract', 'invoice/custom-issued-second.pdf');
        $this->payment('No invoice yet', null);
        $this->payment('Participant registration', null, false);

        $component = Livewire::actingAs($this->administrator)->test(PaymentValidation::class)
            ->assertSee('Invoice not available');

        $this->assertSame([
            'View invoice for abstract #'.$first->upload_abstract_id => asset('storage/invoice/custom-issued-first.pdf'),
            'View invoice for abstract #'.$second->upload_abstract_id => asset('storage/invoice/custom-issued-second.pdf'),
        ], $this->invoiceLinks($component->lastRenderedDom));
        Mail::assertNothingOutgoing();
    }

    public function test_detail_keeps_the_correct_invoice_and_proof_after_hydration_and_switching_payments(): void
    {
        $first = $this->payment('First abstract', 'invoice/first.pdf');
        $second = $this->payment('Second abstract', 'invoice/second.pdf');
        $missing = $this->payment('Missing invoice', '');
        $participant = $this->payment('Participant registration', null, false);

        $component = Livewire::actingAs($this->administrator)->test(PaymentValidation::class)
            ->call('showDetail', $first->id)->assertSet('paymentValidate', $first->id)
            ->assertSee('Abstract #'.$first->upload_abstract_id.': First abstract')
            ->assertSee(asset('storage/'.$first->proof_of_payment), false)
            ->set('fee', '500000')->set('discount', '50000')->assertSet('total_bill', 'IDR 450000 / $27.27 USD');
        $this->assertSame(['View invoice for abstract #'.$first->upload_abstract_id => asset('storage/invoice/first.pdf')],
            $this->invoiceLinks($component->lastRenderedDom));

        $component->call('back')->call('showDetail', $second->id)
            ->assertSee(asset('storage/'.$second->proof_of_payment), false)->assertDontSee('invoice/first.pdf');
        $this->assertSame(['View invoice for abstract #'.$second->upload_abstract_id => asset('storage/invoice/second.pdf')],
            $this->invoiceLinks($component->lastRenderedDom));

        $component->call('back')->call('showDetail', $missing->id)->assertSee('Invoice not available for this abstract.');
        $this->assertSame([], $this->invoiceLinks($component->lastRenderedDom));
        $component->call('back')->call('showDetail', $participant->id)->assertSee('Participant registration has no abstract invoice.');
        $this->assertSame([], $this->invoiceLinks($component->lastRenderedDom));
        $this->assertSame('not yet validated', $first->fresh()->validation);
        $this->assertSame('IDR 500.000', $first->fresh()->total_bill);
        Mail::assertNothingOutgoing();
    }

    public function test_payment_review_page_still_requires_an_administrator(): void
    {
        $this->get('/payment-validation')->assertRedirect('/login');
        $this->actingAs($this->presenter->user)->get('/payment-validation')->assertForbidden();
        $this->actingAs($this->administrator)->get('/payment-validation')->assertOk()->assertSee('Verify Payments');
    }

    public function test_existing_confirmation_flow_still_validates_only_the_selected_payment(): void
    {
        Storage::fake('public');
        $pdf = Mockery::mock(\Barryvdh\DomPDF\PDF::class);
        $pdf->shouldReceive('setPaper')->andReturnSelf();
        $pdf->shouldReceive('setOptions')->andReturnSelf();
        $pdf->shouldReceive('output')->andReturn('%PDF-1.4 test receipt');
        \PDF::shouldReceive('loadView')->andReturn($pdf);

        $selected = $this->payment('Selected abstract', 'invoice/selected.pdf');
        $other = $this->payment('Other abstract', 'invoice/other.pdf');
        Livewire::actingAs($this->administrator)->test(PaymentValidation::class)
            ->call('showDetail', $selected->id)->set('fee', '500000')->set('discount', '50000')
            ->call('showValidate')->assertDispatchedBrowserEvent('show-modal')
            ->call('valid')->assertDispatchedBrowserEvent('validation-success')->assertSet('validation', false);

        $this->assertSame('valid', $selected->fresh()->validation);
        $this->assertSame('IDR 450000 / $27.27 USD', $selected->fresh()->total_bill);
        $this->assertSame('invoice/selected.pdf', $selected->uploadAbstract->invoice);
        $this->assertSame('not yet validated', $other->fresh()->validation);
        Storage::disk('public')->assertExists($selected->fresh()->receipt_path);
        Mail::assertQueued(SendMail::class);
        Mail::assertQueuedCount(1);
    }

    public function test_existing_rejection_flow_keeps_the_invoice_and_other_payments_unchanged(): void
    {
        $selected = $this->payment('Selected abstract', 'invoice/selected.pdf');
        $other = $this->payment('Other abstract', 'invoice/other.pdf');
        Livewire::actingAs($this->administrator)->test(PaymentValidation::class)
            ->call('showDetail', $selected->id)->call('invalid')
            ->assertDispatchedBrowserEvent('validation-success')->assertSet('validation', false);

        $this->assertSame('invalid', $selected->fresh()->validation);
        $this->assertSame('invoice/selected.pdf', $selected->uploadAbstract->invoice);
        $this->assertSame('not yet validated', $other->fresh()->validation);
        Mail::assertSent(SendMail::class);
        Mail::assertSentCount(1);
    }
}
