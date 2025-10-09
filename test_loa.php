<?php
/**
 * Test script untuk generate LOA PDF
 * Untuk melihat hasil tanda tangan baru
 */

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use PDF;

// Sample data untuk test
$testData = [
    'full_name' => 'Dr. John Doe',
    'institution' => 'University of Technology',
    'abstractTitle' => 'Digital Transformation in Green Energy: A Comprehensive Study of Advanced Materials for Sustainable Society',
];

echo "Generating test LOA PDF...\n";

try {
    $pdf = PDF::loadView('administrator.pdf.loa', $testData)
        ->setPaper('a4', 'portrait');

    $filename = 'LOA-TEST-' . date('YmdHis') . '.pdf';
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
    echo "\nYou can open the PDF to verify the new signature!\n";

} catch (Exception $e) {
    echo "✗ Error generating PDF: " . $e->getMessage() . "\n";
    echo "Stack trace:\n" . $e->getTraceAsString() . "\n";
}
