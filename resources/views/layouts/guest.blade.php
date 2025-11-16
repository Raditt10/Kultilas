<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))" :class="{ 'dark': darkMode }">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                darkMode: 'class'
            }
        </script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <style>
            * {
                font-family: 'Poppins', sans-serif;
            }
            .login-bg {
                background-image: linear-gradient(rgba(21, 128, 61, 0.9), rgba(22, 101, 52, 0.9)), url('/images/smkn13.jpg');
                background-size: cover;
                background-position: center;
                background-attachment: fixed;
            }
            .dark .login-bg {
                background-image: linear-gradient(rgba(17, 24, 39, 0.95), rgba(31, 41, 55, 0.95)), url('/images/smkn13.jpg');
            }
        </style>
    </head>
    <body class="antialiased dark:bg-gray-900 transition-colors duration-200">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 login-bg">
            <div class="mb-8 text-center">
                <a href="/">
                    <div class="bg-white px-8 py-4 rounded-2xl shadow-2xl inline-block">
                        <div class="text-4xl font-bold bg-gradient-to-r from-green-700 to-green-900 bg-clip-text text-transparent">KULTILAS</div>
                        <div class="text-sm text-gray-600 mt-1">SMKN 13 Bandung</div>
                    </div>
                </a>
            </div>

            <div class="w-full sm:max-w-md px-6 py-8 bg-white/95 backdrop-blur-sm shadow-2xl overflow-hidden sm:rounded-2xl border border-white/20">
                {{ $slot }}
            </div>

            <div class="mt-6 text-center">
                <a href="/" class="text-white hover:text-green-200 text-sm font-medium">
                    ← Kembali ke Halaman Utama
                </a>
            </div>
        </div>
    </body>
</html>
