@extends('siswa.layout')

@section('title', 'Profil Saya')

@section('content')
<div class="w-full px-0 py-6 space-y-8">
    <!-- Hero Header -->
    <div class="relative overflow-hidden bg-gradient-to-r from-green-800 via-emerald-700 to-teal-600 text-white px-6 md:px-8 rounded-3xl">
        <div class="absolute inset-0 opacity-[0.08] bg-[radial-gradient(ellipse_at_top_left,_var(--tw-gradient-stops))] from-white via-transparent to-transparent pointer-events-none"></div>
        <div class="flex flex-col md:flex-row md:items-center md:justify-between px-6 py-6 md:py-7">
            <div class="flex items-center space-x-4">
                <div class="w-14 h-14 rounded-2xl bg-white/15 ring-1 ring-white/20 flex items-center justify-center text-2xl font-bold">
                    {{ strtoupper(substr($siswa->nama_siswa ?? 'S', 0, 1)) }}
                </div>
                <div>
                    <p class="text-xs text-emerald-100 uppercase tracking-[0.15em]">Profil Siswa</p>
                    <h2 class="text-2xl md:text-3xl font-extrabold tracking-tight">{{ $siswa->nama_siswa }}</h2>
                    <div class="mt-2 flex flex-wrap gap-2 text-xs font-semibold">
                        <span class="px-3 py-1 rounded-full bg-white/15 ring-1 ring-white/20">NIS {{ $siswa->nis }}</span>
                        <span class="px-3 py-1 rounded-full bg-white/15 ring-1 ring-white/20">Kelas {{ $siswa->kelas ?? '-' }}</span>
                        <span class="px-3 py-1 rounded-full bg-white/15 ring-1 ring-white/20">{{ $siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</span>
                    </div>
                </div>
            </div>
            <div class="mt-4 md:mt-0 text-sm text-emerald-50">
                <p class="font-semibold">SMKN 13 Bandung - Sistem Ekstrakurikuler</p>
                <p class="text-emerald-100/80">Terakhir diperbarui: {{ optional($siswa->updated_at)->format('d M Y, H:i') ?? '—' }}</p>
            </div>
        </div>
    </div>

    <!-- Profile Form & Quick Info -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 px-6 md:px-8">
        <!-- Quick Info, flat layout -->
        <div class="space-y-4 rounded-2xl bg-white/5 dark:bg-black/10 border border-white/10 backdrop-blur-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs uppercase text-gray-500 dark:text-gray-400 tracking-[0.15em]">Ringkasan</p>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Data Singkat</h3>
                </div>
                <span class="px-3 py-1 rounded-full bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-100 text-xs font-semibold">Aktif</span>
            </div>
            <div class="space-y-4 text-sm text-gray-800 dark:text-gray-200">
                <div class="flex items-start pb-3 border-b border-gray-200 dark:border-gray-700">
                    <div class="w-9 h-9 mr-3 rounded-lg bg-green-50 dark:bg-green-900/30 flex items-center justify-center text-green-600 dark:text-green-300">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c1.657 0 3-1.567 3-3.5S13.657 4 12 4s-3 1.567-3 3.5S10.343 11 12 11zM6 20c0-2.5 2.667-4 6-4s6 1.5 6 4"/></svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Nama</p>
                        <p class="font-semibold">{{ $siswa->nama_siswa }}</p>
                    </div>
                </div>
                <div class="flex items-start pb-3 border-b border-gray-200 dark:border-gray-700">
                    <div class="w-9 h-9 mr-3 rounded-lg bg-amber-50 dark:bg-amber-900/30 flex items-center justify-center text-amber-600 dark:text-amber-300">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 2M12 2a10 10 0 100 20 10 10 0 000-20z"/></svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Tanggal Lahir</p>
                        <p class="font-semibold">{{ $siswa->tanggal_lahir ?? '-' }}</p>
                    </div>
                </div>
                <div class="flex items-start pb-3 border-b border-gray-200 dark:border-gray-700">
                    <div class="w-9 h-9 mr-3 rounded-lg bg-blue-50 dark:bg-blue-900/30 flex items-center justify-center text-blue-600 dark:text-blue-300">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12l5 5L20 7"/></svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Status</p>
                        <p class="font-semibold">Siswa terdaftar</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="w-9 h-9 mr-3 rounded-lg bg-purple-50 dark:bg-purple-900/30 flex items-center justify-center text-purple-600 dark:text-purple-300">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 2M12 2a10 10 0 100 20 10 10 0 000-20z"/></svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Akun dibuat</p>
                        <p class="font-semibold">{{ optional($siswa->created_at)->format('d M Y, H:i') ?? '-' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form area, flat layout -->
        <div class="lg:col-span-2 space-y-6 rounded-2xl bg-white/5 dark:bg-black/10 border border-white/10 backdrop-blur-sm p-6">
            <div class="flex items-center justify-between pb-4 border-b border-gray-200 dark:border-gray-700">
                <div>
                    <p class="text-xs uppercase text-gray-500 dark:text-gray-400 tracking-[0.15em]">Pengaturan</p>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Profil Anda</h3>
                </div>
                <button type="button" id="btn-edit" onclick="toggleEdit(true)"
                    class="inline-flex items-center px-4 py-2 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold shadow-lg shadow-emerald-500/20 transition-all">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M4 20h4l10.606-10.606a1.5 1.5 0 000-2.121l-2.879-2.879a1.5 1.5 0 00-2.121 0L4 15v5z"/></svg>
                    Ubah Data
                </button>
            </div>

            <div class="space-y-6">
                <!-- View Mode -->
                <div id="view-mode" class="space-y-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs uppercase text-gray-500 dark:text-gray-400 tracking-[0.15em]">Data Pribadi</p>
                            <h4 class="text-base font-semibold text-gray-900 dark:text-white">Ringkasan Profil</h4>
                        </div>
                        <span class="text-xs text-gray-400">Klik "Ubah Data" untuk edit</span>
                    </div>
                    <div class="flex items-center space-x-4 p-4 border border-gray-200 dark:border-gray-700 bg-transparent">
                        @if($siswa->foto_profil)
                            <img src="{{ asset('images/profile/' . $siswa->foto_profil) }}" alt="Foto {{ $siswa->nama_siswa }}" class="h-16 w-16 rounded-full object-cover ring-2 ring-emerald-400 shadow-lg">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($siswa->nama_siswa) }}&size=200&background=10b981&color=ffffff" alt="Inisial {{ $siswa->nama_siswa }}" class="h-16 w-16 rounded-full object-cover ring-2 ring-emerald-400 shadow-lg">
                        @endif
                        <div>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Foto Profil</p>
                            <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ $siswa->nama_siswa }}</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="p-4 border border-gray-200 dark:border-gray-700 bg-transparent">
                            <p class="text-xs text-gray-500 dark:text-gray-400">NIS</p>
                            <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ $siswa->nis }}</p>
                        </div>
                        <div class="p-4 border border-gray-200 dark:border-gray-700 bg-transparent">
                            <p class="text-xs text-gray-500 dark:text-gray-400">Nama Lengkap</p>
                            <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ $siswa->nama_siswa }}</p>
                        </div>
                        <div class="p-4 border border-gray-200 dark:border-gray-700 bg-transparent">
                            <p class="text-xs text-gray-500 dark:text-gray-400">Kelas</p>
                            <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ $siswa->kelas ?? '-' }}</p>
                        </div>
                        <div class="p-4 border border-gray-200 dark:border-gray-700 bg-transparent">
                            <p class="text-xs text-gray-500 dark:text-gray-400">Jenis Kelamin</p>
                            <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ $siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                        </div>
                        <div class="p-4 border border-gray-200 dark:border-gray-700 bg-transparent">
                            <p class="text-xs text-gray-500 dark:text-gray-400">Tanggal Lahir</p>
                            <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ $siswa->tanggal_lahir ?? '-' }}</p>
                        </div>
                        <div class="p-4 border border-gray-200 dark:border-gray-700 bg-transparent">
                            <p class="text-xs text-gray-500 dark:text-gray-400">No. Telp</p>
                            <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ $siswa->no_telp ?? '-' }}</p>
                        </div>
                        <div class="p-4 border border-gray-200 dark:border-gray-700 bg-transparent md:col-span-2">
                            <p class="text-xs text-gray-500 dark:text-gray-400">Alamat</p>
                            <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ $siswa->alamat ?? '-' }}</p>
                        </div>
                        <div class="p-4 border border-gray-200 dark:border-gray-700 bg-transparent md:col-span-2">
                            <p class="text-xs text-gray-500 dark:text-gray-400">Email</p>
                            <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ $siswa->email ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Edit Mode -->
                <form id="edit-form" method="POST" action="{{ route('siswa.profile.update') }}" class="space-y-5 hidden" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Foto Profil -->
                    <div class="space-y-3">
                        <label class="block text-sm text-gray-600 dark:text-gray-300 font-medium">Foto Profil</label>
                        <div class="flex items-center space-x-4">
                            <div class="shrink-0">
                                @if($siswa->foto_profil)
                                    <img id="preview" src="{{ asset('images/profile/' . $siswa->foto_profil) }}" alt="Preview"
                                        class="h-20 w-20 rounded-full object-cover ring-2 ring-emerald-400 shadow-lg">
                                @else
                                    <img id="preview" src="https://ui-avatars.com/api/?name={{ urlencode($siswa->nama_siswa) }}&size=200&background=10b981&color=ffffff"
                                        alt="Preview" class="h-20 w-20 rounded-full object-cover ring-2 ring-emerald-400 shadow-lg">
                                @endif
                            </div>
                            <label class="block">
                                <span class="sr-only">Pilih foto profil</span>
                                <input type="file" name="foto_profil" accept="image/jpeg,image/png,image/jpg" onchange="previewImage(event)"
                                    class="block w-full text-sm text-gray-600 dark:text-gray-300
                                    file:mr-4 file:py-2.5 file:px-4
                                    file:rounded-lg file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-emerald-50 file:text-emerald-700
                                    hover:file:bg-emerald-100 dark:file:bg-emerald-900 dark:file:text-emerald-200
                                    cursor-pointer" />
                                <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">JPG/PNG maks 2MB</p>
                            </label>
                        </div>
                        @error('foto_profil')
                            <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm text-gray-600 dark:text-gray-300 font-medium mb-2">NIS</label>
                            <input type="text" value="{{ $siswa->nis }}" disabled class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 bg-gray-100 dark:bg-gray-900/50 text-gray-700 dark:text-gray-200">
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">NIS tidak dapat diubah</p>
                        </div>

                        <div>
                            <label for="nama_siswa" class="block text-sm text-gray-600 dark:text-gray-300 font-medium mb-2">Nama Lengkap</label>
                            <input type="text" name="nama_siswa" id="nama_siswa" value="{{ old('nama_siswa', $siswa->nama_siswa) }}" required readonly
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 bg-gray-100 dark:bg-gray-900/50 text-gray-700 dark:text-gray-200">
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Nama lengkap tidak dapat diubah</p>
                        </div>

                        <div>
                            <label for="kelas" class="block text-sm text-gray-600 dark:text-gray-300 font-medium mb-2">Kelas</label>
                            <input type="text" name="kelas" id="kelas" value="{{ old('kelas', $siswa->kelas) }}"
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900/50 text-gray-800 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        </div>

                        <div>
                            <label class="block text-sm text-gray-600 dark:text-gray-300 font-medium mb-2">Jenis Kelamin</label>
                            <input type="text" value="{{ $siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}" disabled
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 bg-gray-100 dark:bg-gray-900/50 text-gray-700 dark:text-gray-200">
                        </div>

                        <div>
                            <label class="block text-sm text-gray-600 dark:text-gray-300 font-medium mb-2">Tanggal Lahir</label>
                            <input type="text" value="{{ $siswa->tanggal_lahir ?? '-' }}" disabled
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 bg-gray-100 dark:bg-gray-900/50 text-gray-700 dark:text-gray-200">
                        </div>

                        <div>
                            <label for="no_telp" class="block text-sm text-gray-600 dark:text-gray-300 font-medium mb-2">No. Telp</label>
                            <input type="text" name="no_telp" id="no_telp" value="{{ old('no_telp', $siswa->no_telp) }}"
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900/50 text-gray-800 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        </div>

                        <div class="md:col-span-2">
                            <label for="alamat" class="block text-sm text-gray-600 dark:text-gray-300 font-medium mb-2">Alamat</label>
                            <textarea name="alamat" id="alamat" rows="3"
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900/50 text-gray-800 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">{{ old('alamat', $siswa->alamat) }}</textarea>
                        </div>

                        <div>
                            <label for="email" class="block text-sm text-gray-600 dark:text-gray-300 font-medium mb-2">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $siswa->email) }}"
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900/50 text-gray-800 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        </div>
                    </div>

                    <div class="flex items-center justify-between gap-3 pt-2">
                        <button type="button" onclick="toggleEdit(false)" class="px-4 py-2.5 rounded-lg text-sm font-semibold text-gray-700 dark:text-gray-200 border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">Batal</button>
                        <button type="submit" class="inline-flex items-center px-5 py-2.5 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold shadow-lg shadow-emerald-500/20 transition-all">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const preview = document.getElementById('preview');
            preview.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }

    function toggleEdit(showForm) {
        const view = document.getElementById('view-mode');
        const form = document.getElementById('edit-form');
        if (!view || !form) return;
        if (showForm) {
            view.classList.add('hidden');
            form.classList.remove('hidden');
        } else {
            form.classList.add('hidden');
            view.classList.remove('hidden');
        }
    }
</script>
@endsection
