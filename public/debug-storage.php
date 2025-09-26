<?php
// Debug storage setup for cPanel
// Access this file via: https://jicest.unja.ac.id/debug-storage.php

echo "<h2>JICEST Storage Debug</h2>\n";
echo "<pre>\n";

echo "=== STORAGE SETUP CHECK ===\n\n";

// Check if storage link exists
if (is_link('storage')) {
    echo "✓ Storage symlink exists\n";
    echo "  Symlink target: " . readlink('storage') . "\n";
} else {
    echo "✗ Storage symlink missing\n";
    echo "  Fix: Run 'php artisan storage:link' or create manually\n";
}

echo "\n=== DIRECTORY CHECK ===\n\n";

// Check directories
$dirs = [
    'storage',
    'storage/letter-of-acceptance',
    'storage/receipt',
    'storage/invoice'
];

foreach ($dirs as $dir) {
    if (is_dir($dir)) {
        echo "✓ Directory exists: $dir\n";
        echo "  Permissions: " . substr(sprintf('%o', fileperms($dir)), -4) . "\n";
    } else {
        echo "✗ Directory not found: $dir\n";
    }
}

echo "\n=== FILE CHECK ===\n\n";

// Check specific files
$testFiles = [
    'storage/letter-of-acceptance/LOA-ABS286-Akhiyar Waladi.pdf',
    // Add more files to check
];

foreach ($testFiles as $file) {
    if (file_exists($file)) {
        echo "✓ File exists: $file\n";
        echo "  Size: " . filesize($file) . " bytes\n";
        echo "  Permissions: " . substr(sprintf('%o', fileperms($file)), -4) . "\n";
        echo "  Last modified: " . date('Y-m-d H:i:s', filemtime($file)) . "\n";
    } else {
        echo "✗ File not found: $file\n";
    }
}

echo "\n=== RECENT FILES ===\n\n";

// List recent files in letter-of-acceptance
$loaDir = 'storage/letter-of-acceptance';
if (is_dir($loaDir)) {
    $files = glob($loaDir . '/*.pdf');
    $files = array_map(function($file) {
        return ['file' => $file, 'time' => filemtime($file)];
    }, $files);

    usort($files, function($a, $b) {
        return $b['time'] - $a['time'];
    });

    echo "Recent PDF files in letter-of-acceptance:\n";
    foreach (array_slice($files, 0, 10) as $fileInfo) {
        echo "  " . basename($fileInfo['file']) . " (" . date('Y-m-d H:i:s', $fileInfo['time']) . ")\n";
    }
} else {
    echo "letter-of-acceptance directory not found\n";
}

echo "\n=== ENVIRONMENT ===\n\n";
echo "Current working directory: " . getcwd() . "\n";
echo "PHP version: " . PHP_VERSION . "\n";

// Check if running via web or CLI
echo "SAPI: " . php_sapi_name() . "\n";

if (isset($_SERVER['HTTP_HOST'])) {
    echo "Host: " . $_SERVER['HTTP_HOST'] . "\n";
    echo "Request URI: " . $_SERVER['REQUEST_URI'] . "\n";
}

echo "\n=== SOLUTIONS ===\n\n";
echo "If storage symlink is missing:\n";
echo "1. Via SSH: php artisan storage:link\n";
echo "2. Manual: ln -s ../storage/app/public storage\n";
echo "3. Via cPanel File Manager: Create symbolic link\n\n";

echo "If permissions are wrong:\n";
echo "1. Folders: chmod 755 storage storage/letter-of-acceptance\n";
echo "2. Files: chmod 644 storage/letter-of-acceptance/*.pdf\n\n";

echo "If files don't exist:\n";
echo "1. Check Laravel logs for PDF generation errors\n";
echo "2. Verify abstract review process completes successfully\n";
echo "3. Check storage disk configuration\n";

echo "</pre>";
?>