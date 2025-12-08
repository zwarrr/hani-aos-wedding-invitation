# Wedding Invitation - Laravel Integration

Project undangan pernikahan yang telah diintegrasikan dengan Laravel Framework.

## ✅ Perbaikan Terbaru

### Folder Backend Dihapus
- **Folder `resources/views/backend/`** sudah dihapus karena tidak lagi dibutuhkan
- Semua fungsi backend sudah digantikan oleh Laravel Controller (`UcapanController.php`)
- File-file PHP native (ucapan.php, database.php, dll) sudah tidak digunakan lagi

### Session & Cache Configuration
- Session driver diubah dari `database` ke `cookie` untuk menghindari error tabel sessions
- Cache store diubah dari `database` ke `file`
- Queue connection diubah ke `sync` untuk development

## Perubahan yang Dilakukan

### 1. **Controller**
- **File**: `app/Http/Controllers/UcapanController.php`
- Menangani CRUD untuk ucapan/doa dari tamu
- Endpoints:
  - `GET /api/ucapan` - Mendapatkan daftar ucapan (dengan pagination)
  - `POST /api/ucapan` - Menambahkan ucapan baru
  - `DELETE /api/ucapan/{id}` - Menghapus ucapan tertentu
  - `DELETE /api/ucapan` - Menghapus semua ucapan

### 2. **Database Migration**
- **File**: `database/migrations/2025_12_08_000003_create_ucapan_table.php`
- Membuat tabel `ucapan` dengan kolom:
  - `id` (primary key)
  - `nama` (varchar 255)
  - `pesan` (text)
  - `kehadiran` (enum: hadir, tidak_hadir, masih_ragu)
  - `created_at` (timestamp)

### 3. **Routing**
- **File**: `routes/web.php`
- Route frontend:
  - `GET /` - Halaman landing (index)
  - `GET /main` - Halaman utama undangan
- Route API:
  - `GET /api/ucapan` - Get ucapan
  - `POST /api/ucapan` - Submit ucapan
  - `DELETE /api/ucapan/{id}` - Delete ucapan
  - `DELETE /api/ucapan` - Clear all ucapan

### 4. **Konfigurasi Database**
- **File**: `.env`
- Menggunakan database MySQL (Filess.io)
- Kredensial sudah dikonfigurasi sesuai dengan backend PHP yang ada

### 5. **Views**
- **Frontend**: `resources/views/frontend/`
  - `index.blade.php` - Cover page / landing
  - `section-*.blade.php` - Section-section dari undangan
  
- **Main**: `resources/views/main.blade.php`
  - Halaman utama yang mengintegrasikan semua section
  - Menggunakan Laravel Blade `@include` untuk load sections
  - API calls menggunakan Laravel routes

## Cara Menjalankan

### 1. Install Dependencies
```bash
composer install
```

### 2. Generate Application Key
```bash
php artisan key:generate
```

### 3. Run Migration
```bash
php artisan migrate
```

### 4. Start Development Server
```bash
php artisan serve
```

### 5. Akses Aplikasi
- Landing page: `http://localhost:8000`
- Main page: `http://localhost:8000/main`

## Struktur Folder

```
wedding-invitation/
├── app/
│   └── Http/
│       └── Controllers/
│           └── UcapanController.php
├── database/
│   └── migrations/
│       └── 2025_12_08_000003_create_ucapan_table.php
├── resources/
│   └── views/
│       ├── frontend/
│       │   ├── index.blade.php (Landing/Cover)
│       │   ├── section-acara.blade.php
│       │   ├── section-amplop.blade.php
│       │   ├── section-ayat.blade.php
│       │   ├── section-countdown.blade.php
│       │   ├── section-footer.blade.php
│       │   ├── section-lovestory.blade.php
│       │   ├── section-mempelai.blade.php
│       │   └── section-ucapan.blade.php
│       └── main.blade.php (Main page)
├── routes/
│   └── web.php
└── .env
```

## Catatan Penting

1. **Styling dan Tampilan**: Semua styling dan tampilan tetap dipertahankan sesuai original. Tidak ada perubahan pada CSS atau design.

2. **Backend Folder**: Folder `resources/views/backend/` berisi konfigurasi PHP native yang sudah tidak digunakan lagi karena sudah digantikan dengan Laravel Controller.

3. **Database**: Pastikan koneksi database di `.env` sudah benar sebelum menjalankan migration.

4. **CSRF Token**: Semua POST request menggunakan CSRF token Laravel untuk keamanan.

5. **API Response**: Semua API response dalam format JSON dengan struktur:
   ```json
   {
     "success": true/false,
     "message": "...",
     "data": {...},
     "pagination": {...}
   }
   ```

## Troubleshooting

### Database Connection Error
Pastikan konfigurasi database di `.env` sudah benar dan database server dapat diakses.

### CSRF Token Mismatch
Pastikan aplikasi Laravel menggunakan session yang benar. Clear cache jika perlu:
```bash
php artisan cache:clear
php artisan config:clear
```

### Migration Error
Pastikan database sudah ada dan user memiliki permission yang cukup:
```bash
php artisan migrate:fresh
```
