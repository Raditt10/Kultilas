@extends('layouts.admin')

@section('title', 'Detail Siswa')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-green-50 to-emerald-100 dark:from-gray-900 dark:to-gray-800 py-8">
        <!-- Header -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-8">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-green-100 dark:border-gray-700 p-6">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-4 md:space-y-0">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white flex items-center">
                            <svg class="w-8 h-8 mr-3 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Detail Siswa
                        </h1>
                        <p class="text-gray-600 dark:text-gray-400 mt-2">Informasi lengkap siswa dan aktivitas ekstrakurikuler</p>
                    </div>
                    <div class="flex space-x-3">
                        <a href="{{ route('admin.siswa.edit', $siswa->id_siswa) }}" 
                           class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Edit
                        </a>
                        <a href="{{ route('admin.siswa.index') }}" 
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
                <!-- Profile Card -->
                <div class="lg:col-span-1">
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-green-100 dark:border-gray-700 p-6">
                        <div class="text-center">
                            <div class="mx-auto h-32 w-32 rounded-full bg-gradient-to-r from-green-400 to-green-600 flex items-center justify-center mb-4 overflow-hidden ring-2 ring-green-200">
                                @if($siswa->foto_profil)
                                    <img src="{{ asset('images/profile/' . $siswa->foto_profil) }}" alt="Foto {{ $siswa->nama_siswa }}" class="h-full w-full object-cover">
                                @else
                                    <span class="text-4xl font-bold text-white">
                                        {{ substr($siswa->nama_siswa, 0, 1) }}
                                    </span>
                                @endif
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $siswa->nama_siswa }}</h2>
                            <p class="text-green-600 font-semibold">NIS: {{ $siswa->nis }}</p>
                            <p class="text-gray-600 dark:text-gray-400">Kelas {{ $siswa->kelas }}</p>
                        </div>

                        <div class="mt-6 space-y-4">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span class="text-gray-700 dark:text-gray-300">
                                    {{ $siswa->jenis_kelamin === 'L' ? 'Laki-laki' : ($siswa->jenis_kelamin === 'P' ? 'Perempuan' : 'Tidak diisi') }}
                                </span>
                            </div>
                            @if($siswa->tanggal_lahir)
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span class="text-gray-700 dark:text-gray-300">{{ date('d F Y', strtotime($siswa->tanggal_lahir)) }}</span>
                            </div>
                            @endif
                            @if($siswa->email)
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8m-18 10V6a2 2 0 012-2h16a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path>
                                </svg>
                                <span class="text-gray-700 dark:text-gray-300">{{ $siswa->email }}</span>
                            </div>
                            @endif
                            @if($siswa->no_telp)
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                <span class="text-gray-700 dark:text-gray-300">{{ $siswa->no_telp }}</span>
                            </div>
                            @endif
                            @if($siswa->alamat)
                            <div class="flex items-start">
                                <svg class="w-5 h-5 mr-3 text-gray-400 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span class="text-gray-700 dark:text-gray-300">{{ $siswa->alamat }}</span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Ekstrakurikuler yang Diikuti -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-green-100 dark:border-gray-700">
                        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white flex items-center">
                                <svg class="w-6 h-6 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                                Ekstrakurikuler yang Diikuti
                            </h3>
                        </div>
                        <div class="p-6">
                            @if($siswa->pendaftaranEskul->count() > 0)
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    @foreach($siswa->pendaftaranEskul as $pendaftaran)
                                        <div class="bg-gradient-to-r from-green-50 to-emerald-50 dark:from-gray-700 dark:to-gray-600 p-4 rounded-lg border border-green-200 dark:border-gray-600">
                                            <h4 class="font-semibold text-green-700 dark:text-green-300">{{ $pendaftaran->eskul->nama_eskul }}</h4>
                                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                                Pembina: {{ $pendaftaran->eskul->pembina }}
                                            </p>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                                {{ $pendaftaran->eskul->hari_kegiatan }} • {{ $pendaftaran->eskul->jam_mulai }}-{{ $pendaftaran->eskul->jam_selesai }}
                                            </p>
                                            <span class="inline-block mt-2 px-2 py-1 text-xs rounded-full 
                                                {{ $pendaftaran->status_pendaftaran === 'diterima' ? 'bg-green-100 text-green-700' : 
                                                   ($pendaftaran->status_pendaftaran === 'ditolak' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700') }}">
                                                {{ ucfirst($pendaftaran->status_pendaftaran) }}
                                            </span>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-8">
                                    <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                    </svg>
                                    <p class="text-gray-500 dark:text-gray-400">Belum mengikuti ekstrakurikuler apapun</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Prestasi -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-green-100 dark:border-gray-700">
                        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white flex items-center">
                                <svg class="w-6 h-6 mr-2 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                                </svg>
                                Prestasi yang Diraih
                            </h3>
                        </div>
                        <div class="p-6">
                            @if($siswa->prestasi->count() > 0)
                                <div class="space-y-4">
                                    @foreach($siswa->prestasi as $prestasi)
                                        <div class="bg-gradient-to-r from-yellow-50 to-orange-50 dark:from-gray-700 dark:to-gray-600 p-4 rounded-lg border border-yellow-200 dark:border-gray-600">
                                            <div class="flex items-start justify-between">
                                                <div>
                                                    <h4 class="font-semibold text-yellow-700 dark:text-yellow-300">{{ $prestasi->nama_prestasi }}</h4>
                                                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">{{ $prestasi->deskripsi }}</p>
                                                    <p class="text-sm text-gray-500 dark:text-gray-500 mt-2">
                                                        {{ date('d F Y', strtotime($prestasi->tanggal)) }}
                                                    </p>
                                                </div>
                                                <span class="inline-block px-3 py-1 text-sm font-medium text-yellow-700 bg-yellow-100 dark:bg-yellow-200 dark:text-yellow-800 rounded-full">
                                                    {{ $prestasi->tingkat }}
                                                </span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-8">
                                    <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                                    </svg>
                                    <p class="text-gray-500 dark:text-gray-400">Belum meraih prestasi apapun</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection