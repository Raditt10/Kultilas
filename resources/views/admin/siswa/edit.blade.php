@extends('layouts.admin')

@section('title', 'Edit Siswa - Admin Panel')
@section('page-title', 'Edit Data Siswa')

@section('content')
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-green-700 to-green-900 dark:from-gray-800 dark:to-gray-900 rounded-xl shadow-lg p-6 mb-8">
        <div class="flex items-center">
            <a href="{{ route('admin.siswa.index') }}" 
               class="bg-white/20 hover:bg-white/30 p-3 rounded-lg mr-4 transition-all shadow-lg">
                <i class="fas fa-arrow-left text-white text-lg"></i>
            </a>
            <div class="bg-white/20 p-3 rounded-lg mr-4">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
            </div>
            <div>
                <h2 class="font-bold text-2xl text-white leading-tight"> Edit Data Siswa</h2>
                <p class="text-green-100 dark:text-gray-300 text-sm mt-1">Edit informasi siswa: {{ $siswa->nama_siswa }}</p>
            </div>
        </div>
    </div>

    <!-- Form Container -->
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-xl border border-gray-200 dark:border-gray-700">
        <div class="p-8 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('admin.siswa.update', $siswa->id_siswa) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-6">
                            <label for="nis" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">NIS</label>
                            <input type="text" name="nis" id="nis" value="{{ old('nis', $siswa->nis) }}" required
                                class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all">
                            @error('nis')
                                <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="nama_siswa" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Nama Siswa</label>
                            <input type="text" name="nama_siswa" id="nama_siswa" value="{{ old('nama_siswa', $siswa->nama_siswa) }}" required
                                class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all">
                            @error('nama_siswa')
                                <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="kelas" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Kelas</label>
                                <input type="text" name="kelas" id="kelas" value="{{ old('kelas', $siswa->kelas) }}"
                                    class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all">
                                @error('kelas')
                                    <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="jenis_kelamin" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" required
                                    class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all">
                                    <option value="">Pilih...</option>
                                    <option value="L" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="P" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="tanggal_lahir" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir', $siswa->tanggal_lahir) }}"
                                class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all">
                            @error('tanggal_lahir')
                                <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="alamat" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Alamat</label>
                            <textarea name="alamat" id="alamat" rows="4"
                                class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all resize-none">{{ old('alamat', $siswa->alamat) }}</textarea>
                            @error('alamat')
                                <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="no_telp" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">No. Telepon</label>
                                <input type="text" name="no_telp" id="no_telp" value="{{ old('no_telp', $siswa->no_telp) }}" placeholder="Contoh: 081234567890"
                                    class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all">
                                @error('no_telp')
                                    <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Email</label>
                                <input type="email" name="email" id="email" value="{{ old('email', $siswa->email) }}" placeholder="contoh@email.com"
                                    class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all">
                                @error('email')
                                    <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex items-center gap-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                            <button type="submit" class="bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white px-6 py-3 rounded-xl font-semibold transition-all transform hover:scale-105 shadow-lg flex items-center">
                                <i class="fas fa-save mr-2"></i>
                                Update Data
                            </button>
                            <a href="{{ route('admin.siswa.index') }}" class="bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 px-6 py-3 rounded-xl font-semibold transition-all flex items-center">
                                <i class="fas fa-times mr-2"></i>
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
@endsection
