<section>
    <header class="mb-6">
        <h2 class="text-xl font-bold text-gray-900 dark:text-gray-100 flex items-center">
            <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            Informasi Profil
        </h2>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
            Perbarui informasi profil akun Anda
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <!-- Foto Profile -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Foto Profil</label>
            <div class="flex items-center space-x-6">
                <div class="shrink-0">
                    @if(Auth::user()->foto_profile)
                        <img id="preview" 
                            src="{{ asset('images/profile/' . Auth::user()->foto_profile) }}" 
                            alt="Preview" 
                            class="h-24 w-24 object-cover rounded-full border-4 border-blue-500 shadow-lg">
                    @else
                        <img id="preview" 
                            src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->nama_lengkap ?? Auth::user()->username) }}&size=200&background=3b82f6&color=ffffff" 
                            alt="Preview" 
                            class="h-24 w-24 object-cover rounded-full border-4 border-blue-500 shadow-lg">
                    @endif
                </div>
                <label class="block">
                    <span class="sr-only">Pilih foto profil</span>
                    <input type="file" name="foto_profile" accept="image/jpeg,image/png,image/jpg" onchange="previewImage(event)"
                        class="block w-full text-sm text-gray-500 dark:text-gray-400
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-full file:border-0
                        file:text-sm file:font-semibold
                        file:bg-blue-50 file:text-blue-700
                        hover:file:bg-blue-100 dark:file:bg-blue-900 dark:file:text-blue-300
                        cursor-pointer"/>
                    <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">JPG, JPEG atau PNG (Max. 2MB)</p>
                </label>
            </div>
            @error('foto_profile')
                <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="username" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Username</label>
            <input id="username" name="username" type="text" value="{{ old('username', $user->username) }}" required autocomplete="username"
                class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all" />
            @error('username')
                <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="nama_lengkap" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Nama Lengkap</label>
            <input id="nama_lengkap" name="nama_lengkap" type="text" value="{{ old('nama_lengkap', $user->nama_lengkap) }}" required autofocus autocomplete="name"
                class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all" />
            @error('nama_lengkap')
                <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-4 pt-4 border-t border-gray-200 dark:border-gray-700">
            <button type="submit" class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white px-8 py-3 rounded-xl font-semibold transition-all transform hover:scale-105 shadow-lg flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                Simpan Perubahan
            </button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)"
                    class="text-sm text-green-600 dark:text-green-400 font-medium flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Berhasil disimpan
                </p>
            @endif
        </div>
    </form>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const preview = document.getElementById('preview');
                preview.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</section>
