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
    <div class="bg-gradient-to-r from-green-700 to-green-900 dark:from-gray-800 dark:to-gray-900 shadow-lg sticky top-0 z-30 transition-colors duration-200">
        <div class="flex items-center justify-between px-6 py-4">
            @if(session('siswa_id'))
            <button onclick="toggleSidebar()" class="text-white hover:text-green-200 dark:hover:text-gray-300 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            @else
            <div></div>
            @endif

            @if(!request()->routeIs('siswa.login') && !request()->routeIs('siswa.register'))
            <div class="flex items-center">
                <img src="{{ asset('images/logo13.png') }}" alt="Kultilas Logo" class="w-8 h-8 mr-3" />
                <div>
                    <h1 class="text-xl font-bold text-white">
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
                    <p class="text-green-200 dark:text-gray-300 text-xs">SMKN 13 Bandung - Sistem Ekstrakurikuler</p>
                </div>
            </div>
            @endif

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
                            <svg class="w-6 h-6 text-green-700 dark:text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
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
                        <div class="px-4 py-3 border-b border-gray-200 dark:border-gray-700">
                            <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ session('siswa_name') ?? 'Siswa' }}</p>
                            <span class="inline-block mt-2 px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                Dashboard
                            </span>
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

    <footer class="bg-gray-800 text-white text-center py-4 mt-8">
        <p>&copy; 2025 Kultilas. All rights reserved.</p>
    </footer>

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