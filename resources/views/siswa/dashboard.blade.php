@extends('siswa.layout')

@section('title', 'Dashboard Siswa')

@section('content')
<div class="space-y-8">
<!-- Welcome Header -->
<div class="bg-gradient-to-r from-green-600 to-emerald-600 rounded-2xl shadow-xl p-8 text-white relative overflow-hidden">
    <div class="relative z-10">
        <h1 class="text-3xl font-bold mb-2">Selamat Datang, {{ $siswa->nama_siswa }}! 🎉</h1>
        <p class="text-green-100 text-lg">Kelas {{ $siswa->kelas ?? 'XI' }} • NIS: {{ $siswa->nis }}</p>
        <div class="mt-4 flex items-center space-x-4">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                </svg>
                <span class="text-sm">{{ now()->format('l, d F Y') }}</span>
            </div>
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                </svg>
                <span class="text-sm">{{ now()->format('H:i') }} WIB</span>
            </div>
        </div>
    </div>
    <!-- Background decoration removed for cleaner header -->
</div>

<!-- Statistics Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 border-l-4 border-green-500">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-gray-500 dark:text-gray-400 text-sm font-medium uppercase tracking-wider">Eskul Aktif</h3>
                <p class="text-3xl font-bold text-green-600 dark:text-green-400 mt-2">{{ $pendaftaran->where('status', 'diterima')->count() }}</p>
                <p class="text-green-600 dark:text-green-400 text-sm mt-1">{{ $pendaftaran->where('status', 'diterima')->count() > 0 ? 'Aktif berkegiatan' : 'Belum ada eskul' }}</p>
            </div>
            <div class="bg-green-100 dark:bg-green-900 p-3 rounded-full">
                <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>
    </div>
    
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 border-l-4 border-yellow-500">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-gray-500 dark:text-gray-400 text-sm font-medium uppercase tracking-wider">Menunggu Approval</h3>
                <p class="text-3xl font-bold text-yellow-600 dark:text-yellow-400 mt-2">{{ $pendaftaran->where('status', 'pending')->count() }}</p>
                <p class="text-yellow-600 dark:text-yellow-400 text-sm mt-1">{{ $pendaftaran->where('status', 'pending')->count() > 0 ? 'Sedang diproses' : 'Tidak ada pending' }}</p>
            </div>
            <div class="bg-yellow-100 dark:bg-yellow-900 p-3 rounded-full">
                <svg class="w-8 h-8 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>
    </div>
    
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 border-l-4 border-purple-500">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-gray-500 dark:text-gray-400 text-sm font-medium uppercase tracking-wider">Total Prestasi</h3>
                <p class="text-3xl font-bold text-purple-600 dark:text-purple-400 mt-2">{{ rand(0, 5) }}</p>
                <p class="text-purple-600 dark:text-purple-400 text-sm mt-1">Pencapaian gemilang</p>
            </div>
            <div class="bg-purple-100 dark:bg-purple-900 p-3 rounded-full">
                <svg class="w-8 h-8 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Main Dashboard Grid -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Left Column -->
    <div class="lg:col-span-2 space-y-8">
        <!-- Pengumuman Eskul -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 transition-all duration-200 hover:shadow-xl">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <div class="bg-green-100 dark:bg-green-900 p-3 rounded-lg mr-4">
                        <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold text-gray-800 dark:text-white">📢 Pengumuman Penting</h2>
                </div>
                <span class="text-green-600 hover:text-green-700 text-sm font-medium cursor-pointer">Lihat Semua</span>
            </div>
            
            <div class="space-y-4">
                @php
                $announcements = App\Models\DashboardContent::active()
                    ->ofType('announcement')
                    ->orderBy('order')
                    ->orderBy('created_at', 'desc')
                    ->limit(3)
                    ->get()
                    ->map(function($item) {
                        return [
                            'title' => $item->title,
                            'content' => $item->content,
                            'time' => $item->created_at->diffForHumans(),
                            'type' => $item->category === 'urgent' ? 'alert' : ($item->category === 'warning' ? 'warning' : 'info')
                        ];
                    });
                
                // Fallback jika tidak ada data
                if ($announcements->isEmpty()) {
                    $announcements = collect([
                        ['title' => 'Selamat Datang!', 'content' => 'Belum ada pengumuman terbaru. Admin akan segera menambahkan konten.', 'time' => 'Baru saja', 'type' => 'info'],
                    ]);
                }
                @endphp
                
                @foreach($announcements as $announcement)
                <div class="flex items-start p-4 {{ $announcement['type'] === 'alert' ? 'bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800' : ($announcement['type'] === 'warning' ? 'bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800' : 'bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800') }} rounded-lg hover:shadow-md transition-shadow">
                    <div class="flex-shrink-0 mr-4">
                        @if($announcement['type'] === 'alert')
                            <div class="w-10 h-10 bg-red-500 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        @elseif($announcement['type'] === 'warning')
                            <div class="w-10 h-10 bg-yellow-500 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        @else
                            <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        @endif
                    </div>
                    <div class="flex-1">
                        <h3 class="font-semibold text-gray-800 dark:text-white mb-1">{{ $announcement['title'] }}</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm mb-2">{{ $announcement['content'] }}</p>
                        <p class="text-gray-400 dark:text-gray-500 text-xs">{{ $announcement['time'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Prestasi Terbaru -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 transition-all duration-200 hover:shadow-xl">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <div class="bg-yellow-100 dark:bg-yellow-900 p-3 rounded-lg mr-4">
                        <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold text-gray-800 dark:text-white">🏆 Hall of Fame</h2>
                </div>
                <span class="text-yellow-600 hover:text-yellow-700 text-sm font-medium cursor-pointer">Lihat Semua</span>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @php
                $achievements = App\Models\DashboardContent::active()
                    ->ofType('achievement')
                    ->orderBy('order')
                    ->orderBy('created_at', 'desc')
                    ->limit(4)
                    ->get()
                    ->map(function($item) {
                        // Tentukan medal berdasarkan konten atau kategori
                        $medal = '🏆';
                        if (stripos($item->content, 'juara 1') !== false || stripos($item->title, 'juara 1') !== false) {
                            $medal = '🥇';
                        } elseif (stripos($item->content, 'juara 2') !== false || stripos($item->title, 'juara 2') !== false) {
                            $medal = '🥈';
                        } elseif (stripos($item->content, 'juara 3') !== false || stripos($item->title, 'juara 3') !== false) {
                            $medal = '🥉';
                        }
                        
                        return [
                            'title' => $item->title,
                            'student' => $item->author ?? 'Tim ' . ($item->category ?? 'Eskul'),
                            'medal' => $medal,
                            'category' => $item->category ?? 'Prestasi',
                            'date' => $item->formatted_date
                        ];
                    });
                
                // Fallback jika tidak ada data
                if ($achievements->isEmpty()) {
                    $achievements = collect([
                        ['title' => 'Belum Ada Prestasi', 'student' => 'Tunggu update dari admin', 'medal' => '🏆', 'category' => 'Coming Soon', 'date' => 'Segera'],
                    ]);
                }
                @endphp
                
                @foreach($achievements as $achievement)
                <div class="bg-gradient-to-r from-yellow-50 to-amber-50 dark:from-yellow-900/20 dark:to-amber-900/20 p-4 rounded-lg border border-yellow-200 dark:border-yellow-700 hover:shadow-md transition-all cursor-pointer">
                    <div class="flex items-center mb-3">
                        <span class="text-3xl mr-3">{{ $achievement['medal'] }}</span>
                        <div class="flex-1">
                            <h3 class="font-semibold text-gray-800 dark:text-white text-sm">{{ $achievement['title'] }}</h3>
                            <p class="text-xs text-gray-600 dark:text-gray-300">{{ $achievement['student'] }}</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="inline-block px-2 py-1 text-xs bg-yellow-200 dark:bg-yellow-800 text-yellow-800 dark:text-yellow-200 rounded-full">{{ $achievement['category'] }}</span>
                        <span class="text-xs text-gray-500 dark:text-gray-400">{{ $achievement['date'] }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Right Column -->
    <div class="space-y-8">
        <!-- Quick Actions / Menu Cepat -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
            <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-6">⚡ Menu Cepat</h2>
            <div class="space-y-3">
                <a href="{{ route('siswa.eskul') }}" class="flex items-center p-3 bg-green-50 dark:bg-green-900/20 rounded-lg hover:bg-green-100 dark:hover:bg-green-900/30 transition-colors group">
                    <div class="bg-green-500 p-2 rounded-lg mr-3 group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-800 dark:text-white text-sm">Daftar Eskul</span>
                        <p class="text-gray-600 dark:text-gray-300 text-xs">Pilih ekstrakurikuler</p>
                    </div>
                </a>
                
                <a href="#" class="flex items-center p-3 bg-green-50 dark:bg-green-900/20 rounded-lg hover:bg-green-100 dark:hover:bg-green-900/30 transition-colors group">
                    <div class="bg-green-500 p-2 rounded-lg mr-3 group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-800 dark:text-white text-sm">Presensi</span>
                        <p class="text-gray-600 dark:text-gray-300 text-xs">Cek kehadiran</p>
                    </div>
                </a>
                
                <a href="#" class="flex items-center p-3 bg-purple-50 dark:bg-purple-900/20 rounded-lg hover:bg-purple-100 dark:hover:bg-purple-900/30 transition-colors group">
                    <div class="bg-purple-500 p-2 rounded-lg mr-3 group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-800 dark:text-white text-sm">Profil</span>
                        <p class="text-gray-600 dark:text-gray-300 text-xs">Edit data diri</p>
                    </div>
                </a>
            </div>
        </div>

        <!-- Tips & Motivasi -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
            <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-6">💡 Tips Hari Ini</h2>
            <div class="space-y-4">
                @php
                $tips = App\Models\DashboardContent::active()
                    ->ofType('tip')
                    ->orderBy('order')
                    ->orderBy('created_at', 'desc')
                    ->limit(4)
                    ->get()
                    ->map(function($item) {
                        return [
                            'title' => $item->title,
                            'content' => $item->content,
                            'author' => $item->author ?? 'Admin'
                        ];
                    });
                
                // Fallback jika tidak ada data
                if ($tips->isEmpty()) {
                    $tips = collect([
                        ['title' => 'Tips Sukses Bereskul', 'content' => 'Konsistensi adalah kunci! Rajin mengikuti kegiatan tidak hanya meningkatkan skill, tapi juga membuka peluang beasiswa.', 'author' => 'Admin'],
                        ['title' => 'Manajemen Waktu Efektif', 'content' => 'Buat jadwal harian dan prioritaskan kegiatan. Seimbangkan antara eskul dan pelajaran utama.', 'author' => 'Admin'],
                    ]);
                }
                @endphp
                
                @foreach($tips as $tip)
                <div class="bg-gradient-to-r from-indigo-50 to-purple-50 dark:from-indigo-900/20 dark:to-purple-900/20 p-4 rounded-lg border border-indigo-200 dark:border-indigo-700">
                    <h3 class="font-semibold text-gray-800 dark:text-white text-sm mb-2">{{ $tip['title'] }}</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-xs mb-3">{{ $tip['content'] }}</p>
                    <div class="flex items-center justify-between">
                        <span class="text-xs text-indigo-600 dark:text-indigo-400 font-medium">- {{ $tip['author'] }}</span>
                        <span class="text-xs text-gray-400">💡</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Jadwal Hari Ini -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
            <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-6">📅 Jadwal Hari Ini</h2>
            <div class="space-y-3">
                @php
                $schedules = collect([
                    ['activity' => 'Latihan Futsal', 'time' => '15:30 - 17:00', 'location' => 'Lapangan Sekolah', 'status' => 'upcoming'],
                    ['activity' => 'Rapat Koordinasi Eskul', 'time' => '13:00 - 14:00', 'location' => 'Ruang OSIS', 'status' => 'completed'],
                ]);
                @endphp
                
                @if($schedules->count() > 0)
                    @foreach($schedules as $schedule)
                    <div class="flex items-center p-3 {{ $schedule['status'] === 'completed' ? 'bg-gray-50 dark:bg-gray-700' : 'bg-green-50 dark:bg-green-900/20' }} rounded-lg border-l-4 {{ $schedule['status'] === 'completed' ? 'border-gray-400' : 'border-green-500' }}">
                        <div class="flex-1">
                            <h4 class="font-semibold text-gray-800 dark:text-white text-sm {{ $schedule['status'] === 'completed' ? 'line-through' : '' }}">{{ $schedule['activity'] }}</h4>
                            <p class="text-xs text-gray-600 dark:text-gray-300">{{ $schedule['time'] }} • {{ $schedule['location'] }}</p>
                        </div>
                        <div class="w-3 h-3 {{ $schedule['status'] === 'completed' ? 'bg-gray-400' : 'bg-green-500' }} rounded-full {{ $schedule['status'] === 'upcoming' ? 'animate-pulse' : '' }}"></div>
                    </div>
                    @endforeach
                @else
                    <div class="text-center py-8">
                        <svg class="w-12 h-12 text-gray-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <p class="text-gray-500 dark:text-gray-400 text-sm">Tidak ada jadwal hari ini</p>
                        <p class="text-gray-400 dark:text-gray-500 text-xs">Nikmati waktu luangmu! 😊</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Ekstrakurikuler Saya -->
<div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center">
            <div class="bg-gradient-to-r from-green-500 to-emerald-500 p-3 rounded-lg mr-4">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-800 dark:text-white">🎭 Ekstrakurikuler Saya</h3>
        </div>
        <a href="{{ route('siswa.eskul') }}" class="text-green-600 hover:text-green-700 text-sm font-medium">Daftar Eskul Baru</a>
    </div>
    
    @if($pendaftaran->isEmpty())
        <div class="text-center py-12">
            <div class="bg-gray-100 dark:bg-gray-700 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
            </div>
            <h4 class="text-lg font-semibold text-gray-800 dark:text-white mb-2">Belum Ada Ekstrakurikuler</h4>
            <p class="text-gray-500 dark:text-gray-400 mb-6">Ayo bergabung dengan ekstrakurikuler untuk mengembangkan bakat dan minatmu!</p>
            <a href="{{ route('siswa.eskul') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white font-semibold rounded-lg hover:from-green-700 hover:to-emerald-700 transition-all duration-200 transform hover:scale-105">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Daftar Sekarang
            </a>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nama Eskul</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Jadwal</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Pembina</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($pendaftaran as $p)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <div class="h-10 w-10 rounded-full bg-gradient-to-r from-green-500 to-emerald-500 flex items-center justify-center">
                                            <span class="text-white font-semibold text-sm">{{ substr($p->eskul->nama_eskul, 0, 2) }}</span>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $p->eskul->nama_eskul }}</div>
                                        <div class="text-sm text-gray-500 dark:text-gray-400">{{ $p->eskul->deskripsi ?? 'Ekstrakurikuler' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900 dark:text-white">{{ $p->eskul->hari_kegiatan }}</div>
                                <div class="text-sm text-gray-500 dark:text-gray-400">{{ $p->eskul->jam_mulai ?? '15:30' }} WIB</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                {{ $p->eskul->pembina }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex px-3 py-1 rounded-full text-xs font-semibold
                                    {{ $p->status == 'diterima' ? 'bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200' : 
                                       ($p->status == 'ditolak' ? 'bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200' : 
                                        'bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200') }}">
                                    @if($p->status == 'diterima')
                                        ✅ Diterima
                                    @elseif($p->status == 'ditolak')
                                        ❌ Ditolak
                                    @else
                                        ⏳ Menunggu
                                    @endif
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-2">
                                    <button class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">Detail</button>
                                    @if($p->status == 'pending')
                                    <button class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">Batal</button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <!-- Summary Footer -->
        <div class="mt-6 p-4 bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 rounded-lg">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-6">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-green-600 dark:text-green-400">{{ $pendaftaran->where('status', 'diterima')->count() }}</div>
                        <div class="text-xs text-gray-600 dark:text-gray-300">Aktif</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-yellow-600 dark:text-yellow-400">{{ $pendaftaran->where('status', 'pending')->count() }}</div>
                        <div class="text-xs text-gray-600 dark:text-gray-300">Pending</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-gray-600 dark:text-gray-400">{{ $pendaftaran->count() }}</div>
                        <div class="text-xs text-gray-600 dark:text-gray-300">Total</div>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-sm text-gray-600 dark:text-gray-300">Tetap semangat berkegiatan! 💪</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">Update terakhir: {{ now()->format('d M Y, H:i') }}</p>
                </div>
            </div>
        </div>
    @endif
</div>
</div>
@endsection