@extends('siswa.layout')

@section('title', 'Registrasi Siswa')

@section('content')
<div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-md p-8">
    <h2 class="text-2xl font-bold mb-6 text-center text-gray-900 dark:text-white">Registrasi Siswa Baru</h2>
    
    <form method="POST" action="{{ route('siswa.register.store') }}">
        @csrf
        
        <div class="grid grid-cols-2 gap-4">
            <div class="mb-4">
                <label for="nis" class="block text-gray-700 dark:text-gray-200 font-medium mb-2">NIS <span class="text-red-500">*</span></label>
                <input type="text" name="nis" id="nis" value="{{ old('nis') }}" required
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg focus:ring-2 focus:ring-green-500">
                @error('nis')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="nama_siswa" class="block text-gray-700 dark:text-gray-200 font-medium mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                <input type="text" name="nama_siswa" id="nama_siswa" value="{{ old('nama_siswa') }}" required
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg focus:ring-2 focus:ring-green-500">
                @error('nama_siswa')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="kelas" class="block text-gray-700 dark:text-gray-200 font-medium mb-2">Kelas</label>
                <input type="text" name="kelas" id="kelas" value="{{ old('kelas') }}"
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg focus:ring-2 focus:ring-green-500">
            </div>

            <div class="mb-4">
                <label for="jenis_kelamin" class="block text-gray-700 dark:text-gray-200 font-medium mb-2">Jenis Kelamin <span class="text-red-500">*</span></label>
                <select name="jenis_kelamin" id="jenis_kelamin" required
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg focus:ring-2 focus:ring-green-500">
                    <option value="">Pilih...</option>
                    <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('jenis_kelamin')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="tanggal_lahir" class="block text-gray-700 dark:text-gray-200 font-medium mb-2">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg focus:ring-2 focus:ring-green-500">
            </div>

            <div class="mb-4">
                <label for="no_telp" class="block text-gray-700 dark:text-gray-200 font-medium mb-2">No. Telp</label>
                <input type="text" name="no_telp" id="no_telp" value="{{ old('no_telp') }}"
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg focus:ring-2 focus:ring-green-500">
            </div>

            <div class="mb-4 col-span-2">
                <label for="email" class="block text-gray-700 dark:text-gray-200 font-medium mb-2">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg focus:ring-2 focus:ring-green-500">
            </div>

            <div class="mb-4 col-span-2">
                <label for="alamat" class="block text-gray-700 dark:text-gray-200 font-medium mb-2">Alamat</label>
                <textarea name="alamat" id="alamat" rows="3"
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg focus:ring-2 focus:ring-green-500">{{ old('alamat') }}</textarea>
            </div>
        </div>

        <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 font-medium mt-4">
            Daftar
        </button>
    </form>

    <div class="mt-4 text-center">
        <p class="text-gray-600 dark:text-gray-300">Sudah punya akun? <a href="{{ route('siswa.login') }}" class="text-green-600 hover:underline">Login di sini</a></p>
    </div>
</div>
@endsection
