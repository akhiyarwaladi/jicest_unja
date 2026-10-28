<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AbstractReportSheet extends DefaultValueBinder implements FromArray, WithHeadings, WithTitle,
    WithColumnWidths, WithColumnFormatting, WithCustomValueBinder, WithStyles
{
    public function __construct(private string $name, private array $headers, private array $rows,
        private array $widths, private array $dateColumns = [], private string $freeze = 'C2',
        private array $comments = []) {}

    public function title(): string { return $this->name; }
    public function headings(): array { return $this->headers; }
    public function array(): array { return $this->rows; }
    public function columnWidths(): array { return $this->widths; }

    public function columnFormats(): array
    {
        return array_fill_keys($this->dateColumns, 'dd mmm yyyy hh:mm');
    }

    public function bindValue(Cell $cell, $value)
    {
        if (is_string($value)) {
            $cell->setValueExplicit($value, DataType::TYPE_STRING);
            return true;
        }
        return parent::bindValue($cell, $value);
    }

    public function styles(Worksheet $sheet)
    {
        $last = Coordinate::stringFromColumnIndex(count($this->headers));
        $lastRow = $sheet->getHighestRow();
        $sheet->setShowGridlines(false);
        $sheet->getStyle('A1:'.$last.$lastRow)->getFont()->setName('Arial')->setSize(10)->getColor()->setRGB('0B1B14');
        $sheet->getStyle('A1:'.$last.$lastRow)->getAlignment()->setVertical(Alignment::VERTICAL_TOP)->setWrapText(true);
        $sheet->getStyle('A1:'.$last.'1')->applyFromArray([
            'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
            'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => '0B1B14']],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER],
        ]);
        $sheet->getRowDimension(1)->setRowHeight(46);
        if ($lastRow > 1) {
            $sheet->getStyle('A2:'.$last.$lastRow)->getAlignment()->setIndent(1);
        }
        foreach ($this->rows as $index => $row) {
            $rowNumber = $index + 2;
            $lines = 1;
            foreach ($row as $columnIndex => $value) {
                $column = Coordinate::stringFromColumnIndex($columnIndex + 1);
                if (is_string($value)) {
                    $lineWidth = max(8, (int)(($this->widths[$column] ?? 22) / 1.1));
                    $wrappedLines = array_sum(array_map(fn ($line) => max(1, (int)ceil(mb_strwidth($line) / $lineWidth)), explode("\n", $value)));
                    $lines = max($lines, $wrappedLines);
                }
            }
            $sheet->getRowDimension($rowNumber)->setRowHeight(min(409, max(30, $lines * 13 + 8)));
            if ($index % 2 === 1) {
                $sheet->getStyle('A'.$rowNumber.':'.$last.$rowNumber)->getFill()
                    ->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('F1F5F3');
            }
        }
        foreach ($this->comments as $cell => $text) {
            $sheet->getComment($cell)->getText()->createTextRun($text);
        }
        $sheet->freezePane($this->freeze);
        $sheet->setAutoFilter('A1:'.$last.$lastRow);
        $sheet->getSheetView()->setZoomScale(100);
        return [];
    }
}
