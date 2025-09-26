# Debug Storage Issues on cPanel

## Problem
PDF files (LOA/receipts) are generated but return 404 when accessed via URL like:
https://jicest.unja.ac.id/storage/letter-of-acceptance/LOA-ABS286-Akhiyar Waladi.pdf

## Common Causes and Solutions

### 1. Storage Link Missing
The symbolic link from `public/storage` to `storage/app/public` might not exist.

**Solution on cPanel:**
```bash
# Via File Manager or SSH, go to project root
php artisan storage:link
```

Or manually create symbolic link:
```bash
ln -s /home/username/domains/jicest.unja.ac.id/storage/app/public /home/username/domains/jicest.unja.ac.id/public/storage
```

### 2. File Permissions
Files might not have correct permissions for web access.

**Solution:**
```bash
# Set correct permissions for storage folders
chmod 755 storage/app/public
chmod 755 storage/app/public/letter-of-acceptance
chmod 644 storage/app/public/letter-of-acceptance/*.pdf
```

### 3. Directory Structure
Check if the directory structure exists:
```
storage/
  app/
    public/
      letter-of-acceptance/
        LOA-ABS286-Akhiyar Waladi.pdf
      receipt/
      invoice/
```

### 4. File Actually Generated
Verify the file exists in the correct location:
```php
// Add this to check if file exists
if (Storage::disk('public')->exists('letter-of-acceptance/LOA-ABS286-Akhiyar Waladi.pdf')) {
    Log::info('File exists in storage');
} else {
    Log::error('File not found in storage');
}
```

### 5. URL Generation Issue
The URL might be incorrect. Check APP_URL in .env:
```
APP_URL=https://jicest.unja.ac.id
```

## Quick Debug Steps for cPanel

1. **Check if storage link exists:**
   - Go to `public/` folder in File Manager
   - Look for `storage` folder (should be a symbolic link)

2. **Check file exists:**
   - Navigate to `storage/app/public/letter-of-acceptance/`
   - Verify PDF file exists

3. **Test direct access:**
   - Try accessing file directly via File Manager
   - Download and verify it's a valid PDF

4. **Check permissions:**
   - Right-click folder → Properties → Permissions
   - Should be 755 for folders, 644 for files

5. **Check .htaccess:**
   - Ensure no rules blocking PDF access

## Immediate Fix Command for cPanel

Via SSH or create PHP file to execute:
```php
<?php
// Place this in public/debug-storage.php and access via browser

echo "Checking storage setup...\n\n";

// Check if storage link exists
if (is_link('storage')) {
    echo "✓ Storage symlink exists\n";
} else {
    echo "✗ Storage symlink missing - Run: php artisan storage:link\n";
}

// Check specific file
$filePath = 'storage/letter-of-acceptance/LOA-ABS286-Akhiyar Waladi.pdf';
if (file_exists($filePath)) {
    echo "✓ File exists: $filePath\n";
    echo "File size: " . filesize($filePath) . " bytes\n";
} else {
    echo "✗ File not found: $filePath\n";
}

// Check directory permissions
$dir = 'storage/letter-of-acceptance';
if (is_dir($dir)) {
    echo "✓ Directory exists: $dir\n";
    echo "Directory permissions: " . substr(sprintf('%o', fileperms($dir)), -4) . "\n";
} else {
    echo "✗ Directory not found: $dir\n";
}
?>
```