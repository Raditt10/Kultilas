@extends('siswa.layout')

@section('title', 'Profil Saya')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-6">
        <h2 class="text-3xl font-bold text-gray-800">Profil Saya</h2>
    </div>

    <div class="bg-white rounded-lg shadow p-8">
        <form method="POST" action="{{ route('siswa.profile.update') }}">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">NIS</label>
                <input type="text" value="{{ $siswa->nis }}" disabled
                    class="w-full px-4 py-2 border rounded-lg bg-gray-100">
                <p class="text-sm text-gray-500 mt-1">NIS tidak dapat diubah</p>
            </div>

            <div class="mb-4">
                <label for="nama_siswa" class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
                <input type="text" name="nama_siswa" id="nama_siswa" value="{{ old('nama_siswa', $siswa->nama_siswa) }}" required
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                @error('nama_siswa')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="kelas" class="block text-gray-700 font-medium mb-2">Kelas</label>
                <input type="text" name="kelas" id="kelas" value="{{ old('kelas', $siswa->kelas) }}"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Jenis Kelamin</label>
                <input type="text" value="{{ $siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}" disabled
                    class="w-full px-4 py-2 border rounded-lg bg-gray-100">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Tanggal Lahir</label>
                <input type="text" value="{{ $siswa->tanggal_lahir ?? '-' }}" disabled
                    class="w-full px-4 py-2 border rounded-lg bg-gray-100">
            </div>

            <div class="mb-4">
                <label for="alamat" class="block text-gray-700 font-medium mb-2">Alamat</label>
                <textarea name="alamat" id="alamat" rows="3"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">{{ old('alamat', $siswa->alamat) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="no_telp" class="block text-gray-700 font-medium mb-2">No. Telp</label>
                <input type="text" name="no_telp" id="no_telp" value="{{ old('no_telp', $siswa->no_telp) }}"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $siswa->email) }}"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 font-medium">
                Simpan Perubahan
            </button>
        </form>
    </div>
</div>
@endsection
