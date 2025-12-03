<?php

namespace App\Exports;

use App\Models\UploadFulltext;
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
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class UploadedPaperExport extends DefaultValueBinder implements
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
        return 'Uploaded Paper List';
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
        ];
    }

    public function bindValue(Cell $cell, $value)
    {
        if (is_numeric($value)) {
            $cell->setValueExplicit($value, DataType::TYPE_STRING);
            return true;
        }

        return parent::bindValue($cell, $value);
    }

    public function collection()
    {
        $query = UploadFulltext::with(['payment.participant.user'])
            ->where('validation', 'like', '%' . $this->search)
            ->where('title', 'like', '%' . $this->search2 . '%');

        if ($this->dateFrom) {
            $query->whereDate('created_at', '>=', $this->dateFrom);
        }

        if ($this->dateTo) {
            $query->whereDate('created_at', '<=', $this->dateTo);
        }

        return $query->orderBy('created_at', 'desc')->get();
    }

    public function map($fulltext): array
    {
        $participant = $fulltext->payment->participant ?? null;
        $user = $participant->user ?? null;

        return [
            $fulltext->created_at ? $fulltext->created_at->format('d M Y, H:i') : '',
            $fulltext->title ?? '',
            $user->email ?? '',
            $participant->full_name1 ?? '',
            $participant->full_name2 ?? '',
            $participant->institution ?? '',
            $participant->participant_type ?? '',
            $participant->phone ?? '',
            $fulltext->validation ?? '',
            $fulltext->validated_by ?? '',
        ];
    }

    public function headings(): array
    {
        return [
            'Upload Date',
            'Title',
            'Email',
            'Full Name',
            'Full Name (with Title)',
            'Institution',
            'Participant Type',
            'Phone',
            'Validation Status',
            'Validated By',
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 20,  // Upload Date
            'B' => 50,  // Title
            'C' => 30,  // Email
            'D' => 25,  // Full Name
            'E' => 30,  // Full Name with Title
            'F' => 35,  // Institution
            'G' => 20,  // Participant Type
            'H' => 18,  // Phone
            'I' => 20,  // Validation Status
            'J' => 25,  // Validated By
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $lastRow = $sheet->getHighestRow();
        $lastColumn = 'J';

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
                'startColor' => ['rgb' => '10B981'] // Emerald green
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

            // Apply conditional formatting for validation status
            for ($i = 2; $i <= $lastRow; $i++) {
                $statusCell = 'I' . $i;
                $statusValue = $sheet->getCell($statusCell)->getValue();

                if ($statusValue === 'valid') {
                    $sheet->getStyle($statusCell)->applyFromArray([
                        'fill' => [
                            'fillType' => Fill::FILL_SOLID,
                            'startColor' => ['rgb' => 'D1FAE5'] // Light green
                        ],
                        'font' => [
                            'color' => ['rgb' => '065F46'] // Dark green text
                        ]
                    ]);
                } elseif ($statusValue === 'invalid') {
                    $sheet->getStyle($statusCell)->applyFromArray([
                        'fill' => [
                            'fillType' => Fill::FILL_SOLID,
                            'startColor' => ['rgb' => 'FEE2E2'] // Light red
                        ],
                        'font' => [
                            'color' => ['rgb' => '991B1B'] // Dark red text
                        ]
                    ]);
                } elseif ($statusValue === 'not yet validated') {
                    $sheet->getStyle($statusCell)->applyFromArray([
                        'fill' => [
                            'fillType' => Fill::FILL_SOLID,
                            'startColor' => ['rgb' => 'FEF3C7'] // Light yellow
                        ],
                        'font' => [
                            'color' => ['rgb' => '92400E'] // Dark yellow text
                        ]
                    ]);
                }

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
