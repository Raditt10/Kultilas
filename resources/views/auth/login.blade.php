<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            background: transparent;
        }
        .full-bg {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: linear-gradient(135deg, rgba(15, 23, 42, 0.7) 0%, rgba(15, 118, 110, 0.7) 100%), url('/images/smkn13.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            filter: blur(4px) brightness(0.95);
            z-index: -1;
        }
    
        .glass-card {
            background: rgba(253, 250, 246, 0.97);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(221, 216, 207, 0.4);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }
        
        .dark .glass-card {
            background: rgba(30, 41, 59, 0.95);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .btn-primary {
            background: #059669;
        }
        .btn-primary:hover {
            background: #047857;
        }
        
        /* Custom Checkbox Styling */
        .custom-checkbox {
            position: relative;
            display: inline-flex;
            align-items: center;
            cursor: pointer;
            user-select: none;
        }
        
        .custom-checkbox input[type="checkbox"] {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }
        
        .custom-checkbox .checkbox-box {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 20px;
            height: 20px;
            border: 2px solid #d1d5db;
            border-radius: 6px;
            background: #F5F1EB;
            margin-right: 8px;
        }
        
        .dark .custom-checkbox .checkbox-box {
            background: #374151;
            border-color: #4b5563;
        }
        
        .custom-checkbox input[type="checkbox"]:checked + .checkbox-box {
            background: #059669;
            border-color: #059669;
        }
        
        .custom-checkbox .checkbox-icon {
            width: 14px;
            height: 14px;
            display: none;
            color: white;
        }
        
        .custom-checkbox input[type="checkbox"]:checked + .checkbox-box .checkbox-icon {
            display: block;
        }
        
        .custom-checkbox .checkbox-label {
            color: #4b5563;
            font-weight: 500;
            font-size: 0.875rem;
        }
        
        .dark .custom-checkbox .checkbox-label {
            color: #d1d5db;
        }
    </style>

<div class="full-bg"></div>



<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full">
        <!-- Login Card -->
        <div class="glass-card rounded-3xl p-8 md:p-10">
            <!-- Header -->
            <div class="text-center mb-8">
                <h2 class="text-3xl md:text-4xl font-bold text-emerald-700 dark:text-emerald-400 mb-3">
                    Halo!
                </h2>
                <p class="text-gray-600 dark:text-gray-300 text-sm md:text-base">
                    Silakan masuk dengan username atau NIS Anda untuk melanjutkan
                </p>
            </div>
            
            <!-- Error Alert -->
            @if($errors->any())
                <div class="mb-6">
                    <div class="bg-red-50 dark:bg-red-900/30 border-l-4 border-red-500 text-red-700 dark:text-red-300 px-4 py-3 rounded-lg flex items-start">
                        <svg class="w-5 h-5 mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-sm">{{ $errors->first() }}</span>
                    </div>
                </div>
            @endif
            
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
            
            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                
                <div class="input-group">
                    <label for="username" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">
                        Username atau NIS
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <input 
                            type="text" 
                            name="username" 
                            id="username" 
                            value="{{ old('username') }}"
                            required
                            autofocus
                            autocomplete="username"
                            class="input-field pl-12 w-full px-4 py-3.5 border-2 border-gray-200 dark:border-gray-600 bg-[#F5F1EB] dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-xl focus:ring-0 focus:border-green-500"
                            placeholder="Masukkan username atau NIS Anda">
                    </div>
                    <x-input-error :messages="$errors->get('username')" class="mt-2" />
                </div>
                
                <div class="input-group">
                    <label for="password" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">
                        Password <span class="text-xs text-gray-400 dark:text-gray-400 font-normal">(Kosongkan jika masuk sebagai Siswa)</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <input 
                            type="password" 
                            name="password" 
                            id="password" 
                            autocomplete="current-password"
                            class="input-field pl-12 w-full px-4 py-3.5 border-2 border-gray-200 dark:border-gray-600 bg-[#F5F1EB] dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-xl focus:ring-0 focus:border-green-500"
                            placeholder="Masukkan password Anda">
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label class="custom-checkbox">
                        <input type="checkbox" name="remember">
                        <div class="checkbox-box">
                            <svg class="checkbox-icon" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <span class="checkbox-label">Ingat Saya</span>
                    </label>
                </div>
                
                <button 
                    type="submit" 
                    class="btn-primary w-full text-white py-4 rounded-xl font-semibold text-base shadow-md">
                    <span class="flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                        Masuk
                    </span>
                </button>
            </form>
            
            <!-- Register Link -->
            <div class="mt-6 text-center">
                <a 
                    href="{{ route('siswa.register') }}" 
                    class="inline-flex items-center text-gray-500 dark:text-gray-400 hover:text-green-600 dark:hover:text-green-400 text-sm font-medium">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                    Belum punya akun? Daftar di sini
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
</script>
</body>
</html>
