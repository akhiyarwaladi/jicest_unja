<?php

namespace App\Exports;

use App\Models\UploadAbstract;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Font;

class AbstractReviewExport extends DefaultValueBinder implements
    FromCollection,
    WithMapping,
    WithHeadings,
    WithColumnFormatting,
    WithCustomValueBinder,
    WithStyles,
    WithColumnWidths,
    WithTitle
{
    protected $dateFrom;
    protected $dateTo;
    protected $search;
    protected $search2;

    public function __construct($dateFrom = null, $dateTo = null, $search = '', $search2 = '')
    {
        $this->dateFrom = $dateFrom ?: '2025-09-01';
        $this->dateTo = $dateTo ?: date('Y-m-d');
        $this->search = $search;
        $this->search2 = $search2;
    }

    public function title(): string
    {
        return 'Abstract Review List';
    }

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
            'I' => NumberFormat::FORMAT_TEXT,
            'J' => NumberFormat::FORMAT_TEXT,
            'K' => NumberFormat::FORMAT_TEXT,
            'L' => NumberFormat::FORMAT_TEXT,
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
        $query = UploadAbstract::with(['participant.user'])
            ->where('status', 'like', '%' . $this->search);

        if ($this->search2) {
            $query->whereHas('participant', function ($q) {
                $q->where('full_name1', 'like', '%' . $this->search2 . '%');
            });
        }

        if ($this->dateFrom) {
            $query->whereDate('created_at', '>=', $this->dateFrom);
        }

        if ($this->dateTo) {
            $query->whereDate('created_at', '<=', $this->dateTo);
        }

        return $query->orderBy('topic')->get();
    }

    public function map($uploadAbstract): array
    {
        $participant = $uploadAbstract->participant;

        return [
            $uploadAbstract->title ?? '',
            $uploadAbstract->authors ?? '',
            $uploadAbstract->institutions ?? '',
            $uploadAbstract->abstract ?? '',
            $uploadAbstract->keywords ?? '',
            $uploadAbstract->presenter ?? '',
            $participant->full_name1 ?? '',
            $participant->full_name2 ?? '',
            $participant->participant_type ?? '',
            $participant->address ?? '',
            $participant->phone ?? '',
            $participant->attendance ?? '',
        ];
    }

    public function headings(): array
    {
        return [
            'Title',
            'Authors',
            'Institutions',
            'Abstract',
            'Keywords',
            'Presenter',
            'Full Name',
            'Full Name (with Title)',
            'Participant Type',
            'Address',
            'Phone',
            'Attendance'
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 40,  // Title
            'B' => 35,  // Authors
            'C' => 30,  // Institutions
            'D' => 60,  // Abstract
            'E' => 30,  // Keywords
            'F' => 25,  // Presenter
            'G' => 25,  // Full Name
            'H' => 30,  // Full Name with Title
            'I' => 20,  // Participant Type
            'J' => 35,  // Address
            'K' => 15,  // Phone
            'L' => 15,  // Attendance
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Get the last row number
        $lastRow = $sheet->getHighestRow();
        $lastColumn = 'L';

        // Style the header row (row 1)
        $sheet->getStyle('A1:' . $lastColumn . '1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
                'size' => 11,
                'name' => 'Calibri'
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '4472C4'] // Blue background
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
                'wrapText' => true
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '000000']
                ]
            ]
        ]);

        // Set row height for header
        $sheet->getRowDimension(1)->setRowHeight(30);

        // Style all data rows
        if ($lastRow > 1) {
            $sheet->getStyle('A2:' . $lastColumn . $lastRow)->applyFromArray([
                'alignment' => [
                    'vertical' => Alignment::VERTICAL_TOP,
                    'wrapText' => true
                ],
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['rgb' => 'D0D0D0']
                    ]
                ],
                'font' => [
                    'name' => 'Calibri',
                    'size' => 10
                ]
            ]);

            // Set minimum height for data rows
            for ($i = 2; $i <= $lastRow; $i++) {
                $sheet->getRowDimension($i)->setRowHeight(-1); // Auto height
            }
        }

        // Freeze the header row
        $sheet->freezePane('A2');

        // Enable auto-filter on header row
        $sheet->setAutoFilter('A1:' . $lastColumn . '1');

        return [];
    }
}
