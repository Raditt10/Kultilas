@extends('siswa.layout')

@section('title', 'Dashboard')

@section('content')
<div class="text-center py-12">
    <h1 class="text-4xl font-bold text-gray-800 mb-4">Selamat Datang di Dashboard</h1>
    <p class="text-lg text-gray-600 mb-8">Sistem Informasi Ekstrakurikuler</p>
    
    <div class="flex justify-center gap-4">
        <a href="{{ route('siswa.login') }}" class="bg-blue-600 text-white px-8 py-3 rounded-lg text-lg font-medium hover:bg-blue-700">
            Login
        </a>
        <a href="{{ route('siswa.register') }}" class="bg-green-600 text-white px-8 py-3 rounded-lg text-lg font-medium hover:bg-green-700">
            Daftar
        </a>
    </div>
</div>
@endsection
