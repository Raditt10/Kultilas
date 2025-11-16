@extends('siswa.layout')

@section('title', 'Login Siswa')

@section('content')
<style>
    .full-bg {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: linear-gradient(rgba(34, 197, 94, 0.9), rgba(22, 163, 74, 0.9)), url('/images/smkn13.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        z-index: -1;
    }
</style>

<div class="full-bg"></div>

<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full">
        <div class="bg-white/95 dark:bg-gray-800/95 backdrop-blur-sm rounded-2xl shadow-2xl p-8 border border-white/20 dark:border-gray-700/50">
            <div class="text-center mb-8">
                <div class="bg-gradient-to-r from-green-600 to-emerald-600 bg-clip-text text-transparent">
                    <h2 class="text-3xl font-bold">Portal Siswa</h2>
                </div>
                <p class="text-gray-600 dark:text-gray-300 mt-2">Login dengan NIS Anda</p>
            </div>
            
            @if(session('error'))
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('siswa.authenticate') }}">
                @csrf
                
                <div class="mb-6">
                    <label for="nis" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">NIS (Nomor Induk Siswa)</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path>
                            </svg>
                        </div>
                        <input type="text" name="nis" id="nis" value="{{ old('nis') }}" required
                            class="pl-10 w-full px-4 py-3 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition"
                            placeholder="Masukkan NIS Anda">
                    </div>
                    @error('nis')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-green-600 to-emerald-600 text-white py-3 rounded-lg font-semibold hover:from-green-700 hover:to-emerald-700 transition shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    Login Sekarang
                </button>
            </form>

            <div class="mt-6 text-center">
                <p class="text-gray-600 dark:text-gray-300 text-sm">Belum punya akun? 
                    <a href="{{ route('siswa.register') }}" class="text-green-600 hover:text-green-700 font-semibold hover:underline">Daftar di sini</a>
                </p>
            </div>

            <div class="mt-4 text-center">
                <a href="{{ route('siswa.index') }}" class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 text-sm font-medium">
                    ← Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
