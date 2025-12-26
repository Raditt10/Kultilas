<!DOCTYPE html>
<html lang="id" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))" :class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - Kultilas')</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        /* Page Transition Animations */
        .page-transition {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .page-transition.page-loaded {
            opacity: 1;
            transform: translateY(0);
        }



        /* Smooth link transitions */
        .smooth-link {
            position: relative;
            transition: all 0.3s ease;
        }

        .smooth-link:hover {
            transform: translateX(2px);
        }

        /* Disable smooth effects for profile menu */
        .profile-menu .smooth-link,
        .profile-menu .smooth-link:hover {
            transform: none;
        }

        /* Sidebar text transition */
        .sidebar-text {
            transition: opacity 0.2s ease-in-out;
            white-space: nowrap;
            overflow: hidden;
        }

        /* Sidebar width transition */
        #sidebar {
            transition: width 0.3s ease-in-out;
        }

        /* Main wrapper margin transition */
        #mainWrapper {
            transition: margin-left 0.3s ease-in-out;
        }

        /* Simple Loading Bar */
        .loading-bar {
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 2px;
            background: linear-gradient(90deg, #10b981, #059669);
            z-index: 1000;
            transition: width 0.4s ease-out;
            opacity: 0;
            box-shadow: 0 0 10px rgba(16, 185, 129, 0.5);
        }

        .loading-bar.active {
            opacity: 1;
        }

        /* Page Loading Overlay */
        .page-loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.85);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            opacity: 1;
            transition: opacity 0.3s ease-out;
        }

        .page-loading-overlay.hidden {
            opacity: 0;
            pointer-events: none;
        }

        .loading-spinner {
            width: 60px;
            height: 60px;
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-top: 4px solid #ffffff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .loading-text {
            color: white;
            margin-top: 20px;
            font-size: 14px;
            font-weight: 500;
        }

        /* Loading spinner untuk button */
        .btn-loading {
            position: relative;
            pointer-events: none;
        }

        .btn-loading::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 16px;
            height: 16px;
            margin: -8px 0 0 -8px;
            border: 2px solid transparent;
            border-top: 2px solid currentColor;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Fade in animation for cards */
        .fade-in-up {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.6s ease forwards;
        }

        .fade-in-up:nth-child(1) { animation-delay: 0.1s; }
        .fade-in-up:nth-child(2) { animation-delay: 0.2s; }
        .fade-in-up:nth-child(3) { animation-delay: 0.3s; }
        .fade-in-up:nth-child(4) { animation-delay: 0.4s; }
        .fade-in-up:nth-child(5) { animation-delay: 0.5s; }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Smooth table row animations */
        .table-row-enter {
            opacity: 0;
            transform: translateX(-10px);
            animation: tableRowEnter 0.4s ease forwards;
        }

        @keyframes tableRowEnter {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Button hover effects */
        .btn-smooth {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .btn-smooth:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        /* Navigation link simple effects */
        .nav-link {
            position: relative;
            transition: background-color 0.2s ease;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 3px;
            background: #10b981;
            transform: scaleY(0);
            transition: transform 0.2s ease;
        }

        .nav-link:hover::before,
        .nav-link.active::before {
            transform: scaleY(1);
        }

        /* Disable animations for profile areas */
        .profile-menu,
        .profile-menu *,
        .profile-icon,
        .profile-icon * {
            transition: none !important;
            animation: none !important;
        }

        /* Simple Loading Bar */
        .loading-bar {
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 3px;
            background: linear-gradient(90deg, #10b981, #059669);
            z-index: 9999;
            transition: width 0.3s ease;
            box-shadow: 0 0 10px rgba(16, 185, 129, 0.5);
        }

        .loading-bar.loading {
            width: 100%;
            animation: loadingPulse 2s ease-in-out infinite;
        }

        .loading-bar.hidden {
            opacity: 0;
        }

        @keyframes loadingPulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
    </style>
</head>
<body class="bg-gray-100 dark:bg-gray-900 transition-colors duration-200">
    <!-- Page Loading Overlay -->
    <div id="pageLoadingOverlay" class="page-loading-overlay">
        <div class="text-center">
            <div class="loading-spinner mx-auto"></div>
            <p class="loading-text">Memuat halaman...</p>
        </div>
    </div>

    <!-- Main Content Wrapper (hidden saat loading) -->
    <div id="mainContent" style="opacity: 0;">
        <!-- Sidebar -->
    <div id="sidebar" class="fixed inset-y-0 left-0 w-64 bg-white dark:bg-gray-900 shadow-2xl transition-all duration-300 ease-in-out z-50 overflow-hidden border-r border-gray-200 dark:border-gray-800">
        <!-- Logo & Brand -->
        <div class="flex items-center justify-between p-5 border-b border-gray-200 dark:border-gray-800 bg-gradient-to-r from-green-600 to-green-700 dark:from-green-700 dark:to-green-800">
            <div class="flex items-center sidebar-text">
                <div class="w-10 h-10 rounded-lg flex items-center justify-center overflow-hidden">
                    <img src="{{ asset('images/logo13.png') }}" alt="Kultilas Logo" class="w-full h-full object-contain">
                </div>
                <div class="ml-3">
                    <h2 id="sidebarTitle" class="text-white text-base font-bold">KULTILAS</h2>
                    <p class="text-green-100 text-xs font-medium">Admin Panel</p>
                </div>
            </div>
            <button onclick="toggleSidebar()" class="text-white hover:bg-white/20 p-1.5 rounded-lg focus:outline-none flex-shrink-0 transition-all">
                <svg id="toggleIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7"></path>
                </svg>
            </button>
        </div>
        
        <!-- Navigation Menu -->
        <nav class="px-3 pb-4 mt-4 overflow-y-auto" style="max-height: calc(100vh - 150px);">
            <div class="space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="nav-link group flex items-center px-3 py-2.5 text-gray-700 dark:text-gray-300 hover:bg-green-50 dark:hover:bg-gray-800 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 font-semibold shadow-sm' : '' }}" title="Dashboard">
                    <div class="w-9 h-9 flex items-center justify-center rounded-lg bg-green-100 dark:bg-green-900/20 text-green-600 dark:text-green-400 group-hover:bg-green-200 dark:group-hover:bg-green-900/40 transition-colors flex-shrink-0 {{ request()->routeIs('admin.dashboard') ? 'bg-green-200 dark:bg-green-900/50' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                    </div>
                    <span class="ml-3 sidebar-text text-sm">Dashboard</span>
                </a>
                <a href="{{ route('admin.siswa.index') }}" class="nav-link group flex items-center px-3 py-2.5 text-gray-700 dark:text-gray-300 hover:bg-green-50 dark:hover:bg-gray-800 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.siswa.*') ? 'bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 font-semibold shadow-sm' : '' }}" title="Kelola Siswa">
                    <div class="w-9 h-9 flex items-center justify-center rounded-lg bg-blue-100 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400 group-hover:bg-blue-200 dark:group-hover:bg-blue-900/40 transition-colors flex-shrink-0 {{ request()->routeIs('admin.siswa.*') ? 'bg-blue-200 dark:bg-blue-900/50' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <span class="ml-3 sidebar-text text-sm">Kelola Siswa</span>
                </a>
                <a href="{{ route('admin.eskul.index') }}" class="nav-link group flex items-center px-3 py-2.5 text-gray-700 dark:text-gray-300 hover:bg-green-50 dark:hover:bg-gray-800 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.eskul.*') ? 'bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 font-semibold shadow-sm' : '' }}" title="Kelola Ekstrakurikuler">
                    <div class="w-9 h-9 flex items-center justify-center rounded-lg bg-purple-100 dark:bg-purple-900/20 text-purple-600 dark:text-purple-400 group-hover:bg-purple-200 dark:group-hover:bg-purple-900/40 transition-colors flex-shrink-0 {{ request()->routeIs('admin.eskul.*') ? 'bg-purple-200 dark:bg-purple-900/50' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <span class="ml-3 sidebar-text text-sm">Ekstrakurikuler</span>
                </a>
                <a href="{{ route('admin.pendaftaran.index') }}" class="nav-link group flex items-center px-3 py-2.5 text-gray-700 dark:text-gray-300 hover:bg-green-50 dark:hover:bg-gray-800 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.pendaftaran.*') ? 'bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 font-semibold shadow-sm' : '' }}" title="Pendaftaran">
                    <div class="w-9 h-9 flex items-center justify-center rounded-lg bg-orange-100 dark:bg-orange-900/20 text-orange-600 dark:text-orange-400 group-hover:bg-orange-200 dark:group-hover:bg-orange-900/40 transition-colors flex-shrink-0 {{ request()->routeIs('admin.pendaftaran.*') ? 'bg-orange-200 dark:bg-orange-900/50' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <span class="ml-3 sidebar-text text-sm">Pendaftaran</span>
                </a>
                <a href="{{ route('admin.presensi.index') }}" class="nav-link group flex items-center px-3 py-2.5 text-gray-700 dark:text-gray-300 hover:bg-green-50 dark:hover:bg-gray-800 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.presensi.*') ? 'bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 font-semibold shadow-sm' : '' }}" title="Presensi">
                    <div class="w-9 h-9 flex items-center justify-center rounded-lg bg-teal-100 dark:bg-teal-900/20 text-teal-600 dark:text-teal-400 group-hover:bg-teal-200 dark:group-hover:bg-teal-900/40 transition-colors flex-shrink-0 {{ request()->routeIs('admin.presensi.*') ? 'bg-teal-200 dark:bg-teal-900/50' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                        </svg>
                    </div>
                    <span class="ml-3 sidebar-text text-sm">Presensi</span>
                </a>
                <a href="{{ route('admin.prestasi.index') }}" class="nav-link group flex items-center px-3 py-2.5 text-gray-700 dark:text-gray-300 hover:bg-green-50 dark:hover:bg-gray-800 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.prestasi.*') ? 'bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 font-semibold shadow-sm' : '' }}" title="Prestasi">
                    <div class="w-9 h-9 flex items-center justify-center rounded-lg bg-yellow-100 dark:bg-yellow-900/20 text-yellow-600 dark:text-yellow-500 group-hover:bg-yellow-200 dark:group-hover:bg-yellow-900/40 transition-colors flex-shrink-0 {{ request()->routeIs('admin.prestasi.*') ? 'bg-yellow-200 dark:bg-yellow-900/50' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                        </svg>
                    </div>
                    <span class="ml-3 sidebar-text text-sm">Prestasi</span>
                </a>
                <a href="{{ route('admin.dashboard-content.index') }}" class="nav-link group flex items-center px-3 py-2.5 text-gray-700 dark:text-gray-300 hover:bg-green-50 dark:hover:bg-gray-800 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.dashboard-content.*') ? 'bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 font-semibold shadow-sm' : '' }}" title="Dashboard Siswa">
                    <div class="w-9 h-9 flex items-center justify-center rounded-lg bg-indigo-100 dark:bg-indigo-900/20 text-indigo-600 dark:text-indigo-400 group-hover:bg-indigo-200 dark:group-hover:bg-indigo-900/40 transition-colors flex-shrink-0 {{ request()->routeIs('admin.dashboard-content.*') ? 'bg-indigo-200 dark:bg-indigo-900/50' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 7.172V5L8 4z"></path>
                        </svg>
                    </div>
                    <span class="ml-3 sidebar-text text-sm">Dashboard Siswa</span>
                </a>
            </div>
            
            <!-- Logout Button -->
            <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="group flex items-center w-full px-3 py-2.5 text-gray-700 dark:text-gray-300 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-all duration-200" data-no-animation title="Logout">
                        <div class="w-9 h-9 flex items-center justify-center rounded-lg bg-red-100 dark:bg-red-900/20 text-red-600 dark:text-red-400 group-hover:bg-red-200 dark:group-hover:bg-red-900/40 transition-colors flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                        </div>
                        <span class="ml-3 sidebar-text text-sm font-medium">Logout</span>
                    </button>
                </form>
            </div>
        </nav>
    </div>

    <!-- Overlay (hanya untuk mobile) -->
    <div id="overlay" class="lg:hidden fixed inset-0 bg-black bg-opacity-50 z-40 hidden" onclick="toggleSidebar()"></div>

    <!-- Main Content -->
    <div id="mainWrapper" class="transition-all duration-300 lg:ml-64">
        <!-- Top Bar -->
        <div class="bg-gradient-to-r from-green-700 to-green-900 dark:from-gray-800 dark:to-gray-900 shadow-xl ring-1 ring-white/10 relative overflow-visible sticky top-0 z-30 transition-colors duration-200">
            <!-- Decorative overlay -->
            <div class="absolute inset-0 opacity-[0.06] bg-[radial-gradient(ellipse_at_top_left,_var(--tw-gradient-stops))] from-white via-transparent to-transparent pointer-events-none"></div>
            <div class="absolute bottom-0 left-0 right-0 h-0.5 bg-gradient-to-r from-emerald-400/60 via-green-500/60 to-teal-400/60"></div>
            <div class="flex items-center justify-between px-6 py-4">
                <button onclick="toggleSidebar()" class="text-white hover:text-green-200 dark:hover:text-gray-300 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                <div class="flex items-center">
                    <svg class="w-8 h-8 text-white mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    <div>
                        <h1 class="text-2xl md:text-3xl font-extrabold tracking-tight text-white">@yield('page-title', 'Admin Panel')</h1>
                        <p class="text-green-200 dark:text-gray-300 text-xs">SMKN 13 Bandung - Sistem Ekstrakurikuler</p>
                    </div>
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
                                <p class="text-white font-semibold text-sm">{{ Auth::user()->nama_lengkap ?? Auth::user()->username }}</p>
                                <p class="text-green-200 dark:text-gray-300 text-xs">Administrator</p>
                            </div>
                            <div class="profile-icon w-10 h-10 rounded-full bg-white dark:bg-gray-700 flex items-center justify-center hover:bg-green-50 dark:hover:bg-gray-600 transition-colors overflow-hidden">
                                @if(Auth::user()->foto_profile)
                                    <img src="{{ asset('images/profile/' . Auth::user()->foto_profile) }}" alt="Profile" class="w-full h-full object-cover">
                                @else
                                    <svg class="w-6 h-6 text-green-700 dark:text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
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
                            <div class="px-4 py-3 border-b border-gray-200 dark:border-gray-700">
                                <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ Auth::user()->nama_lengkap ?? Auth::user()->username }}</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">{{ Auth::user()->email ?? 'admin@kultilas.com' }}</p>
                                <span class="inline-block mt-2 px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                    Administrator
                                </span>
                            </div>

                            <!-- Menu Items -->
                            <div class="py-2">
                                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors" data-no-animation>
                                    <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                    </svg>
                                    Dashboard
                                </a>
                                <a href="{{ route('profile.edit') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors" data-no-animation>
                                    <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Profil Saya
                                </a>
                                <a href="{{ route('profile.edit') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors" data-no-animation>
                                    <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    Pengaturan
                                </a>
                            </div>

                            <!-- Logout -->
                            <div class="border-t border-gray-200 dark:border-gray-700 pt-2">
                                <form method="POST" action="{{ route('logout') }}">
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

        <!-- Content -->
        <main class="p-6">
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
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainWrapper = document.getElementById('mainWrapper');
            const sidebarTexts = document.querySelectorAll('.sidebar-text');
            const sidebarTitle = document.getElementById('sidebarTitle');
            const toggleIcon = document.getElementById('toggleIcon');
            
            const isCollapsed = sidebar.classList.contains('w-20');
            
            if (isCollapsed) {
                // Expand
                sidebar.classList.remove('w-20');
                sidebar.classList.add('w-64');
                mainWrapper.classList.remove('lg:ml-20');
                mainWrapper.classList.add('lg:ml-64');
                
                // Show text with delay
                setTimeout(() => {
                    sidebarTexts.forEach(text => {
                        text.classList.remove('hidden', 'opacity-0');
                        text.classList.add('opacity-100');
                    });
                    sidebarTitle.classList.remove('hidden');
                }, 150);
                
                // Change icon to collapse
                toggleIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7"></path>';
                
                localStorage.setItem('sidebarCollapsed', 'false');
            } else {
                // Collapse
                sidebarTexts.forEach(text => {
                    text.classList.add('hidden', 'opacity-0');
                    text.classList.remove('opacity-100');
                });
                sidebarTitle.classList.add('hidden');
                
                setTimeout(() => {
                    sidebar.classList.remove('w-64');
                    sidebar.classList.add('w-20');
                    mainWrapper.classList.remove('lg:ml-64');
                    mainWrapper.classList.add('lg:ml-20');
                }, 100);
                
                // Change icon to expand
                toggleIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>';
                
                localStorage.setItem('sidebarCollapsed', 'true');
            }
        }

        // Restore sidebar state on page load
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
            
            if (sidebarCollapsed) {
                const sidebar = document.getElementById('sidebar');
                const mainWrapper = document.getElementById('mainWrapper');
                const sidebarTexts = document.querySelectorAll('.sidebar-text');
                const sidebarTitle = document.getElementById('sidebarTitle');
                const toggleIcon = document.getElementById('toggleIcon');
                
                // Disable transitions temporarily for instant state restore
                sidebar.style.transition = 'none';
                mainWrapper.style.transition = 'none';
                sidebarTexts.forEach(text => {
                    text.style.transition = 'none';
                });
                
                sidebar.classList.remove('w-64');
                sidebar.classList.add('w-20');
                mainWrapper.classList.remove('lg:ml-64');
                mainWrapper.classList.add('lg:ml-20');
                
                sidebarTexts.forEach(text => {
                    text.classList.add('hidden', 'opacity-0');
                });
                sidebarTitle.classList.add('hidden');
                
                toggleIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>';
                
                // Re-enable transitions after a brief moment
                setTimeout(() => {
                    sidebar.style.transition = '';
                    mainWrapper.style.transition = '';
                    sidebarTexts.forEach(text => {
                        text.style.transition = '';
                    });
                }, 50);
            }
        });

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

        // Simple Loading System
        document.addEventListener('DOMContentLoaded', function() {
            // Hide page loading overlay when page is ready
            hidePageLoading();
            
            // Add navigation loading
            setupNavigationLoading();
        });

        function setupNavigationLoading() {
            // Add loading to all navigation links
            const navLinks = document.querySelectorAll('nav a, #sidebar a');
            navLinks.forEach(link => {
                if (!link.closest('.profile-menu')) {
                    link.addEventListener('click', function() {
                        if (this.href && !this.href.includes('#')) {
                            showPageLoading();
                        }
                    });
                }
            });
        }

        function animateElements() {
            // Animate cards with stagger (excluding profile areas and sidebar)
            const cards = document.querySelectorAll('.bg-white, .bg-gray-800');
            cards.forEach((card, index) => {
                // Skip any card that contains or is within profile elements or sidebar
                if (!card.closest('.profile-menu') && 
                    !card.classList.contains('profile-icon') && 
                    !card.querySelector('.profile-icon') &&
                    !card.closest('header') &&
                    !card.closest('#sidebar')) {
                    card.classList.add('fade-in-up');
                    card.style.animationDelay = `${index * 0.1}s`;
                }
            });
            
            // Animate table rows
            const tableRows = document.querySelectorAll('tbody tr');
            tableRows.forEach((row, index) => {
                row.classList.add('table-row-enter');
                row.style.animationDelay = `${index * 0.05}s`;
            });
            
            // Add smooth hover effects to buttons (excluding sidebar links)
            const buttons = document.querySelectorAll('button, .btn, a[class*="bg-"]');
            buttons.forEach(btn => {
                if (!btn.closest('#sidebar')) {
                    btn.classList.add('btn-smooth');
                }
            });
        }

        function setupSmoothNavigation() {
            // Add smooth link class to navigation with loading indicator
            const navLinks = document.querySelectorAll('nav a');
            navLinks.forEach(link => {
                // Skip profile area links
                if (link.closest('.profile-menu') || link.hasAttribute('data-no-animation')) {
                    return;
                }
                
                link.classList.add('nav-link', 'smooth-link');
                
                // Add click handler for navigation links to show loading
                link.addEventListener('click', function(e) {
                    if (this.href && !this.href.includes('#') && !this.closest('.profile-menu')) {
                        showPageLoading();
                    }
                });
            });
            
            // Add smooth transitions to action buttons (excluding navigation and profile area)
            const actionLinks = document.querySelectorAll('a[href]:not([href^="#"]):not([href^="javascript:"])');
            actionLinks.forEach(link => {
                if (!link.closest('nav') && !link.closest('.profile-menu')) {
                    // Only add animation to non-navigation links
                    link.addEventListener('click', function(e) {
                        if (this.href && !this.target && !this.closest('nav')) {
                            showPageLoading();
                            // Allow natural navigation without preventDefault
                        }
                    });
                }
            });
        }



        // Simplified loading functions
        function showLoadingBar() {
            const loadingBar = document.getElementById('loadingBar');
            if (loadingBar) {
                loadingBar.style.opacity = '1';
                loadingBar.style.width = '30%';
                
                setTimeout(() => {
                    loadingBar.style.width = '70%';
                }, 200);
            }
        }

        function hideLoadingBar() {
            const loadingBar = document.getElementById('loadingBar');
            if (loadingBar) {
                loadingBar.style.width = '100%';
                setTimeout(() => {
                    loadingBar.style.opacity = '0';
                    setTimeout(() => {
                        loadingBar.style.width = '0%';
                    }, 300);
                }, 200);
            }
        }

        // Page Loading Overlay Functions
        function showPageLoading() {
            const overlay = document.getElementById('pageLoadingOverlay');
            const mainContent = document.getElementById('mainContent');
            if (overlay) {
                overlay.classList.remove('hidden');
            }
            if (mainContent) {
                mainContent.style.opacity = '0';
            }
        }

        function hidePageLoading() {
            const overlay = document.getElementById('pageLoadingOverlay');
            const mainContent = document.getElementById('mainContent');
            if (overlay && mainContent) {
                // Show content first
                mainContent.style.opacity = '1';
                mainContent.style.transition = 'opacity 0.4s ease-in';
                
                // Then hide overlay
                setTimeout(() => {
                    overlay.classList.add('hidden');
                }, 400);
            }
        }

        // Show loading on form submissions
        document.addEventListener('submit', function(e) {
            const form = e.target;
            if (form.tagName === 'FORM' && !form.hasAttribute('data-no-loading')) {
                showPageLoading();
            }
        });

        // Show loading on page unload (when navigating away)
        window.addEventListener('beforeunload', function() {
            showPageLoading();
        });
    </script>
    </div> <!-- End Main Content Wrapper -->
</body>
</html>
