@extends('layouts.admin')

@section('title', 'Tambah Konten Dashboard - Admin Panel')

@section('content')
<div>
        <!-- Header -->
        <div class="flex items-center mb-8">
            <a href="{{ route('admin.dashboard-content.index') }}" 
               class="mr-4 p-2 bg-white dark:bg-gray-800 rounded-lg shadow-md hover:shadow-lg transition-all">
                <i class="fas fa-arrow-left text-gray-600 dark:text-gray-300"></i>
            </a>
            <div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">
                    ➕ Tambah Konten Dashboard
                </h1>
                <p class="text-gray-600 dark:text-gray-300">
                    Buat konten baru untuk dashboard siswa
                </p>
            </div>
        </div>

        <!-- Form -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
            <form action="{{ route('admin.dashboard-content.store') }}" method="POST">
                @csrf
                
                <!-- Type Selection -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Tipe Konten <span class="text-red-500">*</span>
                    </label>
                    <div class="grid grid-cols-2 md:grid-cols-5 gap-3">
                        @php
                            $types = [
                                'news' => ['label' => 'Berita', 'icon' => 'fas fa-newspaper', 'color' => 'blue'],
                                'announcement' => ['label' => 'Pengumuman', 'icon' => 'fas fa-bullhorn', 'color' => 'yellow'],
                                'achievement' => ['label' => 'Prestasi', 'icon' => 'fas fa-trophy', 'color' => 'green'],
                                'tip' => ['label' => 'Tips', 'icon' => 'fas fa-lightbulb', 'color' => 'purple'],
                                'event' => ['label' => 'Acara', 'icon' => 'fas fa-calendar', 'color' => 'red']
                            ];
                        @endphp
                        
                        @foreach($types as $key => $type)
                            <label class="cursor-pointer">
                                <input type="radio" name="type" value="{{ $key }}" 
                                       class="sr-only type-radio" {{ old('type') == $key ? 'checked' : '' }}>
                                <div class="p-4 border-2 rounded-lg text-center transition-all hover:shadow-md type-card"
                                     data-color="{{ $type['color'] }}">
                                    <i class="{{ $type['icon'] }} text-2xl mb-2 text-{{ $type['color'] }}-600"></i>
                                    <p class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ $type['label'] }}</p>
                                </div>
                            </label>
                        @endforeach
                    </div>
                    @error('type')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Title -->
                    <div class="md:col-span-2">
                        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Judul <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="title" id="title" 
                               value="{{ old('title') }}"
                               class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:text-white"
                               placeholder="Masukkan judul konten" required>
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Kategori
                        </label>
                        <input type="text" name="category" id="category" 
                               value="{{ old('category') }}"
                               class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:text-white"
                               placeholder="Misal: Eskul Basket, Kelas X, dll">
                        @error('category')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Author -->
                    <div>
                        <label for="author" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Penulis
                        </label>
                        <input type="text" name="author" id="author" 
                               value="{{ old('author') }}"
                               class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:text-white"
                               placeholder="Nama penulis">
                        @error('author')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Icon -->
                    <div>
                        <label for="icon" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Icon (Font Awesome)
                        </label>
                        <input type="text" name="icon" id="icon" 
                               value="{{ old('icon') }}"
                               class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:text-white"
                               placeholder="Misal: fas fa-star, fas fa-medal">
                        @error('icon')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Order -->
                    <div>
                        <label for="order" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Urutan Tampil
                        </label>
                        <input type="number" name="order" id="order" 
                               value="{{ old('order', 0) }}" min="0"
                               class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:text-white"
                               placeholder="0">
                        @error('order')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Content -->
                <div class="mt-6">
                    <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Konten <span class="text-red-500">*</span>
                    </label>
                    <textarea name="content" id="content" rows="6" 
                              class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:text-white"
                              placeholder="Tulis konten di sini..." required>{{ old('content') }}</textarea>
                    @error('content')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Additional Settings -->
                <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Expires At -->
                    <div>
                        <label for="expires_at" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Tanggal Kadaluarsa (Opsional)
                        </label>
                        <input type="datetime-local" name="expires_at" id="expires_at" 
                               value="{{ old('expires_at') }}"
                               class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:text-white">
                        <p class="mt-1 text-xs text-gray-500">Kosongkan jika tidak ada batas waktu</p>
                        @error('expires_at')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Active Status -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Status
                        </label>
                        <label class="flex items-center cursor-pointer">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" name="is_active" value="1" 
                                   {{ old('is_active', 1) ? 'checked' : '' }}
                                   class="sr-only">
                            <div class="relative">
                                <div class="block bg-gray-600 w-14 h-8 rounded-full"></div>
                                <div class="dot absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition transform"></div>
                            </div>
                            <span class="ml-3 text-sm text-gray-700 dark:text-gray-300">Aktifkan konten</span>
                        </label>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="mt-8 flex flex-col sm:flex-row gap-4">
                    <button type="submit" 
                            class="w-full sm:w-auto bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-lg font-semibold transition-all transform hover:scale-105 shadow-lg">
                        <i class="fas fa-save mr-2"></i>
                        Simpan Konten
                    </button>
                    <a href="{{ route('admin.dashboard-content.index') }}" 
                       class="w-full sm:w-auto bg-gray-500 hover:bg-gray-600 text-white px-8 py-3 rounded-lg font-semibold transition-all text-center">
                        <i class="fas fa-times mr-2"></i>
                        Batal
                    </a>
                </div>
            </form>
        </div>
</div>

<style>
.type-radio:checked + .type-card {
    border-color: rgb(34 197 94);
    background-color: rgb(240 253 244);
    box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
}

.dark .type-radio:checked + .type-card {
    background-color: rgba(34, 197, 94, 0.1);
}

/* Toggle Switch */
input:checked ~ .bg-gray-600 {
    background-color: rgb(34 197 94);
}

input:checked ~ .bg-gray-600 .dot {
    transform: translateX(100%);
}
</style>

<script>
// Auto-fill icon based on type selection
document.querySelectorAll('.type-radio').forEach(radio => {
    radio.addEventListener('change', function() {
        const iconInput = document.getElementById('icon');
        const iconMap = {
            'news': 'fas fa-newspaper',
            'announcement': 'fas fa-bullhorn', 
            'achievement': 'fas fa-trophy',
            'tip': 'fas fa-lightbulb',
            'event': 'fas fa-calendar'
        };
        
        if (iconMap[this.value] && !iconInput.value) {
            iconInput.value = iconMap[this.value];
        }
    });
});
</script>
@endsection