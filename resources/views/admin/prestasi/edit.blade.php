@extends('layouts.admin')

@section('content')
<div class="bg-gray-50 dark:bg-gray-900 py-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-4">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">
                <i class="fas fa-edit text-green-600 mr-2"></i>Edit Prestasi
            </h1>
            <p class="text-gray-600 dark:text-gray-300">Edit data prestasi siswa ekstrakurikuler</p>
            </div>
        </div>

        <!-- Form Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md border border-gray-200 dark:border-gray-700">
            <div class="p-4">
                    <form method="POST" action="{{ route('admin.prestasi.update', $prestasi->id_prestasi) }}">
                        @csrf
                        @method('PUT')

                        <div class="space-y-4">
                            <!-- Pendaftaran Eskul -->
                            <div>
                                <label for="id_pendaftaran" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    <i class="fas fa-user-graduate text-green-600 mr-2"></i>Pendaftaran Eskul
                                </label>
                                <select name="id_pendaftaran" id="id_pendaftaran" required
                                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-md focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors duration-200">
                                    <option value="">Pilih Pendaftaran...</option>
                                @foreach(\App\Models\PendaftaranEskul::with(['siswa', 'eskul'])->get() as $pendaftaran)
                                    <option value="{{ $pendaftaran->id_pendaftaran }}" {{ old('id_pendaftaran', $prestasi->id_pendaftaran) == $pendaftaran->id_pendaftaran ? 'selected' : '' }}>
                                        {{ $pendaftaran->siswa->nama_siswa }} - {{ $pendaftaran->eskul->nama_eskul }}
                                    </option>
                                @endforeach
                                </select>
                                @error('id_pendaftaran')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                        <!-- Nama Prestasi -->
                        <div>
                            <label for="nama_prestasi" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <i class="fas fa-award text-green-600 mr-2"></i>Nama Prestasi
                            </label>
                            <input type="text" name="nama_prestasi" id="nama_prestasi" value="{{ old('nama_prestasi', $prestasi->nama_prestasi) }}" required placeholder="Contoh: Juara 1 Lomba Debat"
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 rounded-md focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors duration-200">
                            @error('nama_prestasi')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                            <!-- Tingkat -->
                        <div>
                            <label for="tingkat" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <i class="fas fa-level-up-alt text-green-600 mr-2"></i>Tingkat
                            </label>
                            <select name="tingkat" id="tingkat" required
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-md focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors duration-200">
                                <option value="">Pilih Tingkat...</option>
                                <option value="sekolah" {{ old('tingkat', $prestasi->tingkat) == 'sekolah' ? 'selected' : '' }}>Sekolah</option>
                                <option value="kecamatan" {{ old('tingkat', $prestasi->tingkat) == 'kecamatan' ? 'selected' : '' }}>Kecamatan</option>
                                <option value="kabupaten" {{ old('tingkat', $prestasi->tingkat) == 'kabupaten' ? 'selected' : '' }}>Kabupaten</option>
                                <option value="provinsi" {{ old('tingkat', $prestasi->tingkat) == 'provinsi' ? 'selected' : '' }}>Provinsi</option>
                                <option value="nasional" {{ old('tingkat', $prestasi->tingkat) == 'nasional' ? 'selected' : '' }}>Nasional</option>
                                <option value="internasional" {{ old('tingkat', $prestasi->tingkat) == 'internasional' ? 'selected' : '' }}>Internasional</option>
                            </select>
                            @error('tingkat')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tanggal -->
                            <div>
                                <label for="tanggal" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    <i class="fas fa-calendar text-green-600 mr-2"></i>Tanggal Prestasi
                                </label>
                                <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', $prestasi->tanggal) }}" required
                                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-md focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors duration-200">
                                @error('tanggal')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                        <!-- Deskripsi -->
                        <div>
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <i class="fas fa-file-text text-green-600 mr-2"></i>Deskripsi
                            </label>
                            <textarea name="deskripsi" id="deskripsi" rows="4" placeholder="Deskripsi prestasi (opsional)"
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 rounded-md focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors duration-200 resize-none">{{ old('deskripsi', $prestasi->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center justify-between gap-3 mt-4 pt-3 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('admin.prestasi.index') }}" 
                           class="px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 rounded-md hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-200 text-sm">
                            Batal
                        </a>
                        <button type="submit" 
                            class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-md transition-colors duration-200 flex items-center text-sm">
                            <i class="fas fa-save mr-2"></i>
                            Update Prestasi
                        </button>
                    </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
