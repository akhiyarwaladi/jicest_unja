# Cara Mengatasi File PDF Not Found di cPanel

## Masalah
File PDF seperti Letter of Acceptance (LOA) dan Receipt tidak bisa diakses melalui URL:
```
https://jicest.unja.ac.id/storage/letter-of-acceptance/LOA-ABS286-Akhiyar Waladi.pdf
```
Error: HTTP 404 Not Found

## Solusi Cepat

### 1. Debug Storage Setup
Akses file debug yang sudah dibuat:
```
https://jicest.unja.ac.id/debug-storage.php
```

### 2. Menggunakan Artisan Command (Direkomendasikan)
Login ke cPanel → Terminal atau SSH, lalu jalankan:
```bash
cd domains/jicest.unja.ac.id/
php artisan storage:fix
```

### 3. Manual Fix via cPanel File Manager

#### A. Cek Storage Symbolic Link
1. Buka File Manager
2. Navigasi ke folder `public/`
3. Cari folder `storage` (harus berupa symbolic link)
4. Jika tidak ada atau bukan symbolic link:
   ```bash
   # Via terminal
   cd public/
   ln -s ../storage/app/public storage
   ```

#### B. Cek Direktori Storage
1. Navigasi ke `storage/app/public/`
2. Pastikan folder berikut ada:
   - `letter-of-acceptance/`
   - `receipt/`
   - `invoice/`
   - `abstracts/`
   - `fulltext-papers/`

#### C. Fix Permissions
Set permissions via File Manager:
- Folder: `755` (rwxr-xr-x)
- File PDF: `644` (rw-r--r--)

### 4. Via cPanel Terminal (Jika Tersedia)
```bash
# Masuk ke direktori project
cd domains/jicest.unja.ac.id/

# Buat storage link
php artisan storage:link

# Fix permissions
chmod 755 storage/app/public
chmod 755 storage/app/public/letter-of-acceptance
chmod 755 storage/app/public/receipt
chmod 755 storage/app/public/invoice
chmod 644 storage/app/public/letter-of-acceptance/*.pdf
chmod 644 storage/app/public/receipt/*.pdf
chmod 644 storage/app/public/invoice/*.pdf

# Test command yang sudah dibuat
php artisan storage:fix
```

## Verifikasi Perbaikan

### 1. Test URL Langsung
Coba akses:
```
https://jicest.unja.ac.id/storage/letter-of-acceptance/LOA-ABS286-Akhiyar Waladi.pdf
```

### 2. Cek via Debug Script
```
https://jicest.unja.ac.id/debug-storage.php
```

### 3. Test Generate PDF Baru
1. Login sebagai admin
2. Review abstract baru
3. Accept dan generate LOA
4. Cek apakah URL berfungsi

## Penyebab Umum Masalah

1. **Storage Link Tidak Ada**
   - Symbolic link `public/storage` → `storage/app/public` hilang
   - Fix: `php artisan storage:link`

2. **Permission Salah**
   - Folder tidak readable (bukan 755)
   - File tidak readable (bukan 644)
   - Fix: chmod seperti di atas

3. **File Tidak Ter-generate**
   - PDF generation gagal tapi tidak ada error
   - Cek Laravel logs: `storage/logs/laravel.log`

4. **Path Salah di Environment**
   - APP_URL di `.env` tidak sesuai
   - Storage disk configuration salah

## Command Reference

```bash
# Storage commands
php artisan storage:link        # Buat symbolic link
php artisan storage:fix         # Fix semua masalah storage (custom command)

# Debug commands
php artisan tinker              # Interactive shell
>>> Storage::disk('public')->exists('letter-of-acceptance')
>>> Storage::disk('public')->files('letter-of-acceptance')

# Permission fixes
find storage/app/public -type d -exec chmod 755 {} \;     # Folders
find storage/app/public -type f -exec chmod 644 {} \;     # Files
```

## Monitoring

Untuk monitor file generation di production, tambahkan ke AbstractController:

```php
// Setelah generate PDF
Log::info('LOA generated', [
    'file_path' => $loaPath,
    'file_exists' => Storage::disk('public')->exists($loaPath),
    'file_size' => Storage::disk('public')->size($loaPath),
    'url' => asset('storage/' . $loaPath)
]);
```

## Kontak Support
Jika masalah masih berlanjut:
- Cek Laravel logs: `storage/logs/laravel.log`
- Hubungi hosting provider untuk bantuan permission
- Verify cPanel PHP version compatibility

---
**Catatan**: Hapus file `debug-storage.php` setelah masalah teratasi untuk keamanan.