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
            position: relative;
            overflow: hidden;
        }
        .hero-bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 20% 50%, rgba(34, 197, 94, 0.1) 0%, transparent 50%),
                        radial-gradient(circle at 80% 80%, rgba(34, 197, 94, 0.1) 0%, transparent 50%);
            animation: gradientShift 15s ease infinite;
            pointer-events: none;
        }
        .dark .hero-bg {
            background-image: linear-gradient(rgba(17, 24, 39, 0.9), rgba(31, 41, 55, 0.9)), url('/images/smkn13.jpg');
        }
        .card-hover:hover {
            transform: translateY(-8px);
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.2);
        }

        /* Flip Card Styles */
        .flip-card {
            perspective: 1000px;
        }
        .flip-card-inner {
            position: relative;
            width: 100%;
            transition: transform 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            transform-style: preserve-3d;
        }
        .flip-card-inner.flipped {
            transform: rotateY(180deg);
        }
        .flip-card-front, .flip-card-back {
            backface-visibility: hidden;
            -webkit-backface-visibility: hidden;
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

        /* Gradient Shift Animation */
        @keyframes gradientShift {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }

        /* Floating Animation */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        .float-animation {
            animation: float 3s ease-in-out infinite;
        }

        /* Shimmer Effect */
        @keyframes shimmer {
            0% { background-position: -1000px 0; }
            100% { background-position: 1000px 0; }
        }
        .shimmer {
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            background-size: 1000px 100%;
            animation: shimmer 2s infinite;
        }

        /* Glow Effect */
        .glow-effect {
            box-shadow: 0 0 20px rgba(34, 197, 94, 0.5);
            animation: glow-pulse 2s ease-in-out infinite;
        }
        @keyframes glow-pulse {
            0%, 100% { box-shadow: 0 0 20px rgba(34, 197, 94, 0.5); }
            50% { box-shadow: 0 0 30px rgba(34, 197, 94, 0.8); }
        }

        /* Stats Counter */
        .counter {
            font-size: 2.5rem;
            font-weight: 800;
            color: #16a34a;
        }

        /* Scroll Animation */
        .scroll-reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease-out;
        }
        .scroll-reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        /* Gradient Text */
        .gradient-text {
            background: linear-gradient(135deg, #16a34a, #22c55e, #86efac);
            background-size: 300% 300%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: gradientAnimation 8s ease infinite;
        }
        @keyframes gradientAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Button Ripple Effect */
        .btn-ripple {
            position: relative;
            overflow: hidden;
        }
        .btn-ripple::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            animation: ripple-animation 0.6s ease-out;
        }
        @keyframes ripple-animation {
            0% {
                width: 0;
                height: 0;
                opacity: 1;
            }
            100% {
                width: 300px;
                height: 300px;
                opacity: 0;
            }
        }

        /* Enhanced Dark Mode */
        .dark .glow-effect {
            box-shadow: 0 0 30px rgba(34, 197, 94, 0.3);
        }

        /* Responsive Text */
        @media (max-width: 768px) {
            .gradient-text { font-size: 1.5rem; }
            .counter { font-size: 1.8rem; }
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
    <section class="hero-bg text-white py-20 relative">
        <div class="container mx-auto px-6 text-center relative z-10">
            <div class="bg-black bg-opacity-30 backdrop-blur-sm rounded-2xl p-12 max-w-4xl mx-auto border border-white/10 shadow-2xl hover:border-white/20 transition-all duration-300 scroll-reveal">
                <div class="mb-6 float-animation">
                    <svg class="w-16 h-16 mx-auto text-green-300 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h2 class="text-5xl md:text-6xl font-bold mb-4 gradient-text">
                    <span id="typing-text"></span>
                    <span class="typing-cursor">|</span>
                </h2>
                <p class="text-2xl mb-2 font-semibold text-green-100">SMKN 13 Bandung</p>
                <p class="text-xl mb-8 text-green-50 max-w-2xl mx-auto">Platform Manajemen Ekstrakurikuler yang Modern, Interaktif, dan Efisien</p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="#login" class="group relative bg-white text-green-800 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition shadow-lg hover:shadow-2xl hover:scale-105 transform inline-block btn-ripple">
                        <span class="relative z-10">🚀 Mulai Sekarang</span>
                    </a>
                    <a href="#tentang" class="group border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-green-800 transition hover:shadow-xl hover:scale-105 transform inline-block relative overflow-hidden">
                        <div class="absolute inset-0 bg-white/0 group-hover:bg-white/10 transition duration-300"></div>
                        <span class="relative z-10">📚 Pelajari Lebih Lanjut</span>
                    </a>
                </div>
                <!-- Scroll Indicator -->
                <div class="mt-12 flex justify-center">
                    <div class="animate-bounce">
                        <svg class="w-6 h-6 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Login Section -->
    <section id="login" class="py-20 bg-gradient-to-b from-gray-50 to-white dark:from-gray-800 dark:to-gray-900 transition-colors duration-200 relative overflow-hidden">
        <!-- Background Animation -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-0 right-0 w-96 h-96 bg-green-100 dark:bg-green-900/20 rounded-full blur-3xl opacity-20 animate-pulse"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-100 dark:bg-blue-900/20 rounded-full blur-3xl opacity-20 animate-pulse"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16 scroll-reveal">
                <h3 class="text-4xl md:text-5xl font-bold text-green-800 dark:text-green-400 mb-4 gradient-text">Portal Login</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-2">Pilih portal sesuai dengan peran Anda</p>
                <div class="w-24 h-1 bg-gradient-to-r from-green-600 to-green-400 mx-auto rounded-full"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 max-w-7xl mx-auto">
                <!-- Admin Card -->
                <div class="group relative bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 text-center card-hover transition-all duration-300 border border-gray-100 dark:border-gray-700 hover:border-red-500/50 overflow-hidden scroll-reveal">
                    <div class="absolute inset-0 bg-gradient-to-br from-red-50/0 to-red-100/0 dark:from-red-900/0 dark:to-red-900/0 group-hover:from-red-50/50 group-hover:to-red-100/30 dark:group-hover:from-red-900/20 dark:group-hover:to-red-900/10 transition-all duration-300"></div>
                    <div class="relative z-10">
                        <div class="w-20 h-20 mx-auto mb-4 overflow-hidden rounded-full ring-4 ring-red-100 dark:ring-red-900 group-hover:ring-red-200 dark:group-hover:ring-red-800 transition-all duration-300 transform group-hover:scale-110">
                            <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=200&h=200&fit=crop&crop=faces" 
                                 alt="Administrator" 
                                 class="w-full h-full object-cover"
                                 onerror="this.src='https://ui-avatars.com/api/?name=Admin&size=200&background=DC2626&color=fff&bold=true'">
                        </div>
                        <h4 class="text-2xl font-bold text-gray-800 dark:text-white mb-2 group-hover:text-red-600 dark:group-hover:text-red-400 transition-colors">Administrator</h4>
                        <p class="text-gray-600 dark:text-gray-400 mb-6 text-sm leading-relaxed">Kelola seluruh sistem dan data ekstrakurikuler dengan mudah</p>
                        <a href="{{ route('login') }}" class="block w-full bg-red-600 text-white py-3 rounded-lg font-semibold hover:bg-red-700 transition transform hover:scale-105 relative overflow-hidden group/btn">
                            <span class="relative z-10">Login Admin</span>
                            <div class="absolute inset-0 bg-red-700 scale-x-0 group-hover/btn:scale-x-100 transition-transform duration-300 origin-left"></div>
                        </a>
                    </div>
                </div>

                <!-- Pembina Card -->
                <div class="group relative bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 text-center card-hover transition-all duration-300 border border-gray-100 dark:border-gray-700 hover:border-blue-500/50 overflow-hidden scroll-reveal">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-50/0 to-blue-100/0 dark:from-blue-900/0 dark:to-blue-900/0 group-hover:from-blue-50/50 group-hover:to-blue-100/30 dark:group-hover:from-blue-900/20 dark:group-hover:to-blue-900/10 transition-all duration-300"></div>
                    <div class="relative z-10">
                        <div class="w-20 h-20 mx-auto mb-4 overflow-hidden rounded-full ring-4 ring-blue-100 dark:ring-blue-900 group-hover:ring-blue-200 dark:group-hover:ring-blue-800 transition-all duration-300 transform group-hover:scale-110">
                            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=200&h=200&fit=crop&crop=faces" 
                                 alt="Pembina" 
                                 class="w-full h-full object-cover"
                                 onerror="this.src='https://ui-avatars.com/api/?name=Pembina&size=200&background=2563EB&color=fff&bold=true'">
                        </div>
                        <h4 class="text-2xl font-bold text-gray-800 dark:text-white mb-2 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">Pembina</h4>
                        <p class="text-gray-600 dark:text-gray-400 mb-6 text-sm leading-relaxed">Kelola eskul yang Anda bina dan pantau perkembangan siswa</p>
                        <a href="{{ route('login') }}" class="block w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition transform hover:scale-105 relative overflow-hidden group/btn">
                            <span class="relative z-10">Login Pembina</span>
                            <div class="absolute inset-0 bg-blue-700 scale-x-0 group-hover/btn:scale-x-100 transition-transform duration-300 origin-left"></div>
                        </a>
                    </div>
                </div>

                <!-- Pelatih Card -->
                <div class="group relative bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 text-center card-hover transition-all duration-300 border border-gray-100 dark:border-gray-700 hover:border-green-500/50 overflow-hidden scroll-reveal">
                    <div class="absolute inset-0 bg-gradient-to-br from-green-50/0 to-green-100/0 dark:from-green-900/0 dark:to-green-900/0 group-hover:from-green-50/50 group-hover:to-green-100/30 dark:group-hover:from-green-900/20 dark:group-hover:to-green-900/10 transition-all duration-300"></div>
                    <div class="relative z-10">
                        <div class="w-20 h-20 mx-auto mb-4 overflow-hidden rounded-full ring-4 ring-green-100 dark:ring-green-900 group-hover:ring-green-200 dark:group-hover:ring-green-800 transition-all duration-300 transform group-hover:scale-110">
                            <img src="https://images.unsplash.com/photo-1566492031773-4f4e44671857?w=200&h=200&fit=crop&crop=faces" 
                                 alt="Pelatih" 
                                 class="w-full h-full object-cover"
                                 onerror="this.src='https://ui-avatars.com/api/?name=Pelatih&size=200&background=16A34A&color=fff&bold=true'">
                        </div>
                        <h4 class="text-2xl font-bold text-gray-800 dark:text-white mb-2 group-hover:text-green-600 dark:group-hover:text-green-400 transition-colors">Pelatih</h4>
                        <p class="text-gray-600 dark:text-gray-400 mb-6 text-sm leading-relaxed">Kelola program latihan dan evaluasi performa siswa</p>
                        <a href="{{ route('login') }}" class="block w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700 transition transform hover:scale-105 relative overflow-hidden group/btn">
                            <span class="relative z-10">Login Pelatih</span>
                            <div class="absolute inset-0 bg-green-700 scale-x-0 group-hover/btn:scale-x-100 transition-transform duration-300 origin-left"></div>
                        </a>
                    </div>
                </div>

                <!-- Siswa Card -->
                <div class="group relative bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 text-center card-hover transition-all duration-300 border border-gray-100 dark:border-gray-700 hover:border-purple-500/50 overflow-hidden scroll-reveal">
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-50/0 to-purple-100/0 dark:from-purple-900/0 dark:to-purple-900/0 group-hover:from-purple-50/50 group-hover:to-purple-100/30 dark:group-hover:from-purple-900/20 dark:group-hover:to-purple-900/10 transition-all duration-300"></div>
                    <div class="relative z-10">
                        <div class="w-20 h-20 mx-auto mb-4 overflow-hidden rounded-full ring-4 ring-purple-100 dark:ring-purple-900 group-hover:ring-purple-200 dark:group-hover:ring-purple-800 transition-all duration-300 transform group-hover:scale-110">
                            <img src="https://images.unsplash.com/photo-1522529599102-193c0d76b5b6?w=200&h=200&fit=crop&crop=faces" 
                                 alt="Siswa" 
                                 class="w-full h-full object-cover"
                                 onerror="this.src='https://ui-avatars.com/api/?name=Siswa&size=200&background=9333EA&color=fff&bold=true'">
                        </div>
                        <h4 class="text-2xl font-bold text-gray-800 dark:text-white mb-2 group-hover:text-purple-600 dark:group-hover:text-purple-400 transition-colors">Siswa</h4>
                        <p class="text-gray-600 dark:text-gray-400 mb-6 text-sm leading-relaxed">Daftar dan kelola ekstrakurikuler yang Anda ikuti</p>
                        <a href="{{ route('siswa.login') }}" class="block w-full bg-purple-600 text-white py-3 rounded-lg font-semibold hover:bg-purple-700 transition transform hover:scale-105 relative overflow-hidden group/btn mb-3">
                            <span class="relative z-10">Login Siswa</span>
                            <div class="absolute inset-0 bg-purple-700 scale-x-0 group-hover/btn:scale-x-100 transition-transform duration-300 origin-left"></div>
                        </a>
                        <a href="{{ route('siswa.register') }}" class="block w-full border-2 border-purple-600 text-purple-600 dark:text-purple-400 dark:border-purple-400 py-2 rounded-lg font-semibold hover:bg-purple-50 dark:hover:bg-purple-900/20 transition transform hover:scale-105 relative overflow-hidden group/btn">
                            <span class="relative z-10">Daftar</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="fitur" class="py-20 bg-gradient-to-b from-white to-gray-50 dark:from-gray-900 dark:to-gray-800 transition-colors duration-200 relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-40 -right-40 w-80 h-80 bg-green-200/10 dark:bg-green-900/10 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-purple-200/10 dark:bg-purple-900/10 rounded-full blur-3xl"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16 scroll-reveal">
                <h3 class="text-4xl md:text-5xl font-bold text-green-800 dark:text-green-400 mb-4 gradient-text">✨ Fitur Unggulan</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-2 text-lg">Sistem yang lengkap dan powerful untuk manajemen ekstrakurikuler</p>
                <div class="w-32 h-1 bg-gradient-to-r from-green-600 to-green-400 mx-auto rounded-full"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <!-- Feature 1 -->
                <div class="group relative bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 hover:shadow-2xl transition-all duration-300 border border-gray-100 dark:border-gray-700 hover:border-purple-500/50 overflow-hidden scroll-reveal">
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-50/0 to-purple-100/0 dark:from-purple-900/0 dark:to-purple-900/0 group-hover:from-purple-50/50 group-hover:to-purple-100/30 dark:group-hover:from-purple-900/20 dark:group-hover:to-purple-900/10 transition-all duration-300"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-100 to-purple-200 dark:from-purple-900 dark:to-purple-800 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300 group-hover:shadow-lg">
                            <svg class="w-8 h-8 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                            </svg>
                        </div>
                        <h4 class="text-xl font-bold mb-2 text-gray-800 dark:text-white group-hover:text-purple-600 dark:group-hover:text-purple-400 transition-colors">Pendaftaran Online</h4>
                        <p class="text-gray-600 dark:text-gray-400">Siswa dapat mendaftar ekstrakurikuler secara online dengan mudah dan cepat tanpa paperwork</p>
                        <div class="mt-4 flex items-center text-purple-600 dark:text-purple-400 text-sm font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <span>Pelajari lebih lanjut</span>
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="group relative bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 hover:shadow-2xl transition-all duration-300 border border-gray-100 dark:border-gray-700 hover:border-blue-500/50 overflow-hidden scroll-reveal">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-50/0 to-blue-100/0 dark:from-blue-900/0 dark:to-blue-900/0 group-hover:from-blue-50/50 group-hover:to-blue-100/30 dark:group-hover:from-blue-900/20 dark:group-hover:to-blue-900/10 transition-all duration-300"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-100 to-blue-200 dark:from-blue-900 dark:to-blue-800 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300 group-hover:shadow-lg">
                            <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h4 class="text-xl font-bold mb-2 text-gray-800 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">Presensi Digital</h4>
                        <p class="text-gray-600 dark:text-gray-400">Pencatatan kehadiran siswa secara digital, real-time, dan akurat dengan laporan otomatis</p>
                        <div class="mt-4 flex items-center text-blue-600 dark:text-blue-400 text-sm font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <span>Pelajari lebih lanjut</span>
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="group relative bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 hover:shadow-2xl transition-all duration-300 border border-gray-100 dark:border-gray-700 hover:border-green-500/50 overflow-hidden scroll-reveal">
                    <div class="absolute inset-0 bg-gradient-to-br from-green-50/0 to-green-100/0 dark:from-green-900/0 dark:to-green-900/0 group-hover:from-green-50/50 group-hover:to-green-100/30 dark:group-hover:from-green-900/20 dark:group-hover:to-green-900/10 transition-all duration-300"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-100 to-green-200 dark:from-green-900 dark:to-green-800 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300 group-hover:shadow-lg">
                            <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                            </svg>
                        </div>
                        <h4 class="text-xl font-bold mb-2 text-gray-800 dark:text-white group-hover:text-green-600 dark:group-hover:text-green-400 transition-colors">Pencatatan Prestasi</h4>
                        <p class="text-gray-600 dark:text-gray-400">Dokumentasi prestasi siswa yang terstruktur dengan portfolio dan sertifikat digital</p>
                        <div class="mt-4 flex items-center text-green-600 dark:text-green-400 text-sm font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <span>Pelajari lebih lanjut</span>
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Stats Section -->
            <div class="mt-20 grid grid-cols-1 md:grid-cols-3 gap-8 max-w-3xl mx-auto">
                <div class="text-center scroll-reveal">
                    <div class="counter">150+</div>
                    <p class="text-gray-600 dark:text-gray-400 mt-2">Siswa Terdaftar</p>
                </div>
                <div class="text-center scroll-reveal">
                    <div class="counter">25+</div>
                    <p class="text-gray-600 dark:text-gray-400 mt-2">Ekstrakurikuler</p>
                </div>
                <div class="text-center scroll-reveal">
                    <div class="counter">100%</div>
                    <p class="text-gray-600 dark:text-gray-400 mt-2">Kepuasan Pengguna</p>
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
    <footer id="kontak" class="bg-gradient-to-b from-gray-800 to-gray-900 dark:from-gray-950 dark:to-gray-950 text-white py-16 transition-colors duration-200 relative overflow-hidden">
        <!-- Background Animation -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none opacity-30">
            <div class="absolute top-0 right-0 w-96 h-96 bg-green-900 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-900 rounded-full blur-3xl"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                <!-- Brand Section -->
                <div class="scroll-reveal">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="h-12 w-12 rounded-lg flex items-center justify-center p-2 bg-white/10 backdrop-blur-sm">
                            <img src="{{ asset('images/logo13.png') }}" alt="Logo Kultilas" class="h-full w-full object-contain">
                        </div>
                        <div>
                            <h4 class="text-xl font-bold bg-gradient-to-r from-green-400 to-green-300 bg-clip-text text-transparent">Kultilas</h4>
                            <p class="text-xs text-gray-400">SMKN 13 Bandung</p>
                        </div>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed">Sistem Informasi Ekstrakurikuler yang modern, aman, dan terintegrasi untuk mendukung pembelajaran siswa.</p>
                </div>

                <!-- Quick Links -->
                <div class="scroll-reveal">
                    <h4 class="text-lg font-bold mb-6 text-green-400">Quick Links</h4>
                    <ul class="space-y-3">
                        <li><a href="#login" class="text-gray-400 hover:text-green-400 transition-colors duration-300 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            Portal Login
                        </a></li>
                        <li><a href="#fitur" class="text-gray-400 hover:text-green-400 transition-colors duration-300 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            Fitur
                        </a></li>
                        <li><a href="#tentang" class="text-gray-400 hover:text-green-400 transition-colors duration-300 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            Ekstrakurikuler
                        </a></li>
                    </ul>
                </div>

                <!-- Support -->
                <div class="scroll-reveal">
                    <h4 class="text-lg font-bold mb-6 text-green-400">Support</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-green-400 transition-colors duration-300 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            FAQ
                        </a></li>
                        <li><a href="#" class="text-gray-400 hover:text-green-400 transition-colors duration-300 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            Dokumentasi
                        </a></li>
                        <li><a href="#" class="text-gray-400 hover:text-green-400 transition-colors duration-300 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            Status
                        </a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div class="scroll-reveal">
                    <h4 class="text-lg font-bold mb-6 text-green-400">Kontak</h4>
                    <ul class="space-y-4 text-gray-400 text-sm">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-green-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <span>info@kultilas.sch.id</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-green-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 00.948.684l1.498 7.484a1 1 0 00.502.756l2.048 1.029a11.042 11.042 0 005.516 5.516l1.029 2.048a1 1 0 00.756.502l7.484 1.498a1 1 0 00.684.948V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            <span>(021) 1234-5678</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-green-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span>Jl. Pendidikan No. 123, Bandung</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Divider -->
            <div class="border-t border-gray-700/50 mb-8"></div>

            <!-- Bottom Footer -->
            <div class="flex flex-col md:flex-row justify-between items-center text-gray-400 text-sm">
                <p>&copy; 2025 <span class="text-green-400 font-semibold">Kultilas</span>. All rights reserved.</p>
                <div class="flex gap-6 mt-4 md:mt-0">
                    <a href="#" class="hover:text-green-400 transition-colors duration-300 flex items-center gap-1">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"></path></svg>
                        Facebook
                    </a>
                    <a href="#" class="hover:text-green-400 transition-colors duration-300 flex items-center gap-1">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 002.856-3.215 9.954 9.954 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"></path></svg>
                        Twitter
                    </a>
                    <a href="#" class="hover:text-green-400 transition-colors duration-300 flex items-center gap-1">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm.14 19.018c-3.868 0-7.008-2.656-7.008-5.911 0-.858.168-1.703.519-2.476h2.212c.451 1.022.224 2.605-1.541 2.605-.708 0-1.287-.519-1.287-1.227 0-.708.578-1.227 1.287-1.227 1.765 0 1.992 1.583 1.541 2.605h2.212c-.351-.773-.519-1.618-.519-2.476 0-3.255-3.14-5.911-7.008-5.911-3.867 0-7.007 2.656-7.007 5.911s3.14 5.911 7.007 5.911z"></path></svg>
                        Instagram
                    </a>
                </div>
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

        // Scroll Reveal Animation
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe all scroll-reveal elements
        document.querySelectorAll('.scroll-reveal').forEach(element => {
            observer.observe(element);
        });

        // Ripple Effect on Buttons
        document.querySelectorAll('.btn-ripple').forEach(button => {
            button.addEventListener('click', function(event) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = event.clientX - rect.left - size / 2;
                const y = event.clientY - rect.top - size / 2;

                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                ripple.classList.add('absolute', 'bg-white/30', 'rounded-full', 'pointer-events-none');

                this.appendChild(ripple);

                setTimeout(() => ripple.remove(), 600);
            });
        });

        // Smooth Scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href !== '#' && document.querySelector(href)) {
                    e.preventDefault();
                    const element = document.querySelector(href);
                    const offsetTop = element.offsetTop - 80;
                    
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Add scroll-based navbar background effect
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('nav');
            if (window.scrollY > 10) {
                navbar.classList.add('shadow-lg');
            } else {
                navbar.classList.remove('shadow-lg');
            }
        });

        // Counter Animation
        function animateCounter() {
            const counters = document.querySelectorAll('.counter');
            
            counters.forEach(counter => {
                const target = parseInt(counter.textContent);
                const isPercentage = counter.textContent.includes('%');
                let current = 0;
                
                const increment = target / 50;
                
                const updateCounter = () => {
                    if (current < target) {
                        current += increment;
                        counter.textContent = isPercentage 
                            ? Math.floor(current) + '%' 
                            : Math.floor(current) + '+';
                        setTimeout(updateCounter, 30);
                    } else {
                        counter.textContent = counter.textContent;
                    }
                };
                
                // Start animation when element is in view
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            updateCounter();
                            observer.unobserve(entry.target);
                        }
                    });
                });
                
                observer.observe(counter);
            });
        }

        // Call counter animation on page load
        window.addEventListener('load', animateCounter);

        // Add parallax effect to hero section
        window.addEventListener('scroll', () => {
            const heroSection = document.querySelector('.hero-bg');
            if (heroSection) {
                const scrollPosition = window.scrollY;
                heroSection.style.backgroundPosition = `center ${scrollPosition * 0.5}px`;
            }
        });
    </script>
</body>
</html>
