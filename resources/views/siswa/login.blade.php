<!DOCTYPE html>
<html lang="id" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))" :class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Siswa</title>
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
            animation: backgroundShift 20s ease-in-out infinite;
        }
    
    @keyframes backgroundShift {
        0%, 100% { filter: blur(4px) brightness(0.95); }
        50% { filter: blur(4px) brightness(0.98); }
    }
    
    .full-bg::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 0% 0%, rgba(16, 185, 129, 0.15) 0%, transparent 50%),
            radial-gradient(circle at 100% 100%, rgba(59, 130, 246, 0.15) 0%, transparent 50%),
            radial-gradient(circle at 50% 50%, rgba(30, 41, 59, 0.1) 0%, transparent 100%);
        pointer-events: none;
    }
    
    .full-bg::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: 
            radial-gradient(circle at 20% 50%, rgba(16, 185, 129, 0.15) 0%, transparent 50%),
            radial-gradient(circle at 80% 80%, rgba(59, 130, 246, 0.15) 0%, transparent 50%);
        animation: pulse 4s ease-in-out infinite;
        pointer-events: none;
    }
    
    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.8; }
    }
    
    .glass-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }
    
    .dark .glass-card {
        background: rgba(30, 41, 59, 0.9);
        border: 1px solid rgba(255, 255, 255, 0.1);
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
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
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
        background: white;
        transition: all 0.3s ease;
        margin-right: 8px;
    }
    
    .dark .custom-checkbox .checkbox-box {
        background: #374151;
        border-color: #4b5563;
    }
    
    .custom-checkbox input[type="checkbox"]:checked + .checkbox-box {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        border-color: #059669;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
    }
    
    .custom-checkbox .checkbox-icon {
        width: 14px;
        height: 14px;
        display: none;
        color: white;
    }
    
    .custom-checkbox input[type="checkbox"]:checked + .checkbox-box .checkbox-icon {
        display: block;
        animation: checkmark 0.3s ease;
    }
    
    @keyframes checkmark {
        0% {
            opacity: 0;
            transform: scale(0.5);
        }
        100% {
            opacity: 1;
            transform: scale(1);
        }
    }
    
    .custom-checkbox input[type="checkbox"]:focus + .checkbox-box {
        outline: 2px solid #10b981;
        outline-offset: 2px;
    }
    
    .custom-checkbox .checkbox-label {
        color: #4b5563;
        font-weight: 500;
        font-size: 0.875rem;
        transition: color 0.2s ease;
    }
    
    .dark .custom-checkbox .checkbox-label {
        color: #d1d5db;
    }
    
    .custom-checkbox input[type="checkbox"]:checked ~ .checkbox-label {
        color: #047857;
    }
</style>
</head>
<body>
<div class="full-bg"></div>

