@extends('layouts.admin')

@section('page-title', 'Dashboard Admin')

@section('content')
<!-- Welcome Header -->
<div class="bg-gradient-to-r from-green-600 to-emerald-600 rounded-lg shadow-md p-5 mb-5 text-white">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-bold mb-1">Selamat Datang, {{ auth()->user()->name ?? 'Admin' }}! 👋</h1>
            <p class="text-green-100 text-sm">Kelola sistem ekstrakurikuler dengan mudah dan efisien</p>
        </div>
        <div class="hidden md:flex items-center space-x-4 text-sm">
            <div class="flex items-center">
                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                </svg>
                <span>{{ now()->format('d M Y') }}</span>
            </div>
            <div class="flex items-center">
                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                </svg>
                <span>{{ now()->format('H:i') }}</span>
            </div>
        </div>
    </div>
</div>

<!-- Statistics Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    <!-- Card Siswa -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700 p-4 hover:shadow-md transition-all duration-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 dark:text-gray-400 text-xs font-medium">Total Siswa</p>
                <h3 class="text-3xl font-bold text-green-700 dark:text-green-400 mt-2">{{ $stats['total_siswa'] }}</h3>
            </div>
            <div class="bg-green-100 dark:bg-green-900 p-2 rounded-lg">
                <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Card Ekstrakurikuler -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700 p-4 hover:shadow-md transition-all duration-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 dark:text-gray-400 text-xs font-medium">Ekstrakurikuler</p>
                <h3 class="text-3xl font-bold text-blue-600 dark:text-blue-400 mt-2">{{ $stats['total_eskul'] }}</h3>
            </div>
            <div class="bg-blue-100 dark:bg-blue-900 p-2 rounded-lg">
                <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Card Pendaftaran -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700 p-4 hover:shadow-md transition-all duration-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 dark:text-gray-400 text-xs font-medium">Pendaftaran</p>
                                <h3 class="text-3xl font-bold text-green-600 dark:text-green-400 mt-2">{{ $stats['total_pendaftaran'] }}</h3>
            </div>
            <div class="bg-emerald-100 dark:bg-emerald-900 p-2 rounded-lg">
                <svg class="w-6 h-6 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Card Prestasi -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700 p-4 hover:shadow-md transition-all duration-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 dark:text-gray-400 text-xs font-medium">Prestasi</p>
                <h3 class="text-2xl font-bold text-amber-600 dark:text-amber-400 mt-1">{{ \App\Models\Prestasi::count() }}</h3>
            </div>
            <div class="bg-amber-100 dark:bg-amber-900 p-2 rounded-lg">
                <svg class="w-6 h-6 text-amber-600 dark:text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Main Dashboard Grid -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-5 mb-5">
    <!-- Left Column -->
    <div class="lg:col-span-2 space-y-5">
        <!-- Pengumuman Eskul -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700 p-4 transition-all duration-200 hover:shadow-md">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <div class="bg-blue-100 dark:bg-blue-900 p-2 rounded-lg mr-3">
                        <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                        </svg>
                    </div>
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Pengumuman Terbaru</h2>
                </div>
                <button class="text-blue-600 hover:text-blue-700 text-xs font-medium px-2 py-1 rounded hover:bg-blue-50 dark:hover:bg-blue-900/20">Lihat Semua</button>
            </div>
            
            <div class="space-y-3">
                @forelse($newsItems as $news)
                @php
                    $priority = $news->category === 'Urgent' ? 'high' : ($news->category === 'Important' ? 'medium' : 'low');
                @endphp
                <div class="flex items-center p-3 {{ $priority === 'high' ? 'bg-red-50 dark:bg-red-900/20 border-l-3 border-red-500' : ($priority === 'medium' ? 'bg-yellow-50 dark:bg-yellow-900/20 border-l-3 border-yellow-500' : 'bg-gray-50 dark:bg-gray-700 border-l-3 border-gray-400') }} rounded-md transition-colors duration-200 hover:shadow-sm">
                    <div class="flex-1">
                        <h3 class="font-semibold text-gray-800 dark:text-white">{{ $news->title }}</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">{{ $news->created_at->diffForHumans() }}</p>
                        @if($news->category)
                            <span class="inline-block px-2 py-1 text-xs bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 rounded-full mt-1">{{ $news->category }}</span>
                        @endif
                    </div>
                    <div class="flex items-center space-x-2">
                        @if($priority === 'high')
                            <span class="w-2 h-2 bg-red-500 rounded-full animate-pulse"></span>
                        @elseif($priority === 'medium')
                            <span class="w-2 h-2 bg-yellow-500 rounded-full"></span>
                        @else
                            <span class="w-2 h-2 bg-gray-400 rounded-full"></span>
                        @endif
                    </div>
                </div>
                @empty
                <div class="flex items-center justify-center p-8 text-gray-500 dark:text-gray-400">
                    <div class="text-center">
                        <i class="fas fa-bullhorn text-4xl mb-3 text-gray-300 dark:text-gray-600"></i>
                        <p class="font-medium">Belum ada pengumuman</p>
                        <p class="text-sm">Tambahkan pengumuman melalui <a href="{{ route('admin.dashboard-content.create') }}" class="text-blue-600 hover:text-blue-800">panel admin</a></p>
                    </div>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Prestasi Terbaru -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700 p-4 transition-all duration-200 hover:shadow-md">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <div class="bg-amber-100 dark:bg-amber-900 p-2 rounded-lg mr-3">
                        <svg class="w-5 h-5 text-amber-600 dark:text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                        </svg>
                    </div>
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Prestasi Gemilang</h2>
                </div>
                <button class="text-yellow-600 hover:text-yellow-700 text-sm font-medium">Lihat Semua</button>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                @forelse($achievements as $achievement)
                @php
                    $medals = ['🥇', '🥈', '🥉', '🏆'];
                    $medal = $medals[array_rand($medals)];
                @endphp
                <div class="bg-gradient-to-r from-yellow-50 to-amber-50 dark:from-yellow-900/20 dark:to-amber-900/20 p-3 rounded-lg border border-yellow-200 dark:border-yellow-700">
                    <div class="flex items-center mb-2">
                        <span class="text-2xl mr-3">{{ $medal }}</span>
                        <div class="flex-1">
                            <h3 class="font-semibold text-gray-800 dark:text-white text-sm">{{ $achievement->title }}</h3>
                            <p class="text-xs text-gray-600 dark:text-gray-300">{{ $achievement->author ?? 'Tim Sekolah' }}</p>
                        </div>
                    </div>
                    <span class="inline-block px-2 py-1 text-xs bg-yellow-200 dark:bg-yellow-800 text-yellow-800 dark:text-yellow-200 rounded-full">{{ $achievement->category ?? 'Umum' }}</span>
                </div>
                @empty
                <div class="flex items-center justify-center p-8 text-gray-500 dark:text-gray-400 col-span-2">
                    <div class="text-center">
                        <i class="fas fa-trophy text-4xl mb-3 text-gray-300 dark:text-gray-600"></i>
                        <p class="font-medium">Belum ada prestasi</p>
                        <p class="text-sm">Tambahkan prestasi melalui <a href="{{ route('admin.dashboard-content.create') }}" class="text-yellow-600 hover:text-yellow-800">panel admin</a></p>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Right Column -->
    <div class="xl:col-span-1 space-y-5">
        <!-- Statistik Cepat -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700 p-4">
            <h2 class="text-base font-semibold text-gray-800 dark:text-white mb-3">Statistik Hari Ini</h2>
            <div class="space-y-2">
                <div class="flex items-center justify-between p-2 bg-green-50 dark:bg-green-900/20 rounded-lg">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center mr-3">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <span class="text-sm text-gray-700 dark:text-gray-300">Pendaftaran Baru</span>
                    </div>
                    <span class="font-bold text-green-600 dark:text-green-400">+{{ $stats['pendaftaran_baru_hari_ini'] }}</span>
                </div>
                <div class="flex items-center justify-between p-2 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center mr-3">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"></path>
                            </svg>
                        </div>
                        <span class="text-sm text-gray-700 dark:text-gray-300">Siswa Aktif</span>
                    </div>
                    <span class="font-bold text-blue-600 dark:text-blue-400">{{ $stats['total_siswa'] }}</span>
                </div>
                <div class="flex items-center justify-between p-2 bg-purple-50 dark:bg-purple-900/20 rounded-lg">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center mr-3">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2v1a2 2 0 002 2h8a2 2 0 002-2V3a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 3a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <span class="text-sm text-gray-700 dark:text-gray-300">Kegiatan Hari Ini</span>
                    </div>
                    <span class="font-bold text-purple-600 dark:text-purple-400">8</span>
                </div>
            </div>
        </div>

        <!-- Eskul Populer -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700 p-4">
            <h2 class="text-base font-semibold text-gray-800 dark:text-white mb-3">Eskul Terpopuler</h2>
            <div class="space-y-3">
                @foreach($stats['eskul_populer'] as $index => $eskul)
                <div class="flex items-center justify-between p-3 {{ $index === 0 ? 'bg-gradient-to-r from-gold-50 to-yellow-50 dark:from-yellow-900/30 dark:to-amber-900/30 border border-yellow-200 dark:border-yellow-700' : 'bg-gray-50 dark:bg-gray-700' }} rounded-lg">
                    <div class="flex items-center">
                        <span class="w-6 h-6 flex items-center justify-center text-sm font-bold {{ $index === 0 ? 'text-yellow-600 dark:text-yellow-400' : 'text-gray-500 dark:text-gray-400' }} mr-3">
                            {{ $index + 1 }}
                        </span>
                        <span class="font-medium text-gray-800 dark:text-white">{{ $eskul->nama_eskul }}</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-600 dark:text-gray-300">{{ $eskul->pendaftaran_eskul_count }} siswa</span>
                        @if($eskul->pendaftaran_eskul_count > 30)
                            <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        @elseif($eskul->pendaftaran_eskul_count < 20)
                            <svg class="w-4 h-4 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l4.293-4.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        @else
                            <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                            </svg>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Calendar Widget -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700 p-4">
            <h2 class="text-base font-semibold text-gray-800 dark:text-white mb-3">Jadwal Mendatang</h2>
            <div class="space-y-3">
                @php
                $upcomingEvents = collect([
                    ['title' => 'Latihan Futsal', 'date' => 'Hari ini', 'time' => '15:30', 'color' => 'green'],
                    ['title' => 'Workshop Robotika', 'date' => 'Besok', 'time' => '13:00', 'color' => 'blue'],
                    ['title' => 'Pentas Seni', 'date' => '20 Nov', 'time' => '09:00', 'color' => 'purple'],
                ]);
                @endphp
                
                @foreach($upcomingEvents as $event)
                <div class="flex items-center p-3 bg-{{ $event['color'] }}-50 dark:bg-{{ $event['color'] }}-900/20 rounded-lg border-l-4 border-{{ $event['color'] }}-500">
                    <div class="flex-1">
                        <h4 class="font-semibold text-gray-800 dark:text-white text-sm">{{ $event['title'] }}</h4>
                        <p class="text-xs text-gray-600 dark:text-gray-300">{{ $event['date'] }} • {{ $event['time'] }}</p>
                    </div>
                    <div class="w-2 h-2 bg-{{ $event['color'] }}-500 rounded-full"></div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700 p-4 transition-colors duration-200">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Aksi Cepat</h2>
        <div class="text-xs text-gray-500 dark:text-gray-400">Shortcut untuk tugas harian</div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3">
        <a href="{{ route('admin.siswa.create') }}" class="group flex items-center p-3 bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 rounded-lg hover:from-green-100 hover:to-emerald-100 dark:hover:from-green-900/30 dark:hover:to-emerald-900/30 transition-all duration-200 border border-green-200 dark:border-green-700 hover:shadow-md">
            <div class="bg-green-500 p-3 rounded-lg mr-4 group-hover:scale-110 transition-transform duration-300">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
            </div>
            <div>
                <span class="text-green-800 dark:text-green-300 font-semibold block">Tambah Siswa</span>
                <span class="text-green-600 dark:text-green-400 text-sm">Registrasi baru</span>
            </div>
        </a>
        
        <a href="{{ route('admin.eskul.create') }}" class="group flex items-center p-3 bg-gradient-to-r from-blue-50 to-cyan-50 dark:from-blue-900/20 dark:to-cyan-900/20 rounded-xl hover:from-blue-100 hover:to-cyan-100 dark:hover:from-blue-900/30 dark:hover:to-cyan-900/30 transition-all duration-300 border border-blue-200 dark:border-blue-700 hover:shadow-lg transform hover:-translate-y-1">
            <div class="bg-blue-500 p-3 rounded-lg mr-4 group-hover:scale-110 transition-transform duration-300">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
            </div>
            <div>
                <span class="text-blue-800 dark:text-blue-300 font-semibold block">Tambah Eskul</span>
                <span class="text-blue-600 dark:text-blue-400 text-sm">Kegiatan baru</span>
            </div>
        </a>
        
        <a href="{{ route('admin.prestasi.create') }}" class="group flex items-center p-3 bg-gradient-to-r from-yellow-50 to-amber-50 dark:from-yellow-900/20 dark:to-amber-900/20 rounded-xl hover:from-yellow-100 hover:to-amber-100 dark:hover:from-yellow-900/30 dark:hover:to-amber-900/30 transition-all duration-300 border border-yellow-200 dark:border-yellow-700 hover:shadow-lg transform hover:-translate-y-1">
            <div class="bg-yellow-500 p-3 rounded-lg mr-4 group-hover:scale-110 transition-transform duration-300">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                </svg>
            </div>
            <div>
                <span class="text-yellow-800 dark:text-yellow-300 font-semibold block">Tambah Prestasi</span>
                <span class="text-yellow-600 dark:text-yellow-400 text-sm">Pencapaian baru</span>
            </div>
        </a>
        
        <a href="{{ route('admin.dashboard-content.index') }}" class="group flex items-center p-3 bg-gradient-to-r from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 rounded-xl hover:from-purple-100 hover:to-pink-100 dark:hover:from-purple-900/30 dark:hover:to-pink-900/30 transition-all duration-300 border border-purple-200 dark:border-purple-700 hover:shadow-lg transform hover:-translate-y-1">
            <div class="bg-purple-500 p-3 rounded-lg mr-4 group-hover:scale-110 transition-transform duration-300">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 7.172V5L8 4z"></path>
                </svg>
            </div>
            <div>
                <span class="text-purple-800 dark:text-purple-300 font-semibold block">Kelola Dashboard</span>
                <span class="text-purple-600 dark:text-purple-400 text-sm">Konten siswa</span>
            </div>
        </a>
    </div>
