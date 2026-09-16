<?php
/**
 * Script untuk generate LOA untuk Akhiyar Waladi
 */

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use PDF;

// Data LOA
$loaData = [
    'full_name' => 'Jefri Marzal',
    'institution' => 'Universitas Jambi',
    'abstractTitle' => 'Color Complexity and Sharpness for Instagram Engagement Classification in University Accounts',
    'date' => '08 November 2025',
];

echo "Generating LOA PDF for Jefri Marzal...\n";

try {
    $pdf = PDF::loadView('administrator.pdf.loa', $loaData)
        ->setPaper('a4', 'portrait');

    $filename = 'LOA-Jefri-Marzal-' . date('YmdHis') . '.pdf';
    $outputPath = public_path('uploads/letter-of-acceptance/' . $filename);

    // Ensure directory exists
    $dir = dirname($outputPath);
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }

    $pdf->save($outputPath);

    echo "✓ LOA PDF generated successfully!\n";
    echo "  Location: public/uploads/letter-of-acceptance/{$filename}\n";
    echo "  Full path: {$outputPath}\n";

} catch (Exception $e) {
    echo "✗ Error generating PDF: " . $e->getMessage() . "\n";
    echo "Stack trace:\n" . $e->getTraceAsString() . "\n";
}