<!-- Header Navigation -->
<header class="fixed top-0 left-0 right-0 z-50 fade-in">
    <div class="glass-card mx-4 mt-4 rounded-2xl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo & School Name -->
                <div class="flex items-center space-x-3">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center">
                            <img src="{{ asset('images/logo13.png') }}" alt="Logo SMKN 13" class="h-8 w-8 object-contain">
                        </div>
                    </div>
                    <div class="hidden sm:block">
                        <h1 class="text-lg font-bold text-gray-900 dark:text-white">SMKN 13</h1>
                        <p class="text-xs text-gray-600 dark:text-gray-300">Sistem Informasi Akademik</p>
                    </div>
                </div>
                
                <!-- Navigation Links -->
                <nav class="hidden md:flex items-center space-x-1">
                    <a href="{{ route('home') }}" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-green-600 dark:hover:text-green-400 hover:bg-green-50 dark:hover:bg-green-900/20 rounded-lg transition-all duration-200">
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            Beranda
                        </span>
                    </a>
                    <a href="{{ route('siswa.login') }}" class="px-4 py-2 text-sm font-medium text-green-600 dark:text-green-400 bg-green-50 dark:bg-green-900/20 rounded-lg">
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                            </svg>
                            Login
                        </span>
                    </a>
                    <a href="{{ route('siswa.register') }}" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-green-600 dark:hover:text-green-400 hover:bg-green-50 dark:hover:bg-green-900/20 rounded-lg transition-all duration-200">
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                            Daftar
                        </span>
                    </a>
                </nav>
                
                <!-- Right Side Actions -->
                <div class="flex items-center space-x-2">
                    <!-- Dark Mode Toggle -->
                    <button type="button" id="theme-toggle" class="p-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-green-50 dark:hover:bg-green-900/20 transition-colors">
                        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    
                    <!-- Mobile Menu Button -->
                    <div class="md:hidden">
                        <button type="button" id="mobile-menu-button" class="p-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-green-50 dark:hover:bg-green-900/20 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden border-t border-gray-200 dark:border-gray-700">
            <div class="px-4 py-3 space-y-1">
                <a href="{{ route('home') }}" class="block px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-green-600 dark:hover:text-green-400 hover:bg-green-50 dark:hover:bg-green-900/20 rounded-lg transition-all duration-200">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        Beranda
                    </span>
                </a>
                <a href="{{ route('siswa.login') }}" class="block px-4 py-2 text-sm font-medium text-green-600 dark:text-green-400 bg-green-50 dark:bg-green-900/20 rounded-lg">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                        Login Siswa
                    </span>
                </a>
                <a href="{{ route('login') }}" class="block px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-green-600 dark:hover:text-green-400 hover:bg-green-50 dark:hover:bg-green-900/20 rounded-lg transition-all duration-200">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                        Login Admin
                    </span>
                </a>
                <a href="{{ route('siswa.register') }}" class="block px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-green-600 dark:hover:text-green-400 hover:bg-green-50 dark:hover:bg-green-900/20 rounded-lg transition-all duration-200">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                        Daftar
                    </span>
                </a>
            </div>
        </div>
    </div>
</header>

<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 pt-28">
    <div class="max-w-md w-full fade-in">
        <!-- Logo Badge -->
        <div class="text-center mb-8 floating">
             <div class="inline-flex items-center justify-center w-20 h-20 logo-badge rounded-2xl mb-4">
                <img src="{{ asset('images/logo13.png') }}" alt="SMKN 13 Logo" class="w-full h-full object-contain">
            </div>
        </div>
        
        <!-- Login Card -->
        <div class="glass-card rounded-3xl p-8 md:p-10">
            <!-- Header -->
            <div class="text-center mb-8">
                <h2 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-green-600 via-emerald-600 to-teal-600 bg-clip-text text-transparent mb-3">
                    Login Siswa
                </h2>
                <p class="text-gray-600 dark:text-gray-300 text-sm md:text-base">
                    Silakan masuk dengan NIS Anda untuk melanjutkan
                </p>
            </div>
            
            <!-- Error Alert -->
            @if($errors->any())
                <div class="mb-6 alert-error">
                    <div class="bg-red-50 dark:bg-red-900/30 border-l-4 border-red-500 text-red-700 dark:text-red-300 px-4 py-3 rounded-lg flex items-start">
                        <svg class="w-5 h-5 mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-sm">{{ $errors->first() }}</span>
                    </div>
                </div>
            @endif
            
            @if(session('error'))
                <div class="mb-6 alert-error">
                    <div class="bg-red-50 dark:bg-red-900/30 border-l-4 border-red-500 text-red-700 dark:text-red-300 px-4 py-3 rounded-lg flex items-start">
                        <svg class="w-5 h-5 mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-sm">{{ session('error') }}</span>
                    </div>
                </div>
            @endif
            
            <!-- Session Status -->
            @if(session('status'))
                <div class="mb-6 alert-error">
                    <div class="bg-green-50 dark:bg-green-900/30 border-l-4 border-green-500 text-green-700 dark:text-green-300 px-4 py-3 rounded-lg flex items-start">
                        <svg class="w-5 h-5 mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-sm">{{ session('status') }}</span>
                    </div>
                </div>
            @endif
            
            <!-- Login Form -->
            <form method="POST" action="{{ route('siswa.authenticate') }}" class="space-y-6">
                @csrf
                
                <div class="input-group">
                    <label for="nis" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">
                        NIS (Nomor Induk Siswa)
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path>
                            </svg>
                        </div>
                        <input 
                            type="text" 
                            name="nis" 
                            id="nis" 
                            value="{{ old('nis') }}" 
                            required
                            autofocus
                            autocomplete="nis"
                            class="input-field pl-12 w-full px-4 py-3.5 border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-xl focus:ring-0 focus:border-green-500 transition-all duration-300"
                            placeholder="Contoh: 2024001">
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
                    class="btn-primary w-full text-white py-4 rounded-xl font-semibold text-base shadow-lg relative z-10">
                    <span class="relative z-10 flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                        Masuk ke Portal
                    </span>
                </button>
            </form>
            
            <!-- Divider -->
            <div class="relative my-8">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-200 dark:border-gray-700"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-4 bg-white dark:bg-gray-800 text-gray-500 dark:text-gray-400">
                        Belum punya akun?
                    </span>
                </div>
            </div>
            
            <!-- Register Link -->
            <div class="text-center">
                <a 
                    href="{{ route('siswa.register') }}" 
                    class="inline-flex items-center justify-center w-full px-6 py-3.5 border-2 border-green-600 text-green-600 dark:text-green-400 rounded-xl font-semibold hover:bg-green-50 dark:hover:bg-green-900/20 transition-all duration-300 transform hover:scale-[1.02]">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                    Daftar Akun Baru
                </a>
            </div>
            
            <!-- Back Link -->
            <div class="mt-6 text-center">
                <a 
                    href="{{ route('home') }}" 
                    class="inline-flex items-center text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 text-sm font-medium transition-colors duration-300">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke Beranda
                </a>
            </div>
        </div>
        
        <!-- Footer Info -->
        <div class="mt-8 text-center">
            <p class="footer-text text-sm">
                © 2024 SMKN 13. Semua hak dilindungi.
            </p>
        </div>
    </div>
