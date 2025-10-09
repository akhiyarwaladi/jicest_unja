<?php
/**
 * Test script untuk generate Invoice PDF
 */

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use PDF;

// Sample data untuk test
$testData = [
    'full_name' => 'Dr. John Doe',
    'email' => 'john.doe@example.com',
    'fee' => 'IDR 1,500,000',
    'participant_type' => 'Presenter (General)',
];

echo "Generating test Invoice PDF...\n";

try {
    $pdf = PDF::loadView('administrator.pdf.invoice', $testData)
        ->setPaper('a4', 'portrait');

    $filename = 'Invoice-TEST-' . date('YmdHis') . '.pdf';
    $outputPath = public_path('uploads/invoice/' . $filename);

    // Ensure directory exists
    $dir = dirname($outputPath);
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }

    $pdf->save($outputPath);

    echo "✓ Invoice PDF generated successfully!\n";
    echo "  Location: public/uploads/invoice/{$filename}\n";
    echo "  Full path: {$outputPath}\n";

} catch (Exception $e) {
    echo "✗ Error generating PDF: " . $e->getMessage() . "\n";
}
