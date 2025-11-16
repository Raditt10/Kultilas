@extends('layouts.admin')

@section('content')
<div class="bg-gray-50 dark:bg-gray-900 py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                        <i class="fas fa-edit text-green-600 mr-3"></i>Edit Presensi
                    </h1>
                    <p class="mt-2 text-gray-600 dark:text-gray-300">Edit data presensi siswa ekstrakurikuler</p>
                </div>
                <a href="{{ route('admin.presensi.index') }}" 
                   class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-700 dark:hover:bg-gray-600 text-white font-medium rounded-lg transition-colors duration-200">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>
            </div>
        </div>

        <!-- Form Card -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
            <div class="p-8">
                    <form method="POST" action="{{ route('admin.presensi.update', $presensi->id_presensi) }}">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Siswa -->
                            <div>
                                <label for="id_siswa" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                    <i class="fas fa-user text-green-600 mr-2"></i>Siswa
                                </label>
                                <select name="id_siswa" id="id_siswa" required
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors duration-200">
                                <option value="">Pilih Siswa...</option>
                                @foreach(\App\Models\Siswa::all() as $siswa)
                                    <option value="{{ $siswa->id_siswa }}" {{ old('id_siswa', $presensi->id_siswa) == $siswa->id_siswa ? 'selected' : '' }}>
                                        {{ $siswa->nama_siswa }} ({{ $siswa->nis }})
                                    </option>
                                @endforeach
                            </select>
                            @error('id_siswa')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                            <!-- Ekstrakurikuler -->
                            <div>
                                <label for="id_eskul" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                    <i class="fas fa-users text-green-600 mr-2"></i>Ekstrakurikuler
                                </label>
                                <select name="id_eskul" id="id_eskul" required
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors duration-200">
                                <option value="">Pilih Eskul...</option>
                                @foreach(\App\Models\Eskul::all() as $eskul)
                                    <option value="{{ $eskul->id_eskul }}" {{ old('id_eskul', $presensi->id_eskul) == $eskul->id_eskul ? 'selected' : '' }}>
                                        {{ $eskul->nama_eskul }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_eskul')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                            <!-- Tanggal -->
                            <div>
                                <label for="tanggal" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                    <i class="fas fa-calendar text-green-600 mr-2"></i>Tanggal
                                </label>
                                <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', $presensi->tanggal) }}" required
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors duration-200">
                            @error('tanggal')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                            <!-- Status Hadir -->
                            <div>
                                <label for="status_hadir" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                    <i class="fas fa-check-circle text-green-600 mr-2"></i>Status Hadir
                                </label>
                                <select name="status_hadir" id="status_hadir" required
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors duration-200">
                                <option value="">Pilih Status...</option>
                                <option value="hadir" {{ old('status_hadir', $presensi->status_hadir) == 'hadir' ? 'selected' : '' }}>Hadir</option>
                                <option value="izin" {{ old('status_hadir', $presensi->status_hadir) == 'izin' ? 'selected' : '' }}>Izin</option>
                                <option value="sakit" {{ old('status_hadir', $presensi->status_hadir) == 'sakit' ? 'selected' : '' }}>Sakit</option>
                                <option value="alpa" {{ old('status_hadir', $presensi->status_hadir) == 'alpa' ? 'selected' : '' }}>Alpa</option>
                            </select>
                            @error('status_hadir')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                            <!-- Status Verifikasi -->
                            <div>
                                <label for="status" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                    <i class="fas fa-shield-alt text-green-600 mr-2"></i>Status Verifikasi
                                </label>
                                <select name="status" id="status"
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors duration-200">
                                    <option value="tunda" {{ old('status', $presensi->status) == 'tunda' ? 'selected' : '' }}>Tertunda</option>
                                    <option value="diterima" {{ old('status', $presensi->status) == 'diterima' ? 'selected' : '' }}>Diterima</option>
                                    <option value="ditolak" {{ old('status', $presensi->status) == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                </select>
                                @error('status')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Catatan -->
                            <div>
                                <label for="catatan" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                    <i class="fas fa-sticky-note text-green-600 mr-2"></i>Catatan
                                </label>
                                <textarea name="catatan" id="catatan" rows="3" placeholder="Tambahkan catatan (opsional)"
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors duration-200 resize-none">{{ old('catatan', $presensi->catatan) }}</textarea>
                            @error('catatan')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center justify-between gap-4 mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                            <a href="{{ route('admin.presensi.index') }}" 
                               class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-200">
                                Batal
                            </a>
                            <button type="submit" 
                                class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors duration-200 flex items-center">
                                <i class="fas fa-save mr-2"></i>
                                Update Presensi
                            </button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
