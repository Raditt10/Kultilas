<section class="space-y-6">
    <header class="flex items-center mb-6">
        <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-red-500 to-red-600 rounded-xl mr-4">
            <i class="fas fa-trash-alt text-white text-xl"></i>
        </div>
        <div>
            <h2 class="text-xl font-bold text-gray-900 dark:text-gray-100">
                Hapus Akun
            </h2>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Setelah akun Anda dihapus, semua sumber daya dan data akan dihapus secara permanen. Sebelum menghapus akun, silakan unduh data atau informasi yang ingin Anda simpan.
            </p>
        </div>
    </header>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        type="button"
        class="flex items-center px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200"
    >
        <i class="fas fa-exclamation-triangle mr-2"></i>
        Hapus Akun
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <div class="flex items-center mb-4">
                <div class="flex items-center justify-center w-14 h-14 bg-red-100 dark:bg-red-900/30 rounded-full mr-4">
                    <i class="fas fa-exclamation-triangle text-red-600 dark:text-red-400 text-2xl"></i>
                </div>
                <h2 class="text-xl font-bold text-gray-900 dark:text-gray-100">
                    Yakin ingin menghapus akun?
                </h2>
            </div>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 mb-6">
                Setelah akun Anda dihapus, semua sumber daya dan data akan dihapus secara permanen. Masukkan password Anda untuk mengkonfirmasi bahwa Anda ingin menghapus akun secara permanen.
            </p>

            <div class="mt-6">
                <label for="password" class="block text-sm font-semibold text-gray-900 dark:text-gray-100 mb-2">
                    Password
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="fas fa-key text-gray-400"></i>
                    </div>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        class="w-full pl-12 pr-4 py-3 rounded-xl border-2 border-red-200 dark:border-red-800 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:border-red-500 dark:focus:border-red-400 focus:ring-0 transition-colors duration-200"
                        placeholder="Masukkan password untuk konfirmasi"
                    />
                </div>
                @error('password', 'userDeletion')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <button 
                    type="button"
                    x-on:click="$dispatch('close')"
                    class="px-6 py-3 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-900 dark:text-gray-100 font-semibold rounded-xl shadow hover:shadow-md transition-all duration-200"
                >
                    <i class="fas fa-times mr-2"></i>
                    Batal
                </button>

                <button 
                    type="submit"
                    class="flex items-center px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-200"
                >
                    <i class="fas fa-trash-alt mr-2"></i>
                    Hapus Akun
                </button>
            </div>
        </form>
    </x-modal>
</section>
