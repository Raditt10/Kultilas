@extends('layouts.admin')

@section('title', 'Tambah Ekstrakurikuler - Admin Panel')
@section('page-title', 'Tambah Ekstrakurikuler')

@section('content')
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-green-700 to-green-900 dark:from-gray-800 dark:to-gray-900 rounded-xl shadow-lg p-6 mb-8">
        <div class="flex items-center">
            <a href="{{ route('admin.eskul.index') }}" 
               class="bg-white/20 hover:bg-white/30 p-3 rounded-lg mr-4 transition-all shadow-lg">
                <i class="fas fa-arrow-left text-white text-lg"></i>
            </a>
            <div class="bg-white/20 p-3 rounded-lg mr-4">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
            </div>
            <div>
                <h2 class="font-bold text-2xl text-white leading-tight">Tambah Ekstrakurikuler</h2>
                <p class="text-green-100 dark:text-gray-300 text-sm mt-1">Registrasi kegiatan ekstrakurikuler baru</p>
            </div>
        </div>
    </div>

    <!-- Form Container -->
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-xl border border-gray-200 dark:border-gray-700">
        <div class="p-8 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('admin.eskul.store') }}" class="space-y-6" enctype="multipart/form-data">
                        @csrf

                        <!-- Nama Eskul -->
                        <div class="space-y-2">
                            <label for="nama_eskul" class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300">
                                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                Nama Ekstrakurikuler <span class="text-red-500">*</span>
                            </label>
                            <div class="relative group">
                                <input type="text" name="nama_eskul" id="nama_eskul" value="{{ old('nama_eskul') }}" required
                                    class="w-full pl-12 pr-4 py-3 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 hover:border-green-400 group-hover:shadow-md"
                                    placeholder="Contoh: Robotika, Basket, Paduan Suara, Teater...">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-green-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                            </div>
                            @error('nama_eskul')
                                <p class="text-red-500 text-sm mt-1 flex items-center animate-pulse">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Deskripsi -->
                        <div class="space-y-2">
                            <label for="deskripsi" class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300">
                                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Deskripsi Ekstrakurikuler <span class="text-red-500">*</span>
                            </label>
                            <div class="relative group">
                                <textarea name="deskripsi" id="deskripsi" rows="4" required
                                    class="w-full pl-12 pr-4 py-3 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 hover:border-green-400 group-hover:shadow-md resize-none"
                                    placeholder="Jelaskan tentang ekstrakurikuler ini, tujuan, kegiatan, dan manfaatnya...">{{ old('deskripsi') }}</textarea>
                                <div class="absolute top-3 left-0 pl-3 flex items-start pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-green-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                            </div>
                            @error('deskripsi')
                                <p class="text-red-500 text-sm mt-1 flex items-center animate-pulse">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Pembina -->
                        <div class="space-y-2">
                            <label for="pembina" class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300">
                                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Pembina Ekstrakurikuler <span class="text-red-500">*</span>
                            </label>
                            <div class="relative group">
                                <input type="text" name="pembina" id="pembina" value="{{ old('pembina') }}" required
                                    class="w-full pl-12 pr-4 py-3 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 hover:border-green-400 group-hover:shadow-md"
                                    placeholder="Nama pembina atau guru pendamping...">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-green-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                            </div>
                            @error('pembina')
                                <p class="text-red-500 text-sm mt-1 flex items-center animate-pulse">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Hari Kegiatan -->
                        <div class="space-y-2">
                            <label for="hari_kegiatan" class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300">
                                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Hari Kegiatan <span class="text-red-500">*</span>
                            </label>
                            <div class="relative group">
                                <input type="text" name="hari_kegiatan" id="hari_kegiatan" value="{{ old('hari_kegiatan') }}" required
                                    class="w-full pl-12 pr-4 py-3 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 hover:border-green-400 group-hover:shadow-md"
                                    placeholder="Contoh: Senin, Rabu, Jumat">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-green-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            </div>
                            @error('hari_kegiatan')
                                <p class="text-red-500 text-sm mt-1 flex items-center animate-pulse">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Waktu Kegiatan -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Jam Mulai -->
                            <div class="space-y-2">
                                <label for="jam_mulai" class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300">
                                    <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Jam Mulai <span class="text-red-500">*</span>
                                </label>
                                <div class="relative group">
                                    <input type="time" name="jam_mulai" id="jam_mulai" value="{{ old('jam_mulai') }}" step="60" required
                                        class="w-full pl-12 pr-4 py-3 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 hover:border-green-400 group-hover:shadow-md">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400 group-hover:text-green-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <!-- Quick Time Selection for Jam Mulai -->
                                <div class="flex flex-wrap gap-2 mt-2">
                                    <span class="text-xs text-gray-500 dark:text-gray-400 w-full mb-1">Waktu Populer:</span>
                                    <button type="button" onclick="setTime('jam_mulai', '07:00')" class="px-2 py-1 text-xs bg-green-100 hover:bg-green-200 text-green-700 rounded transition-colors">07:00</button>
                                    <button type="button" onclick="setTime('jam_mulai', '13:00')" class="px-2 py-1 text-xs bg-green-100 hover:bg-green-200 text-green-700 rounded transition-colors">13:00</button>
                                    <button type="button" onclick="setTime('jam_mulai', '14:00')" class="px-2 py-1 text-xs bg-green-100 hover:bg-green-200 text-green-700 rounded transition-colors">14:00</button>
                                    <button type="button" onclick="setTime('jam_mulai', '15:00')" class="px-2 py-1 text-xs bg-green-100 hover:bg-green-200 text-green-700 rounded transition-colors">15:00</button>
                                    <button type="button" onclick="setTime('jam_mulai', '16:00')" class="px-2 py-1 text-xs bg-green-100 hover:bg-green-200 text-green-700 rounded transition-colors">16:00</button>
                                </div>
                                @error('jam_mulai')
                                    <p class="text-red-500 text-sm mt-1 flex items-center animate-pulse">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Jam Selesai -->
                            <div class="space-y-2">
                                <label for="jam_selesai" class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300">
                                    <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Jam Selesai <span class="text-red-500">*</span>
                                </label>
                                <div class="relative group">
                                    <input type="time" name="jam_selesai" id="jam_selesai" value="{{ old('jam_selesai') }}" step="60" required
                                        class="w-full pl-12 pr-4 py-3 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 hover:border-green-400 group-hover:shadow-md">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400 group-hover:text-green-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <!-- Quick Time Selection for Jam Selesai -->
                                <div class="flex flex-wrap gap-2 mt-2">
                                    <span class="text-xs text-gray-500 dark:text-gray-400 w-full mb-1">Waktu Populer:</span>
                                    <button type="button" onclick="setTime('jam_selesai', '09:00')" class="px-2 py-1 text-xs bg-green-100 hover:bg-green-200 text-green-700 rounded transition-colors">09:00</button>
                                    <button type="button" onclick="setTime('jam_selesai', '15:00')" class="px-2 py-1 text-xs bg-green-100 hover:bg-green-200 text-green-700 rounded transition-colors">15:00</button>
                                    <button type="button" onclick="setTime('jam_selesai', '16:00')" class="px-2 py-1 text-xs bg-green-100 hover:bg-green-200 text-green-700 rounded transition-colors">16:00</button>
                                    <button type="button" onclick="setTime('jam_selesai', '17:00')" class="px-2 py-1 text-xs bg-green-100 hover:bg-green-200 text-green-700 rounded transition-colors">17:00</button>
                                    <button type="button" onclick="setTime('jam_selesai', '18:00')" class="px-2 py-1 text-xs bg-green-100 hover:bg-green-200 text-green-700 rounded transition-colors">18:00</button>
                                </div>
                                @error('jam_selesai')
                                    <p class="text-red-500 text-sm mt-1 flex items-center animate-pulse">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <!-- Lokasi -->
                        <div class="space-y-2">
                            <label for="lokasi" class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300">
                                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                Lokasi Kegiatan <span class="text-red-500">*</span>
                            </label>
                            <div class="relative group">
                                <input type="text" name="lokasi" id="lokasi" value="{{ old('lokasi') }}" required
                                    class="w-full pl-12 pr-4 py-3 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 hover:border-green-400 group-hover:shadow-md"
                                    placeholder="Contoh: Ruang Lab, Lapangan, Aula, Kelas...">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-green-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            @error('lokasi')
                                <p class="text-red-500 text-sm mt-1 flex items-center animate-pulse">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Kuota -->
                        <div class="space-y-2">
                            <label for="kuota" class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300">
                                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                Kuota Peserta
                            </label>
                            <div class="relative group">
                                <input type="number" name="kuota" id="kuota" value="{{ old('kuota') }}" min="1" max="100"
                                    class="w-full pl-12 pr-4 py-3 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 hover:border-green-400 group-hover:shadow-md"
                                    placeholder="Masukkan jumlah maksimal peserta...">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-green-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            @error('kuota')
                                <p class="text-red-500 text-sm mt-1 flex items-center animate-pulse">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Foto Eskul -->
                        <div class="space-y-2">
                            <label for="foto_eskul" class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300">
                                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Foto Ekstrakurikuler
                            </label>
                            <div class="relative group">
                                <input type="file" name="foto_eskul" id="foto_eskul" accept="image/jpeg,image/png,image/jpg"
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 hover:border-green-400 group-hover:shadow-md file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100 dark:file:bg-green-900 dark:file:text-green-200"
                                    onchange="previewImage(event)">
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">Format: JPG, JPEG, PNG. Maksimal 2MB</p>
                            </div>
                            <div id="imagePreview" class="mt-4 hidden">
                                <img id="preview" src="" alt="Preview" class="w-full h-64 object-cover rounded-lg border-2 border-green-200 dark:border-green-700 shadow-md">
                            </div>
                            @error('foto_eskul')
                                <p class="text-red-500 text-sm mt-1 flex items-center animate-pulse">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-4 pt-8 border-t border-gray-200 dark:border-gray-700">
                            <a href="{{ route('admin.eskul.index') }}" 
                               class="w-full sm:w-auto px-6 py-3 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 rounded-lg transition-all duration-200 flex items-center justify-center group">
                                <svg class="w-5 h-5 mr-2 group-hover:-translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                                Kembali
                            </a>
                            <button type="submit" 
                                    class="w-full sm:w-auto px-8 py-3 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white rounded-lg transition-all duration-200 flex items-center justify-center shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 group">
                                <svg class="w-5 h-5 mr-2 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Simpan Ekstrakurikuler
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Enhanced Interactivity -->
    <script>
        // Quick time selection function
        function setTime(inputId, time) {
            const input = document.getElementById(inputId);
            input.value = time;
            input.dispatchEvent(new Event('change', { bubbles: true }));
            
            // Add visual feedback
            input.classList.add('ring-2', 'ring-green-400');
            setTimeout(() => {
                input.classList.remove('ring-2', 'ring-green-400');
            }, 500);
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Form validation and feedback
            const form = document.querySelector('form');
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn.innerHTML;
            
            // Real-time validation feedback
            const inputs = form.querySelectorAll('input[required], textarea[required], select[required]');
            inputs.forEach(input => {
                input.addEventListener('blur', function() {
                    validateField(this);
                });
                
                input.addEventListener('input', function() {
                    if (this.classList.contains('border-red-500')) {
                        validateField(this);
                    }
                });
            });
            
            function validateField(field) {
                const isValid = field.checkValidity();
                const errorElement = field.parentElement.parentElement.querySelector('.text-red-500');
                
                if (isValid) {
                    field.classList.remove('border-red-500', 'bg-red-50');
                    field.classList.add('border-green-500', 'bg-green-50');
                    if (errorElement) {
                        errorElement.style.display = 'none';
                    }
                } else {
                    field.classList.remove('border-green-500', 'bg-green-50');
                    field.classList.add('border-red-500', 'bg-red-50');
                }
            }
            
            // Enhanced form submission
            form.addEventListener('submit', function(e) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = `
                    <svg class="animate-spin w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="m4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Menyimpan...
                `;
                
                // Reset button if form submission fails
                setTimeout(() => {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalBtnText;
                }, 10000);
            });
            
            // Time validation
            const jamMulai = document.getElementById('jam_mulai');
            const jamSelesai = document.getElementById('jam_selesai');
            
            function validateTimeRange() {
                if (jamMulai.value && jamSelesai.value) {
                    if (jamMulai.value >= jamSelesai.value) {
                        jamSelesai.setCustomValidity('Jam selesai harus lebih besar dari jam mulai');
                        jamSelesai.classList.add('border-red-500');
                    } else {
                        jamSelesai.setCustomValidity('');
                        jamSelesai.classList.remove('border-red-500');
                    }
                }
            }
            
            // Auto-fill jam selesai when jam mulai changes
            jamMulai.addEventListener('change', function() {
                if (this.value && !jamSelesai.value) {
                    const [hours, minutes] = this.value.split(':');
                    const startTime = new Date();
                    startTime.setHours(parseInt(hours), parseInt(minutes), 0, 0);
                    
                    // Add 2 hours as default duration
                    const endTime = new Date(startTime.getTime() + (2 * 60 * 60 * 1000));
                    
                    const endHours = endTime.getHours().toString().padStart(2, '0');
                    const endMinutes = endTime.getMinutes().toString().padStart(2, '0');
                    
                    jamSelesai.value = `${endHours}:${endMinutes}`;
                }
                validateTimeRange();
            });
            
            jamSelesai.addEventListener('change', validateTimeRange);
            
            // Kuota validation
            const kuotaInput = document.getElementById('kuota');
            kuotaInput.addEventListener('input', function() {
                const value = parseInt(this.value);
                if (value < 1 || value > 100) {
                    this.setCustomValidity('Kuota harus antara 1-100 peserta');
                } else {
                    this.setCustomValidity('');
                }
            });
            
            // Interactive animations
            const formGroups = document.querySelectorAll('.space-y-2');
            formGroups.forEach(group => {
                const input = group.querySelector('input, textarea, select');
                if (input) {
                    input.addEventListener('focus', () => {
                        group.classList.add('transform', 'scale-[1.02]');
                    });
                    
                    input.addEventListener('blur', () => {
                        group.classList.remove('transform', 'scale-[1.02]');
                    });
                }
            });
        });

        // Image preview function
        function previewImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('preview');
            const previewContainer = document.getElementById('imagePreview');
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            } else {
                previewContainer.classList.add('hidden');
            }
        }
    </script>
@endsection
