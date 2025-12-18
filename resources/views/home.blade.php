<!DOCTYPE html>
<html lang="id" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))" :class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/images/logo13.png">
    <title>Kultilas - Ekstakurikuler SMKN 13 Bandung</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class'
        }
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        .hero-bg {
            background-image: linear-gradient(rgba(21, 128, 61, 0.85), rgba(22, 101, 52, 0.85)), url('/images/smkn13.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        .dark .hero-bg {
            background-image: linear-gradient(rgba(17, 24, 39, 0.9), rgba(31, 41, 55, 0.9)), url('/images/smkn13.jpg');
        }
        .card-hover:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }

        /* Flip Card Styles */
        .flip-card {
            perspective: 1000px;
        }
        .flip-card-inner {
            position: relative;
            width: 100%;
            transition: transform 0.6s;
            transform-style: preserve-3d;
        }
        .flip-card-inner.flipped {
            transform: rotateY(180deg);
        }
        .flip-card-front, .flip-card-back {
            backface-visibility: hidden;
        }
        .flip-card-back {
            transform: rotateY(180deg);
        }

        /* Typing Animation */
        .typing-cursor {
            animation: blink 0.7s infinite;
        }
        @keyframes blink {
            0%, 50% { opacity: 1; }
            51%, 100% { opacity: 0; }
        }
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900 transition-colors duration-200">
    <!-- Navbar -->
    <nav class="bg-white/95 dark:bg-gray-900/95 backdrop-blur-md shadow-md fixed w-full top-0 z-50 border-b border-gray-200 dark:border-gray-800 transition-colors duration-200">
        <div class="container mx-auto px-6 py-3">
            <div class="flex justify-between items-center">
               <!-- Logo & Brand -->
                <div class="flex items-center gap-3">
                    <div class="h-14 w-14 rounded-xl flex items-center justify-center p-2 bg-white/10 dark:bg-gray-800/20 backdrop-blur-sm">
                        <img src="{{ asset('images/logo13.png') }}" alt="Logo Kultilas" class="h-full w-full object-contain">
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold bg-gradient-to-r from-green-700 to-green-600 dark:from-green-400 dark:to-green-300 bg-clip-text text-transparent">Kultilas</h1>
                        <span class="text-xs text-gray-600 dark:text-gray-400 font-medium">SMKN 13 Bandung</span>
                    </div>
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:flex gap-2 items-center bg-gray-100/80 dark:bg-gray-800/80 backdrop-blur-sm px-3 py-2 rounded-full shadow-inner">
                    <a href="#login" class="px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gradient-to-r hover:from-green-500 hover:to-green-600 hover:text-white font-medium rounded-full transition-all duration-300 hover:shadow-md hover:scale-105 transform">
                        Portal
                    </a>
                    <a href="#tentang" class="px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gradient-to-r hover:from-green-500 hover:to-green-600 hover:text-white font-medium rounded-full transition-all duration-300 hover:shadow-md hover:scale-105 transform">
                        Ekstrakurikuler
                    </a>
                    <a href="#fitur" class="px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gradient-to-r hover:from-green-500 hover:to-green-600 hover:text-white font-medium rounded-full transition-all duration-300 hover:shadow-md hover:scale-105 transform">
                        Fitur
                    </a>
                    <a href="#kontak" class="px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gradient-to-r hover:from-green-500 hover:to-green-600 hover:text-white font-medium rounded-full transition-all duration-300 hover:shadow-md hover:scale-105 transform">
                        Kontak
                    </a>
                </div>

                <!-- Right Section -->
                <div class="hidden md:flex gap-3 items-center">
                    <!-- Dark Mode Toggle -->
                    <button @click="darkMode = !darkMode" class="p-2.5 rounded-full bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none transition-all duration-200 shadow-sm">
                        <svg x-show="!darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                        </svg>
                        <svg x-show="darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </button>

                    <!-- CTA Button -->
                    <a href="#login" class="px-6 py-2.5 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-semibold rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                        Masuk
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button class="md:hidden p-2 rounded-lg bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Spacer for fixed navbar -->
    <div class="h-20"></div>

    <!-- Hero Section -->
    <section class="hero-bg text-white py-20">
        <div class="container mx-auto px-6 text-center">
            <div class="bg-black bg-opacity-30 backdrop-blur-sm rounded-2xl p-12 max-w-4xl mx-auto">
                <h2 class="text-5xl font-bold mb-4 text-green-300">
                    <span id="typing-text"></span>
                    <span class="typing-cursor">|</span>
                </h2>
                <p class="text-2xl mb-2 font-semibold">SMKN 13 Bandung</p>
                <p class="text-xl mb-8">Platform Manajemen Ekstrakurikuler yang Modern dan Efisien</p>
                <div class="flex justify-center gap-4">
                    <a href="#login" class="bg-white text-green-800 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition shadow-lg">
                        Mulai Sekarang
                    </a>
                    <a href="#tentang" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-green-800 transition">
                        Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Login Section -->
    <section id="login" class="py-16 bg-gray-50 dark:bg-gray-800 transition-colors duration-200">
        <div class="container mx-auto px-6">
            <h3 class="text-3xl font-bold text-center text-green-800 dark:text-green-400 mb-4">Portal Login</h3>
            <p class="text-center text-gray-600 dark:text-gray-400 mb-12">Pilih portal sesuai dengan peran Anda</p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">
                <!-- Admin Card -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8 text-center card-hover transition-colors duration-200">
                    <div class="w-20 h-20 mx-auto mb-4 overflow-hidden rounded-full ring-4 ring-red-100 dark:ring-red-900">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=200&h=200&fit=crop&crop=faces" 
                             alt="Administrator" 
                             class="w-full h-full object-cover"
                             onerror="this.src='https://ui-avatars.com/api/?name=Admin&size=200&background=DC2626&color=fff&bold=true'">
                    </div>
                    <h4 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Administrator</h4>
                    <p class="text-gray-600 dark:text-gray-400 mb-6 text-sm">Kelola seluruh sistem ekstrakurikuler</p>
                    <a href="{{ route('login') }}" class="block w-full bg-red-600 text-white py-2 rounded-lg font-semibold hover:bg-red-700 transition">
                        Login Admin
                    </a>
                </div>

                <!-- Pembina Card -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8 text-center card-hover transition-colors duration-200">
                    <div class="w-20 h-20 mx-auto mb-4 overflow-hidden rounded-full ring-4 ring-blue-100 dark:ring-blue-900">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=200&h=200&fit=crop&crop=faces" 
                             alt="Pembina" 
                             class="w-full h-full object-cover"
                             onerror="this.src='https://ui-avatars.com/api/?name=Pembina&size=200&background=2563EB&color=fff&bold=true'">
                    </div>
                    <h4 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Pembina</h4>
                    <p class="text-gray-600 dark:text-gray-400 mb-6 text-sm">Kelola eskul yang Anda bina</p>
                    <a href="{{ route('login') }}" class="block w-full bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition">
                        Login Pembina
                    </a>
                </div>

                <!-- Pelatih Card -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8 text-center card-hover transition-colors duration-200">
                    <div class="w-20 h-20 mx-auto mb-4 overflow-hidden rounded-full ring-4 ring-green-100 dark:ring-green-900">
                        <img src="https://images.unsplash.com/photo-1566492031773-4f4e44671857?w=200&h=200&fit=crop&crop=faces" 
                             alt="Pelatih" 
                             class="w-full h-full object-cover"
                             onerror="this.src='https://ui-avatars.com/api/?name=Pelatih&size=200&background=16A34A&color=fff&bold=true'">
                    </div>
                    <h4 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Pelatih</h4>
                    <p class="text-gray-600 dark:text-gray-400 mb-6 text-sm">Kelola eskul yang Anda latih</p>
                    <a href="{{ route('login') }}" class="block w-full bg-green-600 text-white py-2 rounded-lg font-semibold hover:bg-green-700 transition">
                        Login Pelatih
                    </a>
                </div>

                <!-- Siswa Card -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8 text-center card-hover transition-colors duration-200">
                    <div class="w-20 h-20 mx-auto mb-4 overflow-hidden rounded-full ring-4 ring-purple-100 dark:ring-purple-900">
                        <img src="https://images.unsplash.com/photo-1522529599102-193c0d76b5b6?w=200&h=200&fit=crop&crop=faces" 
                             alt="Siswa" 
                             class="w-full h-full object-cover"
                             onerror="this.src='https://ui-avatars.com/api/?name=Siswa&size=200&background=9333EA&color=fff&bold=true'">
                    </div>
                    <h4 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Siswa</h4>
                    <p class="text-gray-600 dark:text-gray-400 mb-6 text-sm">Daftar dan kelola eskul Anda</p>
                    <a href="{{ route('siswa.login') }}" class="block w-full bg-purple-600 text-white py-2 rounded-lg font-semibold hover:bg-purple-700 transition">
                        Login Siswa
                    </a>
                    <a href="{{ route('siswa.register') }}" class="block w-full mt-2 border-2 border-purple-600 text-purple-600 dark:text-purple-400 dark:border-purple-400 py-2 rounded-lg font-semibold hover:bg-purple-50 dark:hover:bg-purple-900/20 transition">
                        Daftar
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="fitur" class="py-16 bg-white dark:bg-gray-900 transition-colors duration-200">
        <div class="container mx-auto px-6">
            <h3 class="text-3xl font-bold text-center text-green-800 dark:text-green-400 mb-4">Fitur Unggulan</h3>
            <p class="text-center text-gray-600 dark:text-gray-400 mb-12">Sistem yang lengkap untuk manajemen ekstrakurikuler</p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                <div class="text-center p-6 rounded-xl bg-white dark:bg-gray-800 shadow-lg hover:shadow-2xl hover:scale-105 hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                    <div class="w-16 h-16 bg-purple-100 dark:bg-purple-900 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold mb-2 text-gray-800 dark:text-white">Pendaftaran Online</h4>
                    <p class="text-gray-600 dark:text-gray-400">Siswa dapat mendaftar ekstrakurikuler secara online dengan mudah</p>
                </div>

                <div class="text-center p-6 rounded-xl bg-white dark:bg-gray-800 shadow-lg hover:shadow-2xl hover:scale-105 hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                    <div class="w-16 h-16 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold mb-2 text-gray-800 dark:text-white">Presensi Digital</h4>
                    <p class="text-gray-600 dark:text-gray-400">Pencatatan kehadiran siswa secara digital dan real-time</p>
                </div>

                <div class="text-center p-6 rounded-xl bg-white dark:bg-gray-800 shadow-lg hover:shadow-2xl hover:scale-105 hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                    <div class="w-16 h-16 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold mb-2 text-gray-800 dark:text-white">Pencatatan Prestasi</h4>
                    <p class="text-gray-600 dark:text-gray-400">Dokumentasi prestasi siswa dalam setiap ekstrakurikuler</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <!-- Tentang Section with Eskul Gallery -->
    <section id="tentang" class="py-20 bg-gradient-to-br from-gray-50 via-green-50 to-gray-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 transition-colors duration-200">
        <div class="container mx-auto px-6">
            <!-- Header -->
            <div class="text-center mb-16">
                <h3 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">Ekstrakurikuler Kami</h3>
                <p class="text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                    Berbagai pilihan ekstrakurikuler yang dapat mengembangkan minat dan bakat siswa
                </p>
                <div class="w-24 h-1 bg-gradient-to-r from-green-600 to-green-400 mx-auto rounded-full mt-4"></div>
            </div>

            <!-- Eskul Gallery Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 max-w-7xl mx-auto">
                @forelse($eskuls as $eskul)
                    <div class="flip-card h-[500px]" x-data="{ flipped: false }">
                        <div class="flip-card-inner h-full" :class="{ 'flipped': flipped }">
                            <!-- Front Side -->
                            <div class="flip-card-front absolute w-full h-full bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-lg" @click="flipped = !flipped">
                                <!-- Image Container -->
                                <div class="relative h-56 overflow-hidden bg-gradient-to-br from-green-400 to-green-600 cursor-pointer">
                                    @if($eskul->foto_eskul)
                                        <img src="{{ asset('images/eskul/' . $eskul->foto_eskul) }}" 
                                             alt="{{ $eskul->nama_eskul }}"
                                             class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center">
                                            <svg class="w-20 h-20 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                            </svg>
                                        </div>
                                    @endif
                                    
                                    <!-- Category Badge -->
                                    <div class="absolute top-3 right-3">
                                        <span class="px-3 py-1 bg-white/90 dark:bg-gray-900/90 backdrop-blur-sm rounded-full text-xs font-semibold text-green-600 dark:text-green-400">
                                            {{ ucfirst($eskul->kategori) }}
                                        </span>
                                    </div>

                                    <!-- Click Indicator -->
                                    <div class="absolute bottom-3 right-3">
                                        <div class="bg-green-600 text-white px-3 py-1 rounded-full text-xs font-semibold flex items-center gap-1 animate-pulse">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            Klik
                                        </div>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="p-5">
                                    <!-- Eskul Name -->
                                    <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-2">
                                        {{ $eskul->nama_eskul }}
                                    </h4>

                                    <!-- Description -->
                                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-4 line-clamp-2">
                                        {{ $eskul->deskripsi ?? 'Bergabunglah dengan ' . $eskul->nama_eskul . ' untuk mengembangkan kemampuan dan kreativitas Anda.' }}
                                    </p>

                                    <!-- Info Grid -->
                                    <div class="grid grid-cols-2 gap-3 mb-4">
                                        <!-- Jadwal -->
                                        <div class="flex items-center text-xs text-gray-500 dark:text-gray-400">
                                            <svg class="w-4 h-4 mr-1.5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            <span>{{ $eskul->jadwal }}</span>
                                        </div>

                                        <!-- Waktu -->
                                        <div class="flex items-center text-xs text-gray-500 dark:text-gray-400">
                                            <svg class="w-4 h-4 mr-1.5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span>{{ $eskul->jam_mulai }}</span>
                                        </div>
                                    </div>

                                    <!-- Footer -->
                                    <div class="flex items-center justify-between pt-3 border-t border-gray-100 dark:border-gray-700">
                                        <!-- Pembina -->
                                        <div class="flex items-center text-xs text-gray-500 dark:text-gray-400">
                                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                            <span class="truncate">{{ $eskul->pembina->nama_lengkap ?? 'TBA' }}</span>
                                        </div>

                                        <!-- Kuota Badge -->
                                        <div class="flex items-center gap-1">
                                            <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                            </svg>
                                            <span class="text-xs font-semibold text-orange-600 dark:text-orange-400">{{ $eskul->kuota }} siswa</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Back Side -->
                            <div class="flip-card-back absolute w-full h-full bg-gradient-to-br from-green-600 to-green-700 dark:from-green-700 dark:to-green-800 rounded-2xl overflow-hidden shadow-lg p-6" @click="flipped = !flipped">
                                <div class="h-full flex flex-col text-white cursor-pointer">
                                    <!-- Header -->
                                    <div class="mb-4 pb-4 border-b border-white/30">
                                        <h3 class="text-xl font-bold mb-1">{{ $eskul->nama_eskul }}</h3>
                                        <p class="text-green-100 text-xs">Detail Informasi</p>
                                    </div>

                                    <!-- Detail Info -->
                                    <div class="flex-1 space-y-4 overflow-y-auto">
                                        <!-- Deskripsi -->
                                        <div>
                                            <div class="flex items-center mb-2">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                </svg>
                                                <span class="font-semibold text-sm">Deskripsi</span>
                                            </div>
                                            <p class="text-sm text-green-50 leading-relaxed">{{ $eskul->deskripsi ?? 'Tidak ada deskripsi tersedia.' }}</p>
                                        </div>

                                        <!-- Jadwal & Waktu -->
                                        <div class="grid grid-cols-2 gap-3">
                                            <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                                <div class="flex items-center mb-1">
                                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                    </svg>
                                                    <span class="text-xs font-semibold">Jadwal</span>
                                                </div>
                                                <p class="text-sm">{{ $eskul->jadwal }}</p>
                                            </div>
                                            <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                                <div class="flex items-center mb-1">
                                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    <span class="text-xs font-semibold">Waktu</span>
                                                </div>
                                                <p class="text-sm">{{ $eskul->jam_mulai }} - {{ $eskul->jam_selesai }}</p>
                                            </div>
                                        </div>

                                        <!-- Pembina & Tempat -->
                                        <div>
                                            <div class="flex items-center mb-2">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                                </svg>
                                                <span class="font-semibold text-sm">Pembina</span>
                                            </div>
                                            <p class="text-sm text-green-50">{{ $eskul->pembina->nama_lengkap ?? 'Belum ditentukan' }}</p>
                                        </div>

                                        <div>
                                            <div class="flex items-center mb-2">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                                <span class="font-semibold text-sm">Tempat</span>
                                            </div>
                                            <p class="text-sm text-green-50">{{ $eskul->tempat }}</p>
                                        </div>

                                        <!-- Kuota & Kategori -->
                                        <div class="grid grid-cols-2 gap-3">
                                            <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                                <div class="flex items-center mb-1">
                                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                                    </svg>
                                                    <span class="text-xs font-semibold">Kuota</span>
                                                </div>
                                                <p class="text-lg font-bold">{{ $eskul->kuota }} siswa</p>
                                            </div>
                                            <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                                <div class="flex items-center mb-1">
                                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                                    </svg>
                                                    <span class="text-xs font-semibold">Kategori</span>
                                                </div>
                                                <p class="text-sm">{{ ucfirst($eskul->kategori) }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Footer -->
                                    <div class="mt-4 pt-4 border-t border-white/30">
                                        <div class="flex items-center justify-center text-sm">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"></path>
                                            </svg>
                                            Klik untuk kembali
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                        </svg>
                        <p class="text-gray-500 dark:text-gray-400">Belum ada ekstrakurikuler tersedia</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Fitur Section -->
        </div>
    </section>

    <!-- Footer -->
    <footer id="kontak" class="bg-gray-800 dark:bg-gray-950 text-white py-8 transition-colors duration-200">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h4 class="text-xl font-bold mb-4">Kultilas</h4>
                    <p class="text-gray-400 dark:text-gray-500">Sistem Informasi Ekstrakurikuler yang Modern dan Efisien</p>
                </div>
                <div>
                    <h4 class="text-xl font-bold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#login" class="text-gray-400 dark:text-gray-500 hover:text-white">Portal Login</a></li>
                        <li><a href="#fitur" class="text-gray-400 dark:text-gray-500 hover:text-white">Fitur</a></li>
                        <li><a href="#tentang" class="text-gray-400 dark:text-gray-500 hover:text-white">Tentang</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-xl font-bold mb-4">Kontak</h4>
                    <ul class="space-y-2 text-gray-400 dark:text-gray-500">
                        <li>Email: info@kultilas.sch.id</li>
                        <li>Telp: (021) 1234-5678</li>
                        <li>Alamat: Jl. Pendidikan No. 123</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 dark:border-gray-800 mt-8 pt-8 text-center text-gray-400 dark:text-gray-500">
                <p>&copy; 2025 Kultilas. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Typing Animation with Loop and Delete Effect
        const text = "Selamat Datang di Kultilas";
        const typingText = document.getElementById('typing-text');
        let index = 0;
        let isDeleting = false;

        function typeWriter() {
            if (!isDeleting && index < text.length) {
                // Typing forward
                typingText.textContent += text.charAt(index);
                index++;
                setTimeout(typeWriter, 100); // Speed of typing (100ms per character)
            } else if (!isDeleting && index === text.length) {
                // Finished typing, wait then start deleting
                setTimeout(() => {
                    isDeleting = true;
                    typeWriter();
                }, 2000); // Wait 2 seconds before deleting
            } else if (isDeleting && index > 0) {
                // Deleting backward
                typingText.textContent = text.substring(0, index - 1);
                index--;
                setTimeout(typeWriter, 50); // Speed of deleting (50ms per character - faster)
            } else if (isDeleting && index === 0) {
                // Finished deleting, start typing again
                isDeleting = false;
                setTimeout(typeWriter, 500); // Wait 500ms before retyping
            }
        }

        // Start typing animation when page loads
        window.addEventListener('load', () => {
            setTimeout(typeWriter, 500); // Delay before typing starts
        });
    </script>
</body>
</html>
