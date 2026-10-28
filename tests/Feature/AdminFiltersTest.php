<?php

namespace Tests\Feature;

use App\Exports\AbstractReviewExport;
use App\Exports\PaidParticipantExport;
use App\Exports\PaidPresenterExport;
use App\Exports\PaymentExport;
use App\Exports\RegisteredExport;
use App\Exports\UploadedPaperExport;
use App\Http\Livewire\{RegisteredParticipant, PresenterPaid, ParticipantPaid, ReviewAbstract, PaymentValidation, UploadedPaper, ValidateMember};
use App\Models\{Participant, Payment, UploadAbstract, UploadFulltext, User};
use App\Support\AdminRecords;
use Carbon\Carbon;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Livewire\Livewire;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class AdminFiltersTest extends TestCase
{
    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        config(['database.default' => 'sqlite', 'database.connections.sqlite.database' => ':memory:']);
        DB::purge('sqlite');
        Carbon::setTestNow(Carbon::parse('2026-10-28 12:00:00', 'Asia/Jakarta'));
        (require database_path('migrations/2014_10_12_000000_create_users_table.php'))->up();
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            foreach (['full_name1', 'full_name2', 'participant_type', 'institution', 'address', 'phone', 'attendance',
                'hki_id', 'hki_status', 'member_card', 'hki_validated_by'] as $column) {
                $table->string($column)->nullable();
            }
            $table->timestamps();
        });
        (require database_path('migrations/2023_08_02_155503_create_upload_abstracts_table.php'))->up();
        (require database_path('migrations/2023_08_06_220350_create_payments_table.php'))->up();
        (require database_path('migrations/2023_08_09_195835_create_upload_fulltexts_table.php'))->up();
        $this->admin = User::create(['email' => 'filter-admin@example.test', 'password' => 'test-password', 'role' => 'administrator']);
        $this->admin->forceFill(['email_verified_at' => now()])->save();
        $this->records('Mixed Name Presenter', 'presenter_reguler', '2025-09-01');
        $this->records('Mixed Name Participant', 'participant_reguler');
        for ($index = 1; $index <= 12; $index++) {
            $this->records('Filler Presenter '.$index, 'presenter_student');
            $this->records('Filler Participant '.$index, 'participant_student');
        }
    }

    protected function tearDown(): void
    {
        Carbon::setTestNow();
        parent::tearDown();
    }

    private function records(string $name, string $type = 'presenter_reguler', string $registered = '2026-10-20',
        string $status = 'valid', string $review = 'accepted'): array
    {
        $user = User::create(['email' => 'person-'.User::count().'@example.test', 'password' => 'test-password', 'role' => 'participant']);
        $user->forceFill(['email_verified_at' => now()])->save();
        $person = Participant::create(['user_id' => $user->id, 'full_name1' => $name, 'full_name2' => 'Prof. Dr. '.$name,
            'participant_type' => $type, 'institution' => 'Test University', 'address' => 'Test address', 'phone' => '081234567890',
            'attendance' => 'online', 'hki_status' => $status, 'member_card' => 'test-card.png', 'hki_id' => 'HKI-TEST',
            'created_at' => $registered.' 10:00:00']);
        $abstract = UploadAbstract::create(['participant_id' => $person->id, 'topic' => 'engineering', 'type' => 'oral presentation',
            'title' => 'Research by '.$name, 'authors' => $name, 'institutions' => 'Test University', 'abstract' => str_repeat('Test research paragraph. ', 20),
            'keywords' => 'test', 'presenter' => $name, 'status' => $review]);
        $payment = Payment::create(['participant_id' => $person->id, 'upload_abstract_id' => $abstract->id,
            'fee' => 'IDR 500000', 'discount' => '0', 'fee_after_discount' => 'IDR 500000', 'total_bill' => 'IDR 500000',
            'proof_of_payment' => 'test-proof.png', 'validation' => $status]);
        $paper = UploadFulltext::create(['payment_id' => $payment->id, 'fulltext' => 'test-paper.docx',
            'title' => 'Full paper by '.$name, 'validation' => $status]);
        return [$person, $abstract, $payment, $paper];
    }

    public static function menus(): array
    {
        return [
            [RegisteredParticipant::class, 'participants'], [PresenterPaid::class, 'participants'],
            [ParticipantPaid::class, 'participants'], [ReviewAbstract::class, 'abstracts'],
            [PaymentValidation::class, 'payments'], [UploadedPaper::class, 'fulltexts'], [ValidateMember::class, 'participants'],
        ];
    }

    #[DataProvider('menus')]
    public function test_name_search_is_case_insensitive_and_resets_pagination(string $componentClass, string $viewKey): void
    {
        $component = Livewire::actingAs($this->admin)->test($componentClass)->call('gotoPage', 2)->assertSet('page', 2)
            ->set('search2', '  MIXED   nAmE  ')->assertSet('page', 1);
        $ids = $component->viewData($viewKey)->pluck('id')->all();
        $this->assertNotEmpty($ids);
        $component->set('search2', 'mixed name');
        $this->assertSame($ids, $component->viewData($viewKey)->pluck('id')->all());
        $component->set('search2', 'Prof. Dr. mixed NAME');
        $this->assertSame($ids, $component->viewData($viewKey)->pluck('id')->all());
        $component->call('gotoPage', 2)->set('search2', '   ')->assertSet('page', 1);
        $this->assertGreaterThan(1, $component->viewData($viewKey)->total());
    }

    public static function dateMenus(): array
    {
        return array_slice(self::menus(), 0, 6);
    }

    #[DataProvider('dateMenus')]
    public function test_dates_can_be_cleared_and_changed_after_pagination(string $componentClass, string $viewKey): void
    {
        $component = Livewire::actingAs($this->admin)->test($componentClass)->call('gotoPage', 2)
            ->set('date_from', '2027-01-01')->assertSet('page', 1);
        $this->assertSame(0, $component->viewData($viewKey)->total());
        $component->call('allDates')->assertSet('date_from', '')->assertSet('date_to', '')->assertSet('page', 1);
        $this->assertGreaterThan(0, $component->viewData($viewKey)->total());
        $component->call('gotoPage', 2)->set('date_to', '2024-12-31')->assertSet('page', 1);
        $this->assertSame(0, $component->viewData($viewKey)->total());
    }

    public function test_statuses_are_exact_and_reviewed_includes_only_accepted_or_rejected(): void
    {
        foreach ([['valid', 'accepted'], ['invalid', 'rejected'], ['not yet validated', 'not yet reviewed']] as [$status, $review]) {
            $this->records('Status Person '.$status, 'presenter_reguler', '2026-10-20', $status, $review);
        }
        foreach ([PaymentValidation::class => ['payments', 'validation'], UploadedPaper::class => ['fulltexts', 'validation'],
            ValidateMember::class => ['participants', 'hki_status']] as $class => [$key, $column]) {
            $component = Livewire::actingAs($this->admin)->test($class)->set('search2', 'status person');
            foreach (['valid', 'invalid', 'not yet validated'] as $status) {
                $component->call('gotoPage', 2)->set('search', $status)->assertSet('page', 1);
                $rows = $component->viewData($key);
                $this->assertSame(1, $rows->total());
                $this->assertSame($status, $rows->first()->$column);
            }
            $component->set('search', '');
            $this->assertSame(3, $component->viewData($key)->total());
        }
        $component = Livewire::actingAs($this->admin)->test(ReviewAbstract::class)->set('search2', 'status person');
        foreach (['accepted', 'rejected', 'not yet reviewed'] as $status) {
            $component->call('gotoPage', 2)->set('search', $status)->assertSet('page', 1);
            $this->assertSame(1, $component->viewData('abstracts')->total());
            $this->assertSame($status, $component->viewData('abstracts')->first()->status);
        }
        $component->set('search', 'reviewed');
        $this->assertSame(['accepted', 'rejected'], $component->viewData('abstracts')->pluck('status')->sort()->values()->all());
    }

    public function test_paid_categories_and_payment_dates_include_returning_participants(): void
    {
        $presenter = AdminRecords::participants('mixed name', '2026-01-01', '2026-12-31', 'presenter')->get();
        $this->assertSame(['Mixed Name Presenter'], $presenter->pluck('full_name1')->all());
        $this->assertSame(2025, $presenter->first()->created_at->year);
        $this->assertSame(['Mixed Name Participant'], AdminRecords::participants('mixed name', '2026-01-01', '2026-12-31', 'participant')->pluck('full_name1')->all());
        $this->assertSame(13, AdminRecords::participants('', null, null, 'participant')->count());
        $this->assertSame(13, AdminRecords::participants('', null, null, 'presenter')->count());
    }

    public function test_search_treats_wildcards_literally_and_matches_named_presenter_or_paper_title(): void
    {
        [$person, $abstract] = $this->records('100% literal_name');
        $this->records('100x literalZname');
        $this->assertSame([$person->id], AdminRecords::participants('100% literal_name')->pluck('id')->all());
        $abstract->update(['presenter' => 'Alternate Speaker']);
        $this->assertSame([$abstract->id], AdminRecords::abstracts('', 'ALTERNATE speaker')->pluck('id')->all());
        $this->assertGreaterThan(0, AdminRecords::papers('', 'FULL PAPER mixed')->count());
    }

    public function test_exports_use_the_same_name_status_and_all_dates_filters_as_the_lists(): void
    {
        $cases = [
            [new RegisteredExport('', '', '', 'MIXED name'), AdminRecords::participants('mixed name')],
            [new PaidPresenterExport('', '', '', 'MIXED name'), AdminRecords::participants('mixed name', null, null, 'presenter')],
            [new PaidParticipantExport('', '', '', 'MIXED name'), AdminRecords::participants('mixed name', null, null, 'participant')],
            [new PaymentExport('', '', 'valid', 'MIXED name'), AdminRecords::payments('valid', 'mixed name')],
            [new UploadedPaperExport('', '', 'valid', 'MIXED name'), AdminRecords::papers('valid', 'mixed name')],
            [new AbstractReviewExport('', '', 'accepted', 'MIXED name'), AdminRecords::abstracts('accepted', 'mixed name')],
        ];
        foreach ($cases as [$export, $query]) {
            $this->assertSame($query->pluck('id')->all(), $export->collection()->pluck('id')->all());
        }
        $this->assertSame(8, count((new PaymentExport())->headings()));
    }

    public function test_abstract_workbook_preserves_dates_all_payment_attempts_and_original_text(): void
    {
        [$person, $abstract, $firstPayment, $paper] = $this->records('Workbook Person');
        $abstract->update(['title' => '=HYPERLINK("https://example.test")', 'created_at' => '2026-10-15 08:30:00']);
        $secondPayment = $firstPayment->replicate();
        $secondPayment->validation = 'not yet validated';
        $secondPayment->created_at = Carbon::parse('2026-10-29 09:45:00', 'Asia/Jakarta');
        $secondPayment->updated_at = $secondPayment->created_at;
        $secondPayment->save();
        $content = Excel::raw(new AbstractReviewExport('2026-01-01', '2026-12-31', 'accepted', 'workbook person'), \Maatwebsite\Excel\Excel::XLSX);
        $path = tempnam(sys_get_temp_dir(), 'jicest-export-');
        file_put_contents($path, $content);
        try {
            \PhpOffice\PhpSpreadsheet\Cell\Cell::setValueBinder(new \PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder());
            $book = IOFactory::load($path);
            $this->assertSame(['Abstract tracking', 'Abstract details', 'Payment history'], $book->getSheetNames());
            $sheet = $book->getSheet(0);
            $this->assertSame(2, $sheet->getHighestRow());
            $this->assertSame('C2', $sheet->getFreezePane());
            $this->assertSame('A1:S2', $sheet->getAutoFilter()->getRange());
            $archive = new \ZipArchive();
            $archive->open($path);
            $sheetXml = $archive->getFromName('xl/worksheets/sheet1.xml');
            $archive->close();
            // This installed reader mistakes print gridLinesSet for display gridlines.
            $this->assertStringContainsString('showGridLines="false"', $sheetXml);
            $this->assertSame('s', $sheet->getCell('B2')->getDataType());
            $this->assertSame($abstract->title, $sheet->getCell('B2')->getValue());
            $this->assertSame('n', $sheet->getCell('H2')->getDataType());
            $this->assertEqualsWithDelta(Date::dateTimeToExcel(Carbon::parse('2026-10-15 08:30:00', 'Asia/Jakarta')), $sheet->getCell('H2')->getValue(), 1 / 86400000);
            $this->assertSame('dd mmm yyyy hh:mm', $sheet->getStyle('H2')->getNumberFormat()->getFormatCode());
            $this->assertSame('not yet validated', $sheet->getCell('J2')->getValue());
            $this->assertSame($secondPayment->id, $sheet->getCell('M2')->getValue());
            $this->assertEqualsWithDelta(Date::dateTimeToExcel($paper->created_at), $sheet->getCell('O2')->getValue(), 1 / 86400000);
            $this->assertSame($abstract->abstract, $book->getSheet(1)->getCell('E2')->getValue());
            $this->assertSame('081234567890', $book->getSheet(1)->getCell('L2')->getValue());
            $this->assertSame('s', $book->getSheet(1)->getCell('L2')->getDataType());
            $this->assertSame(3, $book->getSheet(2)->getHighestRow());
            $this->assertSame($abstract->id, $book->getSheet(2)->getCell('A3')->getValue());
            $this->assertSame($secondPayment->id, $book->getSheet(2)->getCell('B3')->getValue());
            $this->assertGreaterThan(30, $sheet->getRowDimension(1)->getRowHeight());
        } finally {
            unlink($path);
        }
    }
}
