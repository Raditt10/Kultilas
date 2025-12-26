<!DOCTYPE html>
<html lang="id" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))" :class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
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
        body {
            background: transparent;
        }
    </style>
</head>
<body class="bg-gray-100 dark:bg-gray-900 transition-colors duration-200">
    <!-- Sidebar -->
    <div id="sidebar" class="fixed inset-y-0 left-0 w-64 bg-gradient-to-b from-green-700 to-green-900 dark:from-gray-800 dark:to-gray-950 shadow-2xl transform -translate-x-full transition-all duration-300 ease-in-out z-50">
        <div class="flex items-center justify-between p-6 border-b border-green-600">
            <h2 class="text-white text-lg font-bold">Dashboard</h2>
            <button onclick="toggleSidebar()" class="text-white hover:text-green-200 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        
        @if(session('siswa_id'))
        <div class="px-6 py-4 border-b border-green-600">
            <p class="text-green-200 text-sm">Halo,</p>
            <p class="text-white font-semibold">{{ session('siswa_name') }}</p>
        </div>
        
        <nav class="mt-4">
            <a href="{{ route('siswa.dashboard') }}" class="flex items-center px-6 py-3 text-white hover:bg-green-600 transition-colors duration-200 {{ request()->routeIs('siswa.dashboard') ? 'bg-green-600' : '' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                Dashboard
            </a>
            <a href="{{ route('siswa.eskul') }}" class="flex items-center px-6 py-3 text-white hover:bg-green-600 transition-colors duration-200 {{ request()->routeIs('siswa.eskul') ? 'bg-green-600' : '' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
                Daftar Eskul
            </a>
            <a href="{{ route('siswa.presensi') }}" class="flex items-center px-6 py-3 text-white hover:bg-green-600 transition-colors duration-200 {{ request()->routeIs('siswa.presensi') ? 'bg-green-600' : '' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                </svg>
                Presensi
            </a>
            <a href="{{ route('siswa.prestasi') }}" class="flex items-center px-6 py-3 text-white hover:bg-green-600 transition-colors duration-200 {{ request()->routeIs('siswa.prestasi') ? 'bg-green-600' : '' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                </svg>
                Prestasi
            </a>
            <a href="{{ route('siswa.profile') }}" class="flex items-center px-6 py-3 text-white hover:bg-green-600 transition-colors duration-200 {{ request()->routeIs('siswa.profile') ? 'bg-green-600' : '' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                Profil
            </a>
            
            <div class="mt-6 border-t border-green-600 pt-4">
                <form action="{{ route('siswa.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center w-full px-6 py-3 text-white hover:bg-red-600 transition-colors duration-200">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </nav>
        @endif
    </div>

    <!-- Overlay -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden" onclick="toggleSidebar()"></div>

    <!-- Top Bar (Admin-like) -->
    <div class="bg-gradient-to-r from-green-700 to-green-900 dark:from-gray-800 dark:to-gray-900 shadow-xl ring-1 ring-white/10 relative overflow-visible sticky top-0 z-30 transition-colors duration-200">
        <!-- Decorative overlay -->
        <div class="absolute inset-0 opacity-[0.06] bg-[radial-gradient(ellipse_at_top_left,_var(--tw-gradient-stops))] from-white via-transparent to-transparent pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 right-0 h-0.5 bg-gradient-to-r from-emerald-400/60 via-green-500/60 to-teal-400/60"></div>
        <div class="flex items-center justify-between px-6 py-4">
            <div class="flex items-center">
                @if(session('siswa_id'))
                <button onclick="toggleSidebar()" class="text-white hover:text-green-200 dark:hover:text-gray-300 focus:outline-none mr-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                @endif

                <img src="{{ asset('images/logo13.png') }}" alt="Kultilas Logo" class="w-8 h-8 mr-3 p-1 bg-white/10 rounded-lg ring-1 ring-white/20" />

                @if(!request()->routeIs('siswa.login') && !request()->routeIs('siswa.register'))
                <div>
                    <h1 class="text-2xl md:text-3xl font-extrabold tracking-tight text-white">
                        @if(request()->routeIs('siswa.dashboard'))
                            Dashboard Siswa
                        @elseif(request()->routeIs('siswa.eskul'))
                            Daftar Eskul
                        @elseif(request()->routeIs('siswa.presensi'))
                            Presensi
                        @elseif(request()->routeIs('siswa.prestasi'))
                            Prestasi
                        @elseif(request()->routeIs('siswa.profile'))
                            Profil Saya
                        @else
                            Dashboard
                        @endif
                    </h1>
                    <p class="text-green-100 dark:text-gray-300 text-xs font-medium">SMKN 13 Bandung - Sistem Ekstrakurikuler</p>
                </div>
                @endif
            </div>

            <div class="profile-menu hidden md:flex items-center space-x-4">
                <!-- Dark Mode Toggle -->
                <button @click="darkMode = !darkMode" class="text-white hover:text-green-200 dark:hover:text-gray-300 focus:outline-none transition-colors" data-no-animation>
                    <svg x-show="!darkMode" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                    </svg>
                    <svg x-show="darkMode" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </button>

                <!-- Profile Dropdown -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center space-x-3 focus:outline-none" data-no-animation>
                        <div class="text-right">
                            <p class="text-white font-semibold text-sm">{{ session('siswa_name') ?? 'Siswa' }}</p>
                            <p class="text-green-200 dark:text-gray-300 text-xs">Siswa</p>
                        </div>
                        <div class="profile-icon w-10 h-10 rounded-full bg-white dark:bg-gray-700 flex items-center justify-center hover:bg-green-50 dark:hover:bg-gray-600 transition-colors overflow-hidden">
                            @if(session('siswa_foto'))
                                <img src="{{ asset('images/profile/' . session('siswa_foto')) }}" alt="Profile" class="w-full h-full object-cover">
                            @else
                                <span class="text-green-700 dark:text-green-400 font-semibold">{{ strtoupper(substr(session('siswa_name') ?? 'S', 0, 1)) }}</span>
                            @endif
                        </div>
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="open"
                         @click.away="open = false"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95"
                         class="absolute right-0 mt-2 w-64 bg-white dark:bg-gray-800 rounded-xl shadow-2xl border border-gray-200 dark:border-gray-700 py-2 z-50"
                         style="display: none;">

                        <!-- User Info -->
                        <div class="px-4 py-3 border-b border-gray-200 dark:border-gray-700 flex items-center space-x-3">
                            <div class="w-10 h-10 rounded-full bg-green-100 dark:bg-green-900 flex items-center justify-center text-green-700 dark:text-green-300 font-semibold overflow-hidden">
                                @if(session('siswa_foto'))
                                    <img src="{{ asset('images/profile/' . session('siswa_foto')) }}" alt="Profile" class="w-full h-full object-cover">
                                @else
                                    {{ strtoupper(substr(session('siswa_name') ?? 'S', 0, 1)) }}
                                @endif
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ session('siswa_name') ?? 'Siswa' }}</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">{{ session('siswa_email') ?? 'siswa@kultilas.com' }}</p>
                                <span class="inline-block mt-2 px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">Siswa</span>
                            </div>
                        </div>

                        <!-- Menu Items -->
                        <div class="py-2">
                            <a href="{{ route('siswa.dashboard') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors" data-no-animation>
                                <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                </svg>
                                Dashboard
                            </a>
                            <a href="{{ route('siswa.profile') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors" data-no-animation>
                                <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Profil Saya
                            </a>
                        </div>

                        <!-- Logout -->
                        <div class="border-t border-gray-200 dark:border-gray-700 pt-2">
                            <form method="POST" action="{{ route('siswa.logout') }}">
                                @csrf
                                <button type="submit" class="flex items-center w-full px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors" data-no-animation>
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                    Keluar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <main class="container mx-auto px-4 py-8">
        @if(session('success'))
            <div class="bg-green-100 dark:bg-green-900 border border-green-400 dark:border-green-700 text-green-700 dark:text-green-200 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 dark:bg-red-900 border border-red-400 dark:border-red-700 text-red-700 dark:text-red-200 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="relative mt-16 overflow-hidden">
        <!-- Animated Background -->
        <div class="absolute inset-0 bg-gradient-to-br from-gray-900 via-emerald-900 to-teal-900 dark:from-gray-950 dark:via-emerald-950 dark:to-teal-950"></div>
        
        <!-- Decorative Elements -->
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-0 left-1/4 w-64 h-64 bg-green-400 rounded-full mix-blend-multiply filter blur-3xl animate-pulse"></div>
            <div class="absolute bottom-0 right-1/4 w-64 h-64 bg-emerald-400 rounded-full mix-blend-multiply filter blur-3xl animate-pulse animation-delay-1000"></div>
        </div>
        
        <!-- Pattern Overlay -->
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 2px 2px, rgba(255,255,255,0.15) 1px, transparent 0); background-size: 32px 32px;"></div>
        
        <!-- Footer Content -->
        <div class="relative">
            <!-- Wave Divider -->
            <div class="absolute top-0 left-0 w-full overflow-hidden leading-none">
                <svg class="relative block w-full h-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="fill-gray-50 dark:fill-gray-900"></path>
                </svg>
            </div>
            
            <div class="pt-16 pb-8 px-4">
                <div class="max-w-7xl mx-auto">
                    <!-- Main Footer Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                        <!-- Brand Section -->
                        <div class="md:col-span-2">
                            <div class="flex items-center space-x-3 mb-4">
                                <div class="h-12 w-12 flex items-center justify-center">
                                    <img src="{{ asset('images/logo13.png') }}" alt="Kultilas Logo" class="h-full w-full object-contain">
                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white">Kultilas</h3>
                                    <p class="text-emerald-600 dark:text-emerald-300 text-sm">Sistem Manajemen Ekstrakurikuler</p>
                                </div>
                            </div>
                            <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed mb-4">
                                Platform terpadu untuk mengelola kegiatan ekstrakurikuler sekolah dengan sistem yang modern, efisien, dan mudah digunakan.
                            </p>
                            <!-- Social Links -->
                            <div class="flex space-x-3">
                                <a href="#" class="h-10 w-10 bg-white/10 hover:bg-white/20 rounded-lg flex items-center justify-center transition backdrop-blur-sm">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                </a>
                                <a href="#" class="h-10 w-10 bg-white/10 hover:bg-white/20 rounded-lg flex items-center justify-center transition backdrop-blur-sm">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                                </a>
                                <a href="#" class="h-10 w-10 bg-white/10 hover:bg-white/20 rounded-lg flex items-center justify-center transition backdrop-blur-sm">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.894 8.221l-1.97 9.28c-.145.658-.537.818-1.084.508l-3-2.21-1.446 1.394c-.14.18-.357.295-.6.295-.002 0-.003 0-.005 0l.213-3.054 5.56-5.022c.24-.213-.054-.334-.373-.121l-6.869 4.326-2.96-.924c-.64-.203-.658-.64.135-.954l11.566-4.458c.538-.196 1.006.128.832.941z"/></svg>
                                </a>
                                <a href="#" class="h-10 w-10 bg-white/10 hover:bg-white/20 rounded-lg flex items-center justify-center transition backdrop-blur-sm">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                </a>
                            </div>
                        </div>
                        
                        <!-- Contact Info -->
                        <div>
                            <h4 class="text-gray-800 dark:text-white font-semibold mb-4 text-lg">Kontak</h4>
                            <ul class="space-y-3">
                                <li class="flex items-start text-gray-600 dark:text-gray-300 text-sm">
                                    <svg class="w-5 h-5 mr-2 text-emerald-500 dark:text-emerald-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    Jl. Pendidikan No. 123, Kota
                                </li>
                                <li class="flex items-center text-gray-600 dark:text-gray-300 text-sm">
                                    <svg class="w-5 h-5 mr-2 text-emerald-500 dark:text-emerald-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                    info@kultilas.sch.id
                                </li>
                                <li class="flex items-center text-gray-600 dark:text-gray-300 text-sm">
                                    <svg class="w-5 h-5 mr-2 text-emerald-500 dark:text-emerald-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                    (021) 1234-5678
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- Bottom Bar -->
                    <div class="border-t border-white/10 pt-6">
                        <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                            <p class="text-gray-400 text-sm">
                                &copy; 2025 <span class="text-emerald-400 font-semibold">Kultilas</span>. All rights reserved.
                            </p>
                            <div class="flex items-center space-x-6">
                                <a href="#" class="text-gray-400 hover:text-emerald-400 text-sm transition">Privacy Policy</a>
                                <span class="text-gray-600">•</span>
                                <a href="#" class="text-gray-400 hover:text-emerald-400 text-sm transition">Terms of Service</a>
                                <span class="text-gray-600">•</span>
                                <a href="#" class="text-gray-400 hover:text-emerald-400 text-sm transition">Help Center</a>
                            </div>
                        </div>
                        
                        <!-- Made with Love -->
                        <div class="mt-4 text-center">
                            <p class="text-gray-500 text-xs flex items-center justify-center">
                                Made with 
                                <svg class="w-4 h-4 mx-1 text-red-500 animate-pulse" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/></svg>
                                by Tim Developer
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    <style>
        .animation-delay-1000 {
            animation-delay: 1s;
        }
    </style>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        // Close sidebar when pressing Escape
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('overlay');
                if (!sidebar.classList.contains('-translate-x-full')) {
                    toggleSidebar();
                }
            }
        });
    </script>
</body>
</html>