@extends('layouts.admin')

@section('title', 'Edit Ekstrakurikuler - Admin Panel')
@section('page-title', 'Edit Ekstrakurikuler')

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
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
            </div>
            <div>
                <h2 class="font-bold text-2xl text-white leading-tight">✏️ Edit Ekstrakurikuler</h2>
                <p class="text-green-100 dark:text-gray-300 text-sm mt-1">Edit informasi: {{ $eskul->nama_eskul }}</p>
            </div>
        </div>
    </div>

    <!-- Form Container -->
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-xl border border-gray-200 dark:border-gray-700">
        <div class="p-8 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('admin.eskul.update', $eskul->id_eskul) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-6">
                            <label for="nama_eskul" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Nama Ekstrakurikuler</label>
                            <input type="text" name="nama_eskul" id="nama_eskul" value="{{ old('nama_eskul', $eskul->nama_eskul) }}" required
                                class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all">
                            @error('nama_eskul')
                                <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="deskripsi" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" rows="4" required
                                class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all resize-none">{{ old('deskripsi', $eskul->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="pembina" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Pembina</label>
                            <input type="text" name="pembina" id="pembina" value="{{ old('pembina', $eskul->pembina) }}" required
                                class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all">
                            @error('pembina')
                                <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="hari_kegiatan" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Hari Kegiatan</label>
                            <input type="text" name="hari_kegiatan" id="hari_kegiatan" value="{{ old('hari_kegiatan', $eskul->hari_kegiatan) }}" required placeholder="Contoh: Senin, Rabu, Jumat"
                                class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all">
                            @error('hari_kegiatan')
                                <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="jam_mulai" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Jam Mulai</label>
                                <input type="time" name="jam_mulai" id="jam_mulai" value="{{ old('jam_mulai', $eskul->jam_mulai ? substr($eskul->jam_mulai, 0, 5) : '') }}" step="60" required
                                    class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all">
                                @error('jam_mulai')
                                    <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="jam_selesai" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Jam Selesai</label>
                                <input type="time" name="jam_selesai" id="jam_selesai" value="{{ old('jam_selesai', $eskul->jam_selesai ? substr($eskul->jam_selesai, 0, 5) : '') }}" step="60" required
                                    class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all">
                                @error('jam_selesai')
                                    <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="lokasi" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Lokasi Kegiatan</label>
                            <input type="text" name="lokasi" id="lokasi" value="{{ old('lokasi', $eskul->lokasi) }}" required placeholder="Contoh: Ruang Lab, Lapangan, Aula, Kelas..."
                                class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all">
                            @error('lokasi')
                                <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="kuota" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Kuota Peserta</label>
                            <input type="number" name="kuota" id="kuota" value="{{ old('kuota', $eskul->kuota) }}" min="1" max="100" required placeholder="Masukkan jumlah maksimal peserta..."
                                class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all">
                            @error('kuota')
                                <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Foto Eskul -->
                        <div class="mb-6">
                            <label for="foto_eskul" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Foto Ekstrakurikuler</label>
                            @if($eskul->foto_eskul)
                                <div class="mb-4">
                                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Foto saat ini:</p>
                                    <img src="{{ asset('images/eskul/' . $eskul->foto_eskul) }}" alt="{{ $eskul->nama_eskul }}" class="w-full h-64 object-cover rounded-lg border-2 border-gray-200 dark:border-gray-700 shadow-md">
                                </div>
                            @endif
                            <input type="file" name="foto_eskul" id="foto_eskul" accept="image/jpeg,image/png,image/jpg"
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100 dark:file:bg-green-900 dark:file:text-green-200"
                                onchange="previewImage(event)">
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">Format: JPG, JPEG, PNG. Maksimal 2MB. Biarkan kosong jika tidak ingin mengubah foto.</p>
                            <div id="imagePreview" class="mt-4 hidden">
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Preview foto baru:</p>
                                <img id="preview" src="" alt="Preview" class="w-full h-64 object-cover rounded-lg border-2 border-green-200 dark:border-green-700 shadow-md">
                            </div>
                            @error('foto_eskul')
                                <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center gap-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                            <button type="submit" class="bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white px-6 py-3 rounded-xl font-semibold transition-all transform hover:scale-105 shadow-lg flex items-center">
                                <i class="fas fa-save mr-2"></i>
                                Update Data
                            </button>
                            <a href="{{ route('admin.eskul.index') }}" class="bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 px-6 py-3 rounded-xl font-semibold transition-all flex items-center">
                                <i class="fas fa-times mr-2"></i>
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>

    <script>
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
