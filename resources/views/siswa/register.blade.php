<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class'
        }
        if (localStorage.getItem('darkMode') === 'true') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
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
            background: #f8fafc;
        }
        .dark body {
            background: #0f172a;
        }
        .full-bg {
            display: none;
        }
    
    @keyframes backgroundShift {
        0%, 100% { opacity: 1; }
        50% { opacity: 1; }
    }
    .glass-card {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        box-shadow: 0 20px 40px -18px rgba(0, 0, 0, 0.25);
    }
    .dark .glass-card {
        background: #1f2937;
        border: 1px solid #374151;
        box-shadow: 0 20px 40px -18px rgba(0, 0, 0, 0.45);
    }
    .input-group {
        position: relative;
        transition: all 0.3s ease;
    }
    .input-group:focus-within {
        transform: translateY(-2px);
    }
    .input-field {
        transition: all 0.3s ease;
    }
    .input-field:focus {
        box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
    }
    .btn-primary {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    .btn-primary::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }
    .btn-primary:hover::before {
        width: 300px;
        height: 300px;
    }
    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 20px 40px -10px rgba(16, 185, 129, 0.4);
    }
    .floating {
        animation: floating 3s ease-in-out infinite;
    }
    @keyframes floating {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }
    .alert-error {
        animation: slideInDown 0.4s ease-out;
    }
    @keyframes slideInDown {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .fade-in {
        animation: fadeIn 0.6s ease-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    header {
        transition: transform 0.3s ease-in-out;
    }
    .footer-text {
        color: #047857;
        font-weight: 700;
        transition: all 0.3s ease;
        text-shadow: 0 0 10px rgba(4, 120, 87, 0.5);
        animation: footerGlow 3s ease-in-out infinite;
    }
    @keyframes footerGlow {
        0%, 100% { text-shadow: 0 0 10px rgba(4, 120, 87, 0.5); }
        50% { text-shadow: 0 0 20px rgba(4, 120, 87, 0.8), 0 0 30px rgba(16, 185, 129, 0.4); }
    }
    </style>
</head>
<body>



<div class="min-h-screen py-12 px-4 sm:px-6 lg:px-10">
    <div class="w-full fade-in">
        <div class="text-left mb-8">
            <h2 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-green-600 via-emerald-600 to-teal-600 bg-clip-text text-transparent mb-3">
                Registrasi Siswa Baru
            </h2>
            <p class="text-gray-600 dark:text-gray-300 text-sm md:text-base">
                Lengkapi data di bawah untuk membuat akun siswa
            </p>
        </div>

            @if($errors->any())
                <div class="mb-6 alert-error bg-red-50 dark:bg-red-900/30 border-l-4 border-red-500 text-red-700 dark:text-red-300 px-4 py-3 rounded-lg flex items-start">
                    <svg class="w-5 h-5 mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                    <span class="text-sm">{{ $errors->first() }}</span>
                </div>
            @endif

            @if(session('status'))
                <div class="mb-6 alert-error bg-green-50 dark:bg-green-900/30 border-l-4 border-green-500 text-green-700 dark:text-green-300 px-4 py-3 rounded-lg flex items-start">
                    <svg class="w-5 h-5 mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span class="text-sm">{{ session('status') }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('siswa.register.store') }}" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="input-group">
                        <label for="nis" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">NIS <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path>
                                </svg>
                            </div>
                            <input type="text" name="nis" id="nis" value="{{ old('nis') }}" required autocomplete="nis" class="input-field pl-12 w-full px-4 py-3.5 border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-xl focus:ring-0 focus:border-green-500 transition-all duration-300" placeholder="Contoh: 2024001">
                        </div>
                        @error('nis')
                            <p class="text-red-500 text-sm mt-2 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="input-group">
                        <label for="nama_siswa" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A4 4 0 018 16h8a4 4 0 012.879 1.804M15 11a3 3 0 10-6 0 3 3 0 006 0z"></path>
                                </svg>
                            </div>
                            <input type="text" name="nama_siswa" id="nama_siswa" value="{{ old('nama_siswa') }}" required autocomplete="name" class="input-field pl-12 w-full px-4 py-3.5 border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-xl focus:ring-0 focus:border-green-500 transition-all duration-300" placeholder="Nama lengkap Anda">
                        </div>
                        @error('nama_siswa')
                            <p class="text-red-500 text-sm mt-2 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="input-group">
                        <label for="kelas" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">Kelas</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                </svg>
                            </div>
                            <input type="text" name="kelas" id="kelas" value="{{ old('kelas') }}" class="input-field pl-12 w-full px-4 py-3.5 border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-xl focus:ring-0 focus:border-green-500 transition-all duration-300" placeholder="Contoh: XI RPL 2">
                        </div>
                    </div>

                    <div class="input-group">
                        <label for="jenis_kelamin" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">Jenis Kelamin <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4a4 4 0 014 4v1a4 4 0 11-8 0V8a4 4 0 014-4z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-7 5h8"></path>
                                </svg>
                            </div>
                            <select name="jenis_kelamin" id="jenis_kelamin" required class="input-field pl-12 w-full px-4 py-3.5 border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-xl focus:ring-0 focus:border-green-500 transition-all duration-300">
                                <option value="">Pilih...</option>
                                <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        @error('jenis_kelamin')
                            <p class="text-red-500 text-sm mt-2 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="input-group">
                        <label for="tanggal_lahir" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">Tanggal Lahir</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}" class="input-field pl-12 w-full px-4 py-3.5 border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-xl focus:ring-0 focus:border-green-500 transition-all duration-300">
                        </div>
                    </div>

                    <div class="input-group">
                        <label for="no_telp" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">No. Telp</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 7.484a1 1 0 00.502.756l2.048 1.029a11.042 11.042 0 005.516 5.516l1.029 2.048a1 1 0 00.756.502l7.484 1.498a1 1 0 00.684.948V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <input type="text" name="no_telp" id="no_telp" value="{{ old('no_telp') }}" class="input-field pl-12 w-full px-4 py-3.5 border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-xl focus:ring-0 focus:border-green-500 transition-all duration-300" placeholder="08xx xxxx xxxx">
                        </div>
                    </div>

                    <div class="input-group md:col-span-2">
                        <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m-2 8H5a2 2 0 01-2-2V8a2 2 0 012-2h14a2 2 0 012 2v6a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" class="input-field pl-12 w-full px-4 py-3.5 border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-xl focus:ring-0 focus:border-green-500 transition-all duration-300" placeholder="email@domain.com">
                        </div>
                        @error('email')
                            <p class="text-red-500 text-sm mt-2 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="input-group md:col-span-2">
                        <label for="alamat" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">Alamat</label>
                        <div class="relative">
                            <div class="absolute top-3 left-0 pl-4 pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <textarea name="alamat" id="alamat" rows="3" class="input-field pl-12 w-full px-4 py-3.5 border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-xl focus:ring-0 focus:border-green-500 transition-all duration-300">{{ old('alamat') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="mt-2 flex justify-end">
                    <button type="submit" class="btn-primary inline-flex items-center gap-2 px-6 py-3 text-white rounded-lg font-semibold text-base shadow-lg relative z-10">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0-1.657-1.343-3-3-3H7a3 3 0 00-3 3v4a3 3 0 003 3h2c1.657 0 3-1.343 3-3m0 0a3 3 0 003 3h2a3 3 0 003-3v-4a3 3 0 00-3-3h-2a3 3 0 00-3 3z"></path>
                        </svg>
                        Daftarkan Akun
                    </button>
                </div>
            </form>

            <!-- Divider -->
            <div class="mt-10 flex flex-wrap items-center justify-between gap-4 text-sm">
                <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 border border-green-600 text-green-600 dark:text-green-400 rounded-lg font-semibold hover:bg-green-50 dark:hover:bg-green-900/20 transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14"></path>
                    </svg>
                    Kembali ke Halaman Login
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    const themeStorageKey = 'darkMode';

    function applyTheme(isDark) {
        document.documentElement.classList.toggle('dark', isDark);
    }

    // Read theme state
    const currentThemeIsDark = localStorage.getItem(themeStorageKey) === 'true';
    applyTheme(currentThemeIsDark);
    
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
            const icon = this.querySelector('svg');
            if (mobileMenu.classList.contains('hidden')) {
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>';
            } else {
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>';
            }
        });
    }
    
    setTimeout(function() {
        const errorAlert = document.querySelector('.alert-error');
        if (errorAlert) {
            errorAlert.style.transition = 'all 0.4s ease-out';
            errorAlert.style.opacity = '0';
            errorAlert.style.transform = 'translateY(-20px)';
            setTimeout(() => errorAlert.remove(), 400);
        }
    }, 5000);
    
    document.querySelectorAll('.input-field').forEach(field => {
        field.addEventListener('focus', function() {
            const group = this.closest('.input-group');
            if (group) group.style.transform = 'translateY(-2px)';
        });
        field.addEventListener('blur', function() {
            const group = this.closest('.input-group');
            if (group) group.style.transform = 'translateY(0)';
        });
    });
    
    let lastScroll = 0;
    const header = document.querySelector('header');
    
    window.addEventListener('scroll', function() {
        const currentScroll = window.pageYOffset;
        if (currentScroll <= 0) {
            header.style.transform = 'translateY(0)';
            return;
        }
        if (currentScroll > lastScroll && currentScroll > 100) {
            header.style.transform = 'translateY(-100%)';
        } else {
            header.style.transform = 'translateY(0)';
        }
        lastScroll = currentScroll;
    });
</script>
</body>
</html>