</div>

<!-- Recent Activity -->
<div class="mt-5 bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700 p-4 transition-colors duration-200">
    <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-3">Pendaftaran Terbaru</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full">
            <thead class="bg-gray-50 dark:bg-gray-700">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Siswa</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Ekstrakurikuler</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Tanggal</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                @forelse($recentRegistrations as $pendaftaran)
                <tr>
                    <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-200">{{ $pendaftaran->siswa->nama_siswa ?? '-' }}</td>
                    <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-200">{{ $pendaftaran->eskul->nama_eskul ?? '-' }}</td>
                    <td class="px-4 py-3 text-sm text-gray-500 dark:text-gray-400">{{ $pendaftaran->tanggal_daftar }}</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 text-xs rounded-full 
                            {{ $pendaftaran->status === 'diterima' ? 'bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200' : '' }}
                            {{ $pendaftaran->status === 'pending' ? 'bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200' : '' }}
                            {{ $pendaftaran->status === 'ditolak' ? 'bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200' : '' }}">
                            {{ ucfirst($pendaftaran->status) }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-4 py-8 text-center text-gray-500 dark:text-gray-400">
                        <div class="flex flex-col items-center">
                            <i class="fas fa-inbox text-3xl mb-2 text-gray-300 dark:text-gray-600"></i>
                            <span>Belum ada pendaftaran</span>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
