<?php

namespace App\Exports;

use App\Exports\Concerns\HasAdminFilters;
use App\Support\AdminRecords;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class AbstractReviewExport implements WithMultipleSheets
{
    use HasAdminFilters;

    public function collection()
    {
        return AdminRecords::abstracts($this->search, $this->search2, $this->dateFrom, $this->dateTo)
            ->with('payments.uploadFulltexts')->get();
    }

    private function date($value): ?float
    {
        return $value ? Date::dateTimeToExcel($value->copy()->setTimezone('Asia/Jakarta')) : null;
    }

    public function sheets(): array
    {
        $tracking = $details = $payments = [];
        foreach ($this->collection() as $abstract) {
            $participant = $abstract->participant;
            $user = $participant?->user;
            $paymentHistory = $abstract->payments->sortBy([['created_at', 'desc'], ['id', 'desc']]);
            $latestPayment = $paymentHistory->first();
            $latestPaper = $paymentHistory->flatMap(fn ($payment) => $payment->uploadFulltexts)
                ->sortBy([['created_at', 'desc'], ['id', 'desc']])->first();
            $tracking[] = [
                $abstract->id, $abstract->title, $abstract->presenter, $user?->email,
                $participant?->participant_type, $abstract->topic, $abstract->status,
                $this->date($abstract->created_at), $this->date($abstract->updated_at),
                $latestPayment?->validation, $this->date($latestPayment?->created_at),
                $this->date($latestPayment?->updated_at), $latestPayment?->id, $latestPayment?->total_bill,
                $this->date($latestPaper?->created_at), $this->date($latestPaper?->updated_at), $latestPaper?->validation,
                $this->date($participant?->created_at), $this->date($user?->email_verified_at),
            ];
            $details[] = [
                $abstract->id, $abstract->title, $abstract->authors, $abstract->institutions,
                $abstract->abstract, $abstract->keywords, $abstract->presenter, $participant?->full_name1,
                $participant?->full_name2, $participant?->participant_type, $participant?->address,
                $participant?->phone, $participant?->attendance,
            ];
            foreach ($paymentHistory->reverse() as $payment) {
                $payments[] = [$abstract->id, $payment->id, $participant?->full_name1, $user?->email,
                    $this->date($payment->created_at), $this->date($payment->updated_at), $payment->validation,
                    $payment->total_bill, $payment->receipt, $payment->validated_by];
            }
        }

        return [
            new AbstractReportSheet('Abstract tracking', [
                'Abstract ID', 'Title', 'Presenter', 'Email', 'Participant type', 'Topic', 'Review status',
                'Abstract submitted (WIB)', 'Abstract last updated (WIB)', 'Latest payment status',
                'Latest payment uploaded (WIB)', 'Latest payment updated (WIB)', 'Latest payment ID', 'Total bill',
                'Latest full paper uploaded (WIB)', 'Latest full paper updated (WIB)', 'Full paper status',
                'Participant registered (WIB)', 'Email verified (WIB)',
            ], $tracking, [
                'A' => 14, 'B' => 48, 'C' => 27, 'D' => 32, 'E' => 24, 'F' => 26, 'G' => 19,
                'H' => 24, 'I' => 24, 'J' => 24, 'K' => 24, 'L' => 24, 'M' => 17, 'N' => 28,
                'O' => 24, 'P' => 24, 'Q' => 24, 'R' => 24, 'S' => 24,
            ], ['H', 'I', 'K', 'L', 'O', 'P', 'R', 'S'], 'C2', [
                'I1' => 'Last record update; this is not a dedicated review decision timestamp.',
                'K1' => 'Time the payment proof record was created. Bank transfer date is not recorded separately. All attempts are listed in Payment history.',
                'L1' => 'Last payment record update; this is not a dedicated verification timestamp.',
            ]),
            new AbstractReportSheet('Abstract details', [
                'Abstract ID', 'Title', 'Authors', 'Institutions', 'Abstract', 'Keywords', 'Presenter',
                'Full name', 'Full name with title', 'Participant type', 'Address', 'Phone', 'Attendance',
            ], $details, ['A' => 14, 'B' => 48, 'C' => 38, 'D' => 38, 'E' => 120, 'F' => 30,
                'G' => 27, 'H' => 27, 'I' => 32, 'J' => 24, 'K' => 38, 'L' => 22, 'M' => 18]),
            new AbstractReportSheet('Payment history', [
                'Abstract ID', 'Payment ID', 'Participant', 'Email', 'Payment uploaded (WIB)',
                'Payment last updated (WIB)', 'Payment status', 'Total bill', 'Receipt reference', 'Validated by',
            ], $payments, ['A' => 14, 'B' => 14, 'C' => 28, 'D' => 32, 'E' => 24, 'F' => 24,
                'G' => 24, 'H' => 28, 'I' => 30, 'J' => 32], ['E', 'F']),
        ];
    }
}
