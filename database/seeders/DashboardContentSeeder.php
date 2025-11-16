<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DashboardContent;
use Carbon\Carbon;

class DashboardContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing data
        DashboardContent::truncate();

        // Sample Announcements
        DashboardContent::create([
            'type' => 'announcement',
            'title' => 'Pembukaan Pendaftaran Eskul Semester Genap',
            'content' => 'Pendaftaran eskul untuk semester genap 2024/2025 telah dibuka! Silakan daftar melalui portal siswa. Jangan sampai terlewat, kuota terbatas untuk beberapa eskul favorit.',
            'category' => 'Pendaftaran',
            'icon' => 'fas fa-bullhorn',
            'author' => 'Admin Eskul',
            'is_active' => true,
            'order' => 1,
            'expires_at' => Carbon::now()->addMonth(),
        ]);

        DashboardContent::create([
            'type' => 'announcement',
            'title' => 'Workshop Teknologi untuk Semua Eskul',
            'content' => 'Akan diadakan workshop teknologi AI dan coding untuk semua anggota eskul. Workshop ini wajib diikuti dan akan memberikan sertifikat.',
            'category' => 'Workshop',
            'icon' => 'fas fa-laptop-code',
            'author' => 'Tim IT',
            'is_active' => true,
            'order' => 2,
            'expires_at' => Carbon::now()->addWeeks(2),
        ]);

        DashboardContent::create([
            'type' => 'announcement',
            'title' => 'Perubahan Jadwal Latihan Eskul',
            'content' => 'Jadwal latihan untuk eskul futsal dipindah ke hari Rabu pukul 15:00. Harap semua anggota menyesuaikan jadwal.',
            'category' => 'urgent',
            'icon' => 'fas fa-clock',
            'author' => 'Pelatih Futsal',
            'is_active' => true,
            'order' => 3,
        ]);

        // Sample Achievements
        DashboardContent::create([
            'type' => 'achievement',
            'title' => 'Juara 1 Lomba Robotika Tingkat Nasional',
            'content' => 'Tim Robotika SMKN 13 berhasil meraih juara 1 dalam lomba robotika tingkat nasional yang diselenggarakan di Jakarta. Prestasi membanggakan ini adalah hasil kerja keras tim selama 6 bulan.',
            'category' => 'Teknologi',
            'icon' => 'fas fa-robot',
            'author' => 'Tim Robotika SMKN 13',
            'is_active' => true,
            'order' => 1,
        ]);

        DashboardContent::create([
            'type' => 'achievement',
            'title' => 'Medali Emas Lomba Vocal Group',
            'content' => 'Sari Melati dari kelas XI RPL 2 meraih medali emas dalam lomba vocal group tingkat provinsi. Suara emas yang memukau juri.',
            'category' => 'Seni',
            'icon' => 'fas fa-microphone',
            'author' => 'Sari Melati XI RPL 2',
            'is_active' => true,
            'order' => 2,
        ]);

        DashboardContent::create([
            'type' => 'achievement',
            'title' => 'Juara 2 Olimpiade Matematika Regional',
            'content' => 'Budi Santoso dari kelas XI TKJ 1 berhasil meraih juara 2 dalam Olimpiade Matematika tingkat regional. Kemampuan analitis yang luar biasa.',
            'category' => 'Akademik',
            'icon' => 'fas fa-calculator',
            'author' => 'Budi Santoso XI TKJ 1',
            'is_active' => true,
            'order' => 3,
        ]);

        DashboardContent::create([
            'type' => 'achievement',
            'title' => 'Juara 3 Lomba Desain Grafis',
            'content' => 'Maya Sari dari kelas XI MM 1 meraih juara 3 dalam lomba desain grafis tingkat kota. Karya yang kreatif dan inovatif.',
            'category' => 'Desain',
            'icon' => 'fas fa-palette',
            'author' => 'Maya Sari XI MM 1',
            'is_active' => true,
            'order' => 4,
        ]);

        // Sample Tips
        DashboardContent::create([
            'type' => 'tip',
            'title' => 'Tips Sukses Mengikuti Eskul',
            'content' => 'Konsistensi adalah kunci utama sukses dalam eskul. Rajin mengikuti kegiatan tidak hanya meningkatkan skill, tapi juga membuka peluang beasiswa dan networking.',
            'category' => 'Motivasi',
            'icon' => 'fas fa-lightbulb',
            'author' => 'Guru BK',
            'is_active' => true,
            'order' => 1,
        ]);

        DashboardContent::create([
            'type' => 'tip',
            'title' => 'Manajemen Waktu yang Efektif',
            'content' => 'Buat jadwal harian dan prioritaskan kegiatan. Seimbangkan antara eskul, pelajaran utama, dan waktu istirahat. Gunakan aplikasi reminder untuk membantu.',
            'category' => 'Produktivitas',
            'icon' => 'fas fa-clock',
            'author' => 'Wali Kelas',
            'is_active' => true,
            'order' => 2,
        ]);

        DashboardContent::create([
            'type' => 'tip',
            'title' => 'Cara Membangun Networking di Eskul',
            'content' => 'Aktif berkomunikasi dengan anggota eskul lain. Ikuti event dan kompetisi. Networking yang baik akan membantu karir masa depan.',
            'category' => 'Networking',
            'icon' => 'fas fa-users',
            'author' => 'Alumni Sukses',
            'is_active' => true,
            'order' => 3,
        ]);

        DashboardContent::create([
            'type' => 'tip',
            'title' => 'Pentingnya Dokumentasi Kegiatan',
            'content' => 'Selalu dokumentasikan kegiatan eskul untuk portofolio. Foto, video, dan sertifikat akan sangat berguna untuk apply beasiswa atau pekerjaan.',
            'category' => 'Dokumentasi',
            'icon' => 'fas fa-camera',
            'author' => 'Koordinator Eskul',
            'is_active' => true,
            'order' => 4,
        ]);

        // Sample News
        DashboardContent::create([
            'type' => 'news',
            'title' => 'Eskul Terbaru: Coding & AI Club',
            'content' => 'SMKN 13 membuka eskul baru Coding & AI Club untuk siswa yang tertarik dengan teknologi artificial intelligence dan machine learning.',
            'category' => 'Eskul Baru',
            'icon' => 'fas fa-code',
            'author' => 'Kepala Sekolah',
            'is_active' => true,
            'order' => 1,
        ]);

        DashboardContent::create([
            'type' => 'news',
            'title' => 'Kerjasama dengan Industri Teknologi',
            'content' => 'Sekolah menjalin kerjasama dengan beberapa perusahaan teknologi untuk memberikan pelatihan dan magang kepada siswa eskul teknologi.',
            'category' => 'Kerjasama',
            'icon' => 'fas fa-handshake',
            'author' => 'Humas Sekolah',
            'is_active' => true,
            'order' => 2,
        ]);

        // Sample Events
        DashboardContent::create([
            'type' => 'event',
            'title' => 'Festival Eskul 2025',
            'content' => 'Festival tahunan yang menampilkan semua eskul di sekolah. Akan ada pameran, pertunjukan, dan kompetisi antar eskul.',
            'category' => 'Festival',
            'icon' => 'fas fa-calendar-star',
            'author' => 'Panitia Festival',
            'is_active' => true,
            'order' => 1,
            'expires_at' => Carbon::now()->addMonth(2),
        ]);

        DashboardContent::create([
            'type' => 'event',
            'title' => 'Kompetisi Antar Eskul',
            'content' => 'Kompetisi bulanan antar eskul dalam berbagai kategori. Pemenang mendapat trophy dan sertifikat penghargaan.',
            'category' => 'Kompetisi',
            'icon' => 'fas fa-trophy',
            'author' => 'OSIS',
            'is_active' => true,
            'order' => 2,
            'expires_at' => Carbon::now()->addWeeks(3),
        ]);
    }
}
