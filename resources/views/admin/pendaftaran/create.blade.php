@extends('layouts.admin')

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-gray-900 p-6">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Tambah Pendaftaran Ekstrakurikuler</h1>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Tambah data pendaftaran ekstrakurikuler baru</p>
                    </div>
                    <a href="{{ route('admin.pendaftaran.index') }}" 
                       class="bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Kembali
                    </a>
                </div>
            </div>

            <div class="p-6">
                @if ($errors->any())
                    <div class="mb-6 bg-red-50 dark:bg-red-900 border border-red-200 dark:border-red-700 rounded-lg p-4">
                        <div class="flex">
                            <svg class="w-5 h-5 text-red-400 dark:text-red-300 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                            <div>
                                <h3 class="text-sm font-medium text-red-800 dark:text-red-200">Terdapat kesalahan pada form:</h3>
                                <ul class="mt-1 text-sm text-red-700 dark:text-red-300 list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <form action="{{ route('admin.pendaftaran.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Pilih Siswa -->
                        <div class="md:col-span-2">
                            <label for="id_siswa" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Pilih Siswa <span class="text-red-500">*</span>
                            </label>
                            <select name="id_siswa" id="id_siswa" required
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors duration-200 @error('id_siswa') border-red-300 dark:border-red-500 @enderror">
                                <option value="">-- Pilih Siswa --</option>
                                @foreach($siswa as $s)
                                    <option value="{{ $s->id_siswa }}" {{ old('id_siswa') == $s->id_siswa ? 'selected' : '' }}>
                                        {{ $s->nama_siswa }} - {{ $s->kelas }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_siswa')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Pilih Ekstrakurikuler -->
                        <div class="md:col-span-2">
                            <label for="id_eskul" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Pilih Ekstrakurikuler <span class="text-red-500">*</span>
                            </label>
                            <select name="id_eskul" id="id_eskul" required
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors duration-200 @error('id_eskul') border-red-300 dark:border-red-500 @enderror">
                                <option value="">-- Pilih Ekstrakurikuler --</option>
                                @foreach($eskul as $e)
                                    <option value="{{ $e->id_eskul }}" {{ old('id_eskul') == $e->id_eskul ? 'selected' : '' }}>
                                        {{ $e->nama_eskul }} - {{ $e->pembina }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_eskul')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tanggal Daftar -->
                        <div>
                            <label for="tanggal_daftar" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Tanggal Daftar <span class="text-red-500">*</span>
                            </label>
                            <input type="date" name="tanggal_daftar" id="tanggal_daftar" 
                                   value="{{ old('tanggal_daftar', date('Y-m-d')) }}" required
                                   class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors duration-200 @error('tanggal_daftar') border-red-300 dark:border-red-500 @enderror">
                            @error('tanggal_daftar')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status Pendaftaran -->
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Status Pendaftaran <span class="text-red-500">*</span>
                            </label>
                            <select name="status" id="status" required
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors duration-200 @error('status') border-red-300 dark:border-red-500 @enderror">
                                <option value="">-- Pilih Status --</option>
                                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="diterima" {{ old('status') == 'diterima' ? 'selected' : '' }}>Diterima</option>
                                <option value="ditolak" {{ old('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Keterangan -->
                        <div class="md:col-span-2">
                            <label for="keterangan" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Keterangan
                            </label>
                            <textarea name="keterangan" id="keterangan" rows="4" 
                                      placeholder="Masukkan keterangan tambahan (opsional)"
                                      class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors duration-200 resize-none @error('keterangan') border-red-300 dark:border-red-500 @enderror">{{ old('keterangan') }}</textarea>
                            @error('keterangan')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Tombol Submit -->
                    <div class="flex justify-end gap-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('admin.pendaftaran.index') }}" 
                           class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 font-medium transition-colors duration-200">
                            Batal
                        </a>
                        <button type="submit" 
                                class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium transition-colors duration-200 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Simpan Pendaftaran
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-focus pada select siswa
    const siswaSelect = document.getElementById('id_siswa');
    if (siswaSelect) {
        siswaSelect.focus();
    }

    // Validasi form sebelum submit
    const form = document.querySelector('form');
    form.addEventListener('submit', function(e) {
        const siswa = document.getElementById('id_siswa').value;
        const eskul = document.getElementById('id_eskul').value;
        
        if (!siswa || !eskul) {
            e.preventDefault();
            alert('Harap pilih siswa dan ekstrakurikuler terlebih dahulu!');
            return false;
        }
    });
});
</script>
@endsection