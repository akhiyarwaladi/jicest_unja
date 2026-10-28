<?php

namespace App\Exports;

use App\Models\Payment;
use App\Models\Participant;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;

class PaymentExport extends DefaultValueBinder implements FromCollection, WithMapping, WithHeadings, WithColumnFormatting, WithCustomValueBinder
{
    use \App\Exports\Concerns\HasAdminFilters;
    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_TEXT,
            'B' => NumberFormat::FORMAT_TEXT,
            'C' => NumberFormat::FORMAT_TEXT,
            'D' => NumberFormat::FORMAT_TEXT,
            'E' => NumberFormat::FORMAT_TEXT,
            'F' => NumberFormat::FORMAT_TEXT,
            'G' => NumberFormat::FORMAT_TEXT,
            'H' => NumberFormat::FORMAT_TEXT,
        ];
    }

    public function bindValue(Cell $cell, $value)
    {
        if (is_numeric($value)) {
            $cell->setValueExplicit($value, DataType::TYPE_STRING);

            return true;
        }

        // else return default behavior
        return parent::bindValue($cell, $value);
    }

    public function collection()
    {
        return \App\Support\AdminRecords::payments($this->search, $this->search2, $this->dateFrom, $this->dateTo)->get();
    }

    public function map($payment): array
    {
        return [
            //data yang dari kolom tabel database yang akan diambil
            $payment->created_at,
            $payment->participant->user->email,
            $payment->participant->full_name1,
            $payment->total_bill,
            $payment->upload_abstract_id == null ? 'participant' : $payment->uploadAbstract->title,
            $payment->validation,
            $payment->validated_by,
            $payment->participant->attendance,
        ];
    }

    public function headings(): array
    {
        return ['Date', 'Email', 'Full Name', 'Total Bill', 'Invoice For', 'Status', 'Validated By', 'Attendance'];
    }
}