</div>

<script>
    // Dark mode toggle
    const themeToggleBtn = document.getElementById('theme-toggle');
    const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
    const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

    // Check for saved theme preference or default to light mode
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
        themeToggleLightIcon.classList.remove('hidden');
    } else {
        document.documentElement.classList.remove('dark');
        themeToggleDarkIcon.classList.remove('hidden');
    }

    themeToggleBtn.addEventListener('click', function() {
        // Toggle icons
        themeToggleDarkIcon.classList.toggle('hidden');
        themeToggleLightIcon.classList.toggle('hidden');

        // Toggle dark mode
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        }
    });
    
    // Mobile menu toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
            
            // Animate icon
            const icon = this.querySelector('svg');
            if (mobileMenu.classList.contains('hidden')) {
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>';
            } else {
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>';
            }
        });
    }
    
    // Auto-hide error message after 5 seconds
    setTimeout(function() {
        const errorAlert = document.querySelector('.alert-error');
        if (errorAlert) {
            errorAlert.style.transition = 'all 0.4s ease-out';
            errorAlert.style.opacity = '0';
            errorAlert.style.transform = 'translateY(-20px)';
            setTimeout(() => errorAlert.remove(), 400);
        }
    }, 5000);
    
    // Add focus animation to input
    const nisField = document.getElementById('nis');
    if (nisField) {
        nisField.addEventListener('focus', function() {
            this.parentElement.parentElement.style.transform = 'translateY(-2px)';
        });
        
        nisField.addEventListener('blur', function() {
            this.parentElement.parentElement.style.transform = 'translateY(0)';
        });
    }
    
    // Header scroll effect
    let lastScroll = 0;
    const header = document.querySelector('header');
    
    window.addEventListener('scroll', function() {
        const currentScroll = window.pageYOffset;
        
        if (currentScroll <= 0) {
            header.style.transform = 'translateY(0)';
            return;
        }
        
        if (currentScroll > lastScroll && currentScroll > 100) {
            // Scroll down - hide header
            header.style.transform = 'translateY(-100%)';
        } else {
            // Scroll up - show header
            header.style.transform = 'translateY(0)';
        }
        
        lastScroll = currentScroll;
    });
</script>
</body>
</html>