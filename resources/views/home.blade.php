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
            background-color: #f3f4f6;
            background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('/images/smkn13.jpg');
            background-size: cover;
            background-position: center;
        }
        .dark .hero-bg {
            background-image: linear-gradient(rgba(17, 24, 39, 0.9), rgba(17, 24, 39, 0.9)), url('/images/smkn13.jpg');
        }
        
        /* Line clamp utilities */
        .line-clamp-1 {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
    <!-- Navbar -->
    <nav class="bg-white/95 dark:bg-gray-900/95 backdrop-blur-md shadow-md fixed w-full top-0 z-50 border-b border-gray-200 dark:border-gray-800 transition-colors duration-200">
        <div class="container mx-auto px-6 py-3">
            <div class="flex justify-between items-center">
               <!-- Logo & Brand -->
                <div class="flex items-center gap-3">
                    <div class="h-14 w-14 flex items-center justify-center p-2">
                        <img src="{{ asset('images/logo13.png') }}" alt="Logo Kultilas" class="h-full w-full object-contain">
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold bg-gradient-to-r from-green-700 to-green-600 dark:from-green-400 dark:to-green-300 bg-clip-text text-transparent">Kultilas</h1>
                        <span class="text-xs text-gray-600 dark:text-gray-400 font-medium">SMKN 13 Bandung</span>
                    </div>
                </div>

                <div class="hidden md:flex gap-2 items-center bg-gray-100/80 dark:bg-gray-800/80 backdrop-blur-sm px-3 py-2 rounded-full shadow-inner"> 
                    <a href="#berita" class="px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gradient-to-r hover:from-green-500 hover:to-green-600 hover:text-white font-medium rounded-full transition-all duration-300 hover:shadow-md hover:scale-105 transform">
                        Berita
                    </a>
                    <a href="#tentang" class="px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gradient-to-r hover:from-green-500 hover:to-green-600 hover:text-white font-medium rounded-full transition-all duration-300 hover:shadow-md hover:scale-105 transform">
                        Ekstrakurikuler
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
                    <a href="{{ route('login') }}" class="px-6 py-2.5 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-semibold rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
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
    <section class="hero-bg text-white py-24 relative">
        <div class="container mx-auto px-6 text-center relative z-10">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-4xl md:text-5xl font-bold mb-4 text-white">
                    Sistem Manajemen Ekstrakurikuler
                </h2>
                <p class="text-xl mb-2 font-medium text-gray-200">SMKN 13 Bandung</p>
                <p class="text-lg mb-8 text-gray-300 max-w-2xl mx-auto">Platform terpadu untuk mempermudah pendaftaran, pengelolaan absensi, dan penyampaian informasi kegiatan ekstrakurikuler sekolah.</p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="{{ route('login') }}" class="bg-green-600 text-white px-6 py-2.5 rounded-md font-medium hover:bg-green-700 transition border border-transparent shadow-sm">
                        Masuk Sistem
                    </a>
                    <a href="#tentang" class="bg-gray-800/80 backdrop-blur-sm text-white px-6 py-2.5 rounded-md font-medium hover:bg-gray-700 transition border border-gray-600">
                        Lihat Ekstrakurikuler
                    </a>
                </div>
            </div>
        </div>
    </section>

    

    <!-- Berita Ekstrakurikuler Section -->
    <section id="berita" class="py-16 bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-800">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h3 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Berita Ekstrakurikuler</h3>
                <p class="text-gray-600 dark:text-gray-400">Informasi terbaru seputar kegiatan ekstrakurikuler</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 max-w-7xl mx-auto">
                @forelse($newsItems->take(4) as $news)
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                        <div class="relative h-48 overflow-hidden bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                            <svg class="w-12 h-12 text-gray-300 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                        </div>
                        <div class="p-5">
                            <h4 class="text-gray-900 dark:text-white font-semibold text-base mb-2 line-clamp-2">{{ $news->title }}</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-4 line-clamp-3">{{ \Illuminate\Support\Str::limit(strip_tags($news->content), 100) }}</p>
                            
                            <div class="flex justify-between items-center text-xs text-gray-500 dark:text-gray-400 mt-auto">
                                <span>{{ $news->created_at->format('d M Y') }}</span>
                                <a href="#" class="text-green-600 dark:text-green-400 hover:underline">Baca &rarr;</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-10">
                        <p class="text-gray-500 dark:text-gray-400 font-medium">Belum ada berita eskul tersedia saat ini.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Pengumuman Section -->
    <section id="pengumuman" class="py-16 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-6">
            <div class="flex items-center justify-between mb-10">
                <div class="flex flex-col">
                    <h3 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white">Pengumuman</h3>
                    <p class="text-gray-600 dark:text-gray-400 mt-1">Informasi penting dari pihak sekolah</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-7xl mx-auto">
                @forelse($announcements as $announcement)
                    <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6 shadow-sm">
                        <div class="flex items-center justify-between mb-4">
                            <span class="px-2.5 py-1 rounded-full text-xs font-medium bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400">Pengumuman</span>
                            <span class="text-xs text-gray-500 dark:text-gray-400">{{ $announcement->created_at->translatedFormat('d F Y') }}</span>
                        </div>
                        <h4 class="text-gray-900 dark:text-white font-semibold text-lg mb-2">{{ $announcement->title }}</h4>
                        <p class="text-gray-600 dark:text-gray-400 text-sm line-clamp-3">{{ strip_tags($announcement->content) }}</p>
                    </div>
                @empty
                    <div class="col-span-full text-center py-10">
                        <p class="text-gray-500 dark:text-gray-400 font-medium">Belum ada pengumuman saat ini.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Ekstrakurikuler Section -->
    <section id="tentang" class="py-16 bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-800">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h3 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Ekstrakurikuler Kami</h3>
                <p class="text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">Pilihan kegiatan untuk mengembangkan minat dan bakat siswa</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 max-w-7xl mx-auto">
                @forelse($eskuls as $eskul)
                    <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 shadow-sm overflow-hidden flex flex-col">
                        <div class="h-48 bg-gray-100 dark:bg-gray-700 relative">
                            @if($eskul->foto_eskul)
                                <img src="{{ asset('images/eskul/' . $eskul->foto_eskul) }}" alt="{{ $eskul->nama_eskul }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <svg class="w-12 h-12 text-gray-300 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                                </div>
                            @endif
                            <div class="absolute top-2 right-2">
                                <span class="px-2.5 py-1 bg-white/90 dark:bg-gray-900/90 text-xs font-medium text-gray-700 dark:text-gray-300 rounded shadow-sm">
                                    {{ ucfirst($eskul->kategori) }}
                                </span>
                            </div>
                        </div>
                        <div class="p-5 flex-1 flex flex-col">
                            <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">{{ $eskul->nama_eskul }}</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-4 line-clamp-2">{{ $eskul->deskripsi ?? 'Tidak ada deskripsi.' }}</p>
                            
                            <div class="mt-auto space-y-2 text-sm text-gray-600 dark:text-gray-400">
                                <div class="flex justify-between border-t border-gray-100 dark:border-gray-700 pt-3">
                                    <span>Jadwal:</span>
                                    <span class="font-medium text-gray-900 dark:text-white">{{ $eskul->jadwal }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Pembina:</span>
                                    <span class="font-medium text-gray-900 dark:text-white truncate max-w-[120px]">{{ $eskul->pembina->nama_lengkap ?? '-' }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Kuota:</span>
                                    <span class="font-medium text-gray-900 dark:text-white">{{ $eskul->kuota }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-10">
                        <p class="text-gray-500 dark:text-gray-400 font-medium">Belum ada ekstrakurikuler tersedia.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="kontak" class="bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-800 text-gray-600 dark:text-gray-400 py-12 transition-colors duration-200">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-10">
                <!-- Brand Section -->
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="h-10 w-10 flex items-center justify-center">
                            <img src="{{ asset('images/logo13.png') }}" alt="Logo Kultilas" class="h-full w-full object-contain">
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-900 dark:text-white">Kultilas</h4>
                            <p class="text-xs text-gray-500 dark:text-gray-400">SMKN 13 Bandung</p>
                        </div>
                    </div>
                    <p class="text-xs text-gray-500 dark:text-gray-400 leading-relaxed">Platform terpadu untuk mengelola kegiatan ekstrakurikuler sekolah secara efisien dan terstruktur.</p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-sm font-semibold text-gray-900 dark:text-white mb-4">Quick Links</h4>
                    <ul class="space-y-2.5 text-xs">
                        <li><a href="{{ route('login') }}" class="hover:text-gray-900 dark:hover:text-white transition">Login</a></li>
                        <li><a href="#berita" class="hover:text-gray-900 dark:hover:text-white transition">Berita</a></li>
                        <li><a href="#tentang" class="hover:text-gray-900 dark:hover:text-white transition">Ekstrakurikuler</a></li>
                    </ul>
                </div>

                <!-- Support -->
                <div>
                    <h4 class="text-sm font-semibold text-gray-900 dark:text-white mb-4">Support</h4>
                    <ul class="space-y-2.5 text-xs">
                        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white transition">FAQ</a></li>
                        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white transition">Dokumentasi</a></li>
                        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white transition">Status</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="text-sm font-semibold text-gray-900 dark:text-white mb-4">Kontak</h4>
                    <ul class="space-y-2.5 text-xs">
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <span>info@kultilas.sch.id</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 00.948.684l1.498 7.484a1 1 0 00.502.756l2.048 1.029a11.042 11.042 0 005.516 5.516l1.029 2.048a1 1 0 00.756.502l7.484 1.498a1 1 0 00.684.948V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            <span>(021) 1234-5678</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span>Jl. Pendidikan No. 123, Bandung</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Divider -->
            <div class="border-t border-gray-200 dark:border-gray-800 my-6"></div>

            <!-- Bottom Footer -->
            <div class="flex flex-col md:flex-row justify-between items-center text-xs text-gray-500 dark:text-gray-400">
                <p>&copy; 2025 <span class="font-medium text-gray-700 dark:text-gray-300">Kultilas</span>. All rights reserved.</p>
                <div class="flex gap-6 mt-4 md:mt-0">
                    <a href="#" class="hover:text-gray-900 dark:hover:text-white transition">Privacy Policy</a>
                    <a href="#" class="hover:text-gray-900 dark:hover:text-white transition">Terms of Service</a>
                    <a href="#" class="hover:text-gray-900 dark:hover:text-white transition">Help Center</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts simplified -->
    <script>
        // Smooth Scroll for anchored links
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
    </script>
</body>
</html>
