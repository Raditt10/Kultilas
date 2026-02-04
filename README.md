# Kultilas - Sistem Informasi Ekstrakurikuler

![Laravel](https://img.shields.io/badge/Laravel-12.38.1-FF2D20?style=flat&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.3.25-777BB4?style=flat&logo=php&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-3.x-38B2AC?style=flat&logo=tailwind-css&logoColor=white)
![Alpine.js](https://img.shields.io/badge/Alpine.js-3.x-8BC0D0?style=flat&logo=alpine.js&logoColor=white)

## Deskripsi Singkat

Kultilas adalah sistem informasi modern untuk manajemen ekstrakurikuler di SMKN 13 Bandung. Website ini memudahkan pendaftaran, presensi, pencatatan prestasi, dan pengelolaan seluruh kegiatan ekstrakurikuler secara digital, dengan tampilan profesional, fitur lengkap, dan akses khusus untuk admin, pembina, pelatih, serta siswa.

Sistem Informasi Manajemen Ekstrakurikuler Modern untuk **SMKN 13 Bandung**. Platform ini memudahkan pengelolaan kegiatan ekstrakurikuler dengan fitur lengkap untuk administrator, pembina, pelatih, dan siswa.

## 📋 Daftar Isi

- [Fitur Utama](#-fitur-utama)
- [Teknologi](#-teknologi)
- [Prasyarat](#-prasyarat)
- [Instalasi](#-instalasi)
- [Konfigurasi](#-konfigurasi)
- [Menjalankan Aplikasi](#-menjalankan-aplikasi)
- [Role & Akses](#-role--akses)
- [Struktur Database](#-struktur-database)
- [Troubleshooting](#-troubleshooting)

## ✨ Fitur Utama

### Untuk Semua Pengguna
- 🎨 **Modern UI/UX** dengan Tailwind CSS dan Alpine.js
- 🌓 **Dark Mode** dengan persistent storage
- 📱 **Responsive Design** untuk semua perangkat
- ✍️ **Typing Animation** pada hero section
- 🎴 **Flip Card Animation** untuk tampilan ekstrakurikuler
- 🖼️ **Profile Photo Upload** dengan preview

### Fitur Administrator
- 📊 Dashboard dengan statistik lengkap
- 👥 Manajemen pengguna (Pembina, Pelatih, Siswa)
- 🎯 Kelola semua ekstrakurikuler
- 📰 Konten dinamis (Berita, Pencapaian, Tips)
- 📈 Laporan dan monitoring keseluruhan

### Fitur Pembina/Pelatih
- 🏫 Kelola ekstrakurikuler yang dibina/dilatih
- ✅ Presensi digital siswa
- 🏆 Catat prestasi siswa
- 📋 Lihat daftar anggota
- 📊 Dashboard khusus pembina/pelatih

### Fitur Siswa
- 📝 Pendaftaran ekstrakurikuler online
- 👀 Lihat jadwal dan informasi eskul
- 🏅 Riwayat prestasi pribadi
- 📅 Track kehadiran
- 🔔 Notifikasi dan pengumuman

## 🛠 Teknologi

### Backend
- **Laravel 12.38.1** - PHP Framework
- **PHP 8.3.25** - Server-side Language
- **MySQL** - Relational Database

### Frontend
- **Blade** - Template Engine
- **Tailwind CSS 3.x** - Utility-first CSS Framework
- **Alpine.js 3.x** - Lightweight JavaScript Framework
- **Vite** - Frontend Build Tool

### UI Features
- Glassmorphism Effects
- CSS 3D Transforms
- Gradient Design
- Custom Animations
- Google Fonts (Poppins)

## 📦 Prasyarat

Pastikan sistem Anda memiliki:

- **PHP** >= 8.2
- **Composer** >= 2.0
- **Node.js** >= 18.x & **NPM** >= 9.x
- **MySQL** >= 8.0 atau **MariaDB** >= 10.3
- **Git**

Atau gunakan **Laragon** untuk development yang lebih mudah.

## 🚀 Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/Raditt10/Kult1las-native.git
cd Kult1las-native
```

### 2. Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install Node dependencies
npm install
```

### 3. Setup Environment

```bash
# Copy file environment
copy .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Konfigurasi Database

Edit file `.env` dan sesuaikan dengan konfigurasi database Anda:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_eskul
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Buat Database

Buat database baru dengan nama `db_eskul`:

```sql
CREATE DATABASE db_eskul;
```

Atau import file SQL yang tersedia:

```bash
# Import database dari file SQL
mysql -u root -p db_eskul < database/db_eskul.sql
```

### 6. Migrasi & Seeding

```bash
# Jalankan migrasi database
php artisan migrate

# (Optional) Seed data dummy
php artisan db:seed
php artisan db:seed --class=DashboardContentSeeder
```

## ⚙️ Konfigurasi

### File Storage

Buat symbolic link untuk public storage:

```bash
php artisan storage:link
```

### Cache Optimization

```bash
# Clear all cache
php artisan config:clear
php artisan view:clear
php artisan cache:clear
php artisan route:clear

# Untuk production, optimize cache
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Asset Compilation

```bash
# Development mode (watch untuk perubahan)
npm run dev

# Production build
npm run build
```

## 🎯 Menjalankan Aplikasi

### Development Server

**Opsi 1: Laravel Artisan**
```bash
php artisan serve
```
Aplikasi akan berjalan di `http://localhost:8000`

**Opsi 2: Laragon**
- Buka Laragon
- Klik "Start All"
- Akses `http://kultilas.test` atau `http://localhost/Kultilas`

**Opsi 3: Vite Dev Server**
```bash
# Terminal 1 - PHP Server
php artisan serve

# Terminal 2 - Vite Dev Server
npm run dev
```

### Production Deployment

```bash
# Build assets
npm run build

# Optimize Laravel
php artisan optimize

# Set permissions (Linux/Mac)
chmod -R 775 storage bootstrap/cache
```

## 👥 Role & Akses

### Default Login Credentials

Setelah seeding, gunakan kredensial berikut:

**Administrator**
- Email: `admin@kultilas.com`
- Password: `password`
- Route: `/login`

**Pembina**
- Email: `pembina@kultilas.com`
- Password: `password`
- Route: `/login`

**Pelatih**
- Email: `pelatih@kultilas.com`
- Password: `password`
- Route: `/login`

**Siswa**
- NIS: Lihat di database
- Password: `password`
- Route: `/siswa/login`

### Halaman Utama
- **Homepage**: `http://localhost:8000/`
- **Admin Dashboard**: `http://localhost:8000/admin/dashboard`
- **Pembina Dashboard**: `http://localhost:8000/pembina/dashboard`
- **Siswa Dashboard**: `http://localhost:8000/siswa/dashboard`

## 🗃 Struktur Database

### Tabel Utama

- `pengguna` - Data pengguna (Admin, Pembina, Pelatih)
- `siswa` - Data siswa
- `eskul` - Data ekstrakurikuler
- `pendaftaran_eskul` - Pendaftaran siswa ke eskul
- `presensi` - Kehadiran siswa
- `prestasi` - Pencapaian siswa
- `dashboard_contents` - Konten dinamis (News, Achievement, Tips)

### ERD Relationship

```
pengguna (1) ---> (N) eskul (pembina_id)
pengguna (1) ---> (N) eskul (pelatih_id)
siswa (1) ---> (N) pendaftaran_eskul
eskul (1) ---> (N) pendaftaran_eskul
pendaftaran_eskul (1) ---> (N) presensi
pendaftaran_eskul (1) ---> (N) prestasi
```

## 🐛 Troubleshooting

### Error: Class not found
```bash
composer dump-autoload
```

### Error: Storage link
```bash
php artisan storage:link
```

### Error: Permission denied (Linux/Mac)
```bash
sudo chmod -R 775 storage
sudo chmod -R 775 bootstrap/cache
```

### Error: Mix manifest not found
```bash
npm run build
```

### Clear all cache
```bash
php artisan optimize:clear
```

## 🤝 Kontributor

Dikembangkan oleh Raditt10

## 📝 Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
