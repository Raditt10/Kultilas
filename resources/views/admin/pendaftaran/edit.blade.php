@extends('layouts.admin')

@section('title', 'Edit Status Pendaftaran - Admin Panel')
@section('page-title', 'Edit Status Pendaftaran')

@section('content')
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-green-700 to-green-900 dark:from-gray-800 dark:to-gray-900 rounded-xl shadow-lg p-6 mb-8">
        <div class="flex items-center">
            <a href="{{ route('admin.pendaftaran.index') }}" 
               class="bg-white/20 hover:bg-white/30 p-3 rounded-lg mr-4 transition-all shadow-lg">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <div class="bg-white/20 p-3 rounded-lg mr-4">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
            </div>
            <div>
                <h2 class="font-bold text-2xl text-white leading-tight">Edit Status Pendaftaran</h2>
                <p class="text-green-100 dark:text-gray-300 text-sm mt-1">Ubah status pendaftaran ekstrakurikuler siswa</p>
            </div>
        </div>
    </div>

    <!-- Form Container -->
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-xl border border-gray-200 dark:border-gray-700">
        <div class="p-8 text-gray-900 dark:text-gray-100">
                <form method="POST" action="{{ route('admin.pendaftaran.update', $pendaftaran->id_pendaftaran) }}">
                    @csrf
                    @method('PUT')

                    <!-- Data Siswa -->
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Siswa</label>
                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-xl border border-gray-200 dark:border-gray-600">
                            <div class="flex items-center">
                                <div class="bg-gradient-to-br from-green-400 to-green-600 p-3 rounded-full mr-4">
                                    <span class="text-sm font-bold text-white">{{ substr($pendaftaran->siswa->nama_siswa, 0, 1) }}</span>
                                </div>
                                <div>
                                    <p class="text-lg font-semibold text-gray-900 dark:text-white">{{ $pendaftaran->siswa->nama_siswa }}</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">NIS: {{ $pendaftaran->siswa->nis }} • Kelas {{ $pendaftaran->siswa->kelas }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Data Ekstrakurikuler -->
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Ekstrakurikuler</label>
                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-xl border border-gray-200 dark:border-gray-600">
                            <div class="flex items-center">
                                <div class="bg-green-100 dark:bg-green-900 p-2 rounded-full mr-3">
                                    <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-lg font-semibold text-gray-900 dark:text-white">{{ $pendaftaran->eskul->nama_eskul }}</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Pembina: {{ $pendaftaran->eskul->pembina }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tanggal Daftar -->
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Tanggal Pendaftaran</label>
                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-xl border border-gray-200 dark:border-gray-600">
                            <p class="text-lg font-medium text-gray-900 dark:text-white">{{ date('d F Y', strtotime($pendaftaran->tanggal_daftar)) }}</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">{{ date('l', strtotime($pendaftaran->tanggal_daftar)) }}</p>
                        </div>
                    </div>

                    <!-- Status Pendaftaran -->
                    <div class="mb-6">
                        <label for="status" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Status Pendaftaran</label>
                        <select name="status" id="status" required
                            class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all">
                            <option value="">Pilih status...</option>
                            <option value="pending" {{ old('status', $pendaftaran->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="diterima" {{ old('status', $pendaftaran->status) == 'diterima' ? 'selected' : '' }}>Diterima</option>
                            <option value="ditolak" {{ old('status', $pendaftaran->status) == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                        @error('status')
                            <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Keterangan -->
                    <div class="mb-6">
                        <label for="keterangan" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" rows="4" placeholder="Tambahkan keterangan atau alasan untuk keputusan ini..."
                            class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all resize-none">{{ old('keterangan', $pendaftaran->keterangan) }}</textarea>
                        @error('keterangan')
                            <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center gap-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <button type="submit" class="bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white px-6 py-3 rounded-xl font-semibold transition-all transform hover:scale-105 shadow-lg flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Update Status
                        </button>
                        <a href="{{ route('admin.pendaftaran.index') }}" class="bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 px-6 py-3 rounded-xl font-semibold transition-all flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
@endsection
