<?php

namespace Tests\Feature;

use App\Http\Livewire\PaymentPage;
use App\Http\Livewire\ReviewAbstract;
use App\Models\Participant;
use App\Models\Payment;
use App\Models\UploadAbstract;
use App\Models\User;
use App\Support\RegistrationVoucher;
use Carbon\Carbon;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class RegistrationVoucherTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        config(['database.default' => 'sqlite', 'database.connections.sqlite.database' => ':memory:']);
        DB::purge('sqlite');
        Carbon::setTestNow('2026-10-03 12:00:00');

        (require database_path('migrations/2014_10_12_000000_create_users_table.php'))->up();
        Schema::table('users', fn (Blueprint $table) => $table->string('voucher')->nullable());
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('participant_type');
            $table->string('attendance');
            $table->string('full_name1');
            $table->string('institution');
            $table->timestamps();
        });
        (require database_path('migrations/2023_08_02_155503_create_upload_abstracts_table.php'))->up();
        (require database_path('migrations/2023_08_06_220350_create_payments_table.php'))->up();
        (require database_path('migrations/2026_08_01_000001_create_fees_table.php'))->up();
        DB::table('fees')->delete();

        foreach ([['regular', 'presenter', 400000, 500000, 30],
            ['student', 'presenter', 300000, 300000, 30],
            ['regular', 'participant', 100000, 100000, 20],
            ['student', 'participant', 50000, 50000, 7]] as [$type, $category, $early, $regular, $usd]) {
            foreach ([true, false] as $earlyWindow) {
                DB::table('fees')->insert([
                    'participant_type' => $type, 'category' => $category,
                    'early_bird' => $type === 'regular' && $category === 'presenter' && $earlyWindow,
                    'payment_start' => $earlyWindow ? '2026-09-30' : '2026-10-16',
                    'payment_end' => $earlyWindow ? '2026-10-15' : '2026-11-07',
                    'fee_idr_online' => $earlyWindow ? $early : $regular,
                    'fee_usd_online' => $usd, 'fee_idr_offline' => $earlyWindow ? $early : $regular,
                    'fee_usd_offline' => $usd,
                ]);
            }
        }
    }

    protected function tearDown(): void
    {
        Carbon::setTestNow();
        parent::tearDown();
    }

    private function participantUser(?string $voucher, string $type = 'participant_reguler'): User
    {
        $user = User::create(['email' => 'voucher-test@example.test', 'password' => 'test-password', 'role' => 'participant']);
        $user->voucher = $voucher;
        $user->save();
        Participant::create(['user_id' => $user->id, 'participant_type' => $type, 'attendance' => 'online',
            'full_name1' => 'Voucher Test', 'institution' => 'Test University']);

        return $user;
    }

    private function voucherInputIsDisabled(string $html): bool
    {
        $document = new \DOMDocument();
        $previous = libxml_use_internal_errors(true);
        $document->loadHTML($html);
        libxml_clear_errors();
        libxml_use_internal_errors($previous);

        return (new \DOMXPath($document))->query('//*[@id="voucher"]')->item(0)->hasAttribute('disabled');
    }

    public function test_a_legacy_voucher_does_not_block_redeeming_the_2026_code(): void
    {
        $user = $this->participantUser('JICEST2025FST50RB');
        $component = Livewire::actingAs($user)->test(PaymentPage::class)
            ->assertSee('Your saved voucher is from a previous conference.');
        $this->assertFalse($this->voucherInputIsDisabled($component->lastRenderedDom));

        $component->set('voucher', '  jicest2026fst50rb  ')->call('redeem')
            ->assertDispatchedBrowserEvent('voucher-success')
            ->assertSet('voucher', '');

        $this->assertSame('JICEST2026FST50RB', $user->fresh()->voucher);
        $this->assertTrue($this->voucherInputIsDisabled($component->lastRenderedDom));
    }

    public function test_old_and_unknown_codes_are_rejected_without_overwriting_the_saved_voucher(): void
    {
        $user = $this->participantUser('JICEST2025FST50RB');
        $component = Livewire::actingAs($user)->test(PaymentPage::class);

        foreach (['JICEST2025FST50RB', 'JICEST2026INVALID'] as $code) {
            $component->set('voucher', $code)->call('redeem')->assertDispatchedBrowserEvent('voucher-error');
            $this->assertSame('JICEST2025FST50RB', $user->fresh()->voucher);
        }
    }

    public static function discountedRates(): array
    {
        return [
            ['presenter_reguler', '2026-10-03', 'IDR 350.000 / $25.0 USD'],
            ['presenter_reguler', '2026-10-16', 'IDR 450.000 / $25.0 USD'],
            ['presenter_student', '2026-10-03', 'IDR 250.000 / $25.0 USD'],
            ['participant_reguler', '2026-10-03', 'IDR 50.000 / $15.0 USD'],
            ['participant_student', '2026-10-03', 'IDR 0 / $2.0 USD'],
        ];
    }

    public function test_non_text_voucher_input_is_rejected_by_validation(): void
    {
        $user = $this->participantUser('JICEST2025FST50RB');
        Livewire::actingAs($user)->test(PaymentPage::class)
            ->set('voucher', ['JICEST2026FST50RB'])->call('redeem')
            ->assertHasErrors(['voucher' => 'string']);

        $this->assertSame('JICEST2025FST50RB', $user->fresh()->voucher);
    }

    #[DataProvider('discountedRates')]
    public function test_current_database_rates_receive_the_voucher_discount(string $type, string $date, string $total): void
    {
        Carbon::setTestNow($date . ' 12:00:00');
        $user = $this->participantUser('JICEST2026FST50RB', $type);
        Livewire::actingAs($user)->test(PaymentPage::class)->call('add')
            ->assertSet('total_bill', $total)->assertSet('discount', 'IDR 50.000 / USD 5');
    }

    public function test_a_legacy_voucher_does_not_discount_a_2026_payment(): void
    {
        $user = $this->participantUser('JICEST2025FST50RB');
        Livewire::actingAs($user)->test(PaymentPage::class)->call('add')
            ->assertSet('discount', 0)->assertSet('total_bill', 'IDR 100.000 / $20 USD');
    }

    public function test_invoice_preview_and_payment_use_the_same_discount(): void
    {
        $user = $this->participantUser('JICEST2026FST50RB', 'presenter_reguler');
        $abstract = UploadAbstract::create(['topic' => 'engineering', 'type' => 'oral presentation',
            'title' => 'Voucher Test Abstract', 'authors' => 'Voucher Test', 'institutions' => 'Test University',
            'abstract' => 'Test abstract.', 'keywords' => 'test', 'presenter' => 'Voucher Test',
            'participant_id' => $user->participant->id, 'status' => 'accepted']);
        $payment = Livewire::actingAs($user)->test(PaymentPage::class)->call('add');

        $review = new ReviewAbstract();
        $review->abstract_review = $abstract->id;
        $review->showValidate();

        $this->assertSame('IDR 350.000 / $25.0 USD', $review->fee);
        $payment->assertSet('total_bill', $review->fee);
    }

    public function test_saved_payment_amounts_are_recalculated_from_the_database(): void
    {
        $user = $this->participantUser('JICEST2026FST50RB');
        Storage::fake(config('filesystems.storage'));
        Livewire::actingAs($user)->test(PaymentPage::class)->call('add')
            ->set('original_fee', 'IDR 1')->set('discount', 'IDR 99.999')
            ->set('fee_after_discount', 'IDR 1')->set('total_bill', 'IDR 1')
            ->set('proof_of_payment', UploadedFile::fake()->image('receipt.jpg'))
            ->call('save')->assertDispatchedBrowserEvent('payment-success');

        $payment = Payment::firstOrFail();
        $this->assertSame('IDR 100.000 / $20 USD', $payment->fee);
        $this->assertSame('IDR 50.000 / USD 5', $payment->discount);
        $this->assertSame('IDR 50.000 / $15.0 USD', $payment->total_bill);
        $this->assertSame($payment->total_bill, $payment->fee_after_discount);
    }

    public function test_discounted_amounts_never_become_negative(): void
    {
        $fee = RegistrationVoucher::apply(['idr' => 10000, 'usd' => 2, 'formatted' => ''], RegistrationVoucher::CODE);
        $this->assertSame(0, $fee['idr']);
        $this->assertSame(0, $fee['usd']);
    }
}
