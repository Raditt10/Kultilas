@extends('layouts.admin')

@section('title', 'Detail Ekstrakurikuler')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-green-50 to-emerald-100 dark:from-gray-900 dark:to-gray-800 py-8">
        <!-- Header -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-8">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-green-100 dark:border-gray-700 p-6">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-4 md:space-y-0">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white flex items-center">
                            <svg class="w-8 h-8 mr-3 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                            Detail Ekstrakurikuler
                        </h1>
                        <p class="text-gray-600 dark:text-gray-400 mt-2">Informasi lengkap ekstrakurikuler dan anggota yang terdaftar</p>
                    </div>
                    <div class="flex space-x-3">
                        <a href="{{ route('admin.eskul.edit', $eskul->id_eskul) }}" 
                           class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Edit
                        </a>
                        <a href="{{ route('admin.eskul.index') }}" 
                           class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg transition-colors flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Info Card -->
                <div class="lg:col-span-1">
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-green-100 dark:border-gray-700 p-6">
                        <div class="text-center mb-6">
                            <div class="mx-auto h-32 w-32 rounded-full bg-gradient-to-r from-green-400 to-green-600 flex items-center justify-center mb-4">
                                <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $eskul->nama_eskul }}</h2>
                            <p class="text-green-600 font-semibold">Ekstrakurikuler</p>
                        </div>

                        <div class="space-y-4">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span class="text-gray-700 dark:text-gray-300">{{ $eskul->pembina }}</span>
                            </div>
                            
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span class="text-gray-700 dark:text-gray-300">{{ $eskul->hari_kegiatan }}</span>
                            </div>
                            
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-gray-700 dark:text-gray-300">{{ $eskul->jam_mulai }} - {{ $eskul->jam_selesai }}</span>
                            </div>
                            
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span class="text-gray-700 dark:text-gray-300">{{ $eskul->lokasi }}</span>
                            </div>
                            
                            @if($eskul->kuota)
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                <span class="text-gray-700 dark:text-gray-300">
                                    {{ $eskul->pendaftaranEskul->where('status_pendaftaran', 'diterima')->count() }}/{{ $eskul->kuota }} Anggota
                                </span>
                            </div>
                            @endif
                        </div>

                        <!-- Statistics -->
                        <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="bg-green-50 dark:bg-green-900 p-3 rounded-lg text-center">
                                    <p class="text-2xl font-bold text-green-600 dark:text-green-400">
                                        {{ $eskul->pendaftaranEskul->where('status_pendaftaran', 'diterima')->count() }}
                                    </p>
                                    <p class="text-xs text-green-600 dark:text-green-400">Anggota Aktif</p>
                                </div>
                                <div class="bg-blue-50 dark:bg-blue-900 p-3 rounded-lg text-center">
                                    <p class="text-2xl font-bold text-blue-600 dark:text-blue-400">
                                        {{ $eskul->pendaftaranEskul->where('status_pendaftaran', 'pending')->count() }}
                                    </p>
                                    <p class="text-xs text-blue-600 dark:text-blue-400">Menunggu</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Deskripsi -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-green-100 dark:border-gray-700">
                        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white flex items-center">
                                <svg class="w-6 h-6 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
                                </svg>
                                Deskripsi Ekstrakurikuler
                            </h3>
                        </div>
                        <div class="p-6">
                            <p class="text-gray-700 dark:text-gray-300 leading-relaxed">{{ $eskul->deskripsi }}</p>
                        </div>
                    </div>

                    <!-- Anggota yang Terdaftar -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-green-100 dark:border-gray-700">
                        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white flex items-center">
                                <svg class="w-6 h-6 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                Anggota Terdaftar
                            </h3>
                        </div>
                        <div class="p-6">
                            @if($eskul->pendaftaranEskul->count() > 0)
                                <div class="space-y-4">
                                    @foreach($eskul->pendaftaranEskul as $pendaftaran)
                                        <div class="flex items-center justify-between p-4 bg-gradient-to-r from-gray-50 to-gray-100 dark:from-gray-700 dark:to-gray-600 rounded-lg border border-gray-200 dark:border-gray-600">
                                            <div class="flex items-center">
                                                <div class="bg-gradient-to-br from-green-400 to-green-600 p-3 rounded-full mr-4">
                                                    <span class="text-sm font-bold text-white">{{ substr($pendaftaran->siswa->nama_siswa, 0, 1) }}</span>
                                                </div>
                                                <div>
                                                    <h4 class="font-semibold text-gray-900 dark:text-white">
                                                        {{ $pendaftaran->siswa->nama_siswa }}
                                                    </h4>
                                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                                        NIS: {{ $pendaftaran->siswa->nis }} • Kelas {{ $pendaftaran->siswa->kelas }}
                                                    </p>
                                                    <p class="text-xs text-gray-500 dark:text-gray-500">
                                                        Bergabung: {{ date('d F Y', strtotime($pendaftaran->tanggal_daftar)) }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <span class="inline-block px-3 py-1 text-sm rounded-full 
                                                    {{ $pendaftaran->status_pendaftaran === 'diterima' ? 'bg-green-100 text-green-700 border border-green-200' : 
                                                       ($pendaftaran->status_pendaftaran === 'ditolak' ? 'bg-red-100 text-red-700 border border-red-200' : 'bg-yellow-100 text-yellow-700 border border-yellow-200') }}">
                                                    {{ ucfirst($pendaftaran->status_pendaftaran) }}
                                                </span>
                                                @if($pendaftaran->status_pendaftaran === 'diterima')
                                                    <p class="text-xs text-gray-500 mt-1">
                                                        <svg class="w-3 h-3 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                        </svg>
                                                        Anggota Aktif
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-8">
                                    <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    <p class="text-gray-500 dark:text-gray-400">Belum ada anggota yang terdaftar</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection