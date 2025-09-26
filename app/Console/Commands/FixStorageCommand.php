<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class FixStorageCommand extends Command
{
    protected $signature = 'storage:fix';
    protected $description = 'Fix storage issues for PDF files on production';

    public function handle()
    {
        $this->info('=== JICEST Storage Fix Tool ===');

        // 1. Check storage link
        $this->checkStorageLink();

        // 2. Create missing directories
        $this->createDirectories();

        // 3. Fix permissions
        $this->fixPermissions();

        // 4. List existing files
        $this->listFiles();

        $this->info('Storage fix completed!');
    }

    private function checkStorageLink()
    {
        $this->info('Checking storage symbolic link...');

        $linkPath = public_path('storage');
        $targetPath = storage_path('app/public');

        if (is_link($linkPath)) {
            $this->info('✓ Storage link exists');
            $this->line('  Target: ' . readlink($linkPath));
        } else {
            $this->warn('✗ Storage link missing');

            if ($this->confirm('Create storage link?')) {
                if (File::exists($linkPath)) {
                    File::deleteDirectory($linkPath);
                }

                if (File::link($targetPath, $linkPath)) {
                    $this->info('✓ Storage link created');
                } else {
                    $this->error('✗ Failed to create storage link');
                }
            }
        }
    }

    private function createDirectories()
    {
        $this->info('Creating storage directories...');

        $directories = [
            'letter-of-acceptance',
            'receipt',
            'invoice',
            'abstracts',
            'fulltext-papers'
        ];

        foreach ($directories as $dir) {
            if (!Storage::disk('public')->exists($dir)) {
                Storage::disk('public')->makeDirectory($dir);
                $this->info("✓ Created directory: $dir");
            } else {
                $this->line("✓ Directory exists: $dir");
            }
        }
    }

    private function fixPermissions()
    {
        $this->info('Fixing permissions...');

        $storagePath = storage_path('app/public');

        if (is_dir($storagePath)) {
            // Fix directory permissions
            chmod($storagePath, 0755);
            $this->info('✓ Fixed storage directory permissions');

            // Fix subdirectory permissions
            $subdirs = ['letter-of-acceptance', 'receipt', 'invoice', 'abstracts', 'fulltext-papers'];
            foreach ($subdirs as $subdir) {
                $fullPath = $storagePath . '/' . $subdir;
                if (is_dir($fullPath)) {
                    chmod($fullPath, 0755);
                    $this->line("  ✓ Fixed $subdir permissions");

                    // Fix file permissions in directory
                    $files = glob($fullPath . '/*');
                    foreach ($files as $file) {
                        if (is_file($file)) {
                            chmod($file, 0644);
                        }
                    }
                }
            }
        }
    }

    private function listFiles()
    {
        $this->info('Recent files in storage:');

        $directories = ['letter-of-acceptance', 'receipt', 'invoice'];

        foreach ($directories as $dir) {
            $this->line("\n$dir/:");

            $files = Storage::disk('public')->files($dir);
            $fileData = [];

            foreach ($files as $file) {
                if (pathinfo($file, PATHINFO_EXTENSION) === 'pdf') {
                    $fullPath = storage_path('app/public/' . $file);
                    $fileData[] = [
                        'name' => basename($file),
                        'size' => File::size($fullPath),
                        'modified' => File::lastModified($fullPath)
                    ];
                }
            }

            // Sort by modification time (newest first)
            usort($fileData, function($a, $b) {
                return $b['modified'] - $a['modified'];
            });

            foreach (array_slice($fileData, 0, 10) as $file) {
                $size = round($file['size'] / 1024, 1) . ' KB';
                $date = date('Y-m-d H:i:s', $file['modified']);
                $this->line("  {$file['name']} ({$size}) - {$date}");
            }

            if (empty($fileData)) {
                $this->line('  (no PDF files found)');
            }
        }
    }
}