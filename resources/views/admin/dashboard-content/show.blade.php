@extends('layouts.admin')

@section('title', 'Detail Konten Dashboard - Admin Panel')

@section('content')
<div>
        <!-- Header -->
        <div class="flex items-center mb-8">
            <a href="{{ route('admin.dashboard-content.index') }}" 
               class="mr-4 p-2 bg-white dark:bg-gray-800 rounded-lg shadow-md hover:shadow-lg transition-all">
                <i class="fas fa-arrow-left text-gray-600 dark:text-gray-300"></i>
            </a>
            <div class="flex-1">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">
                    👁️ Detail Konten Dashboard
                </h1>
                <p class="text-gray-600 dark:text-gray-300">
                    Lihat detail konten "{{ $dashboardContent->title }}"
                </p>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('admin.dashboard-content.edit', $dashboardContent) }}" 
                   class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-semibold transition-all">
                    <i class="fas fa-edit mr-2"></i>
                    Edit
                </a>
                <form action="{{ route('admin.dashboard-content.toggle-active', $dashboardContent) }}" 
                      method="POST" class="inline">
                    @csrf
                    @method('PATCH')
                    <button type="submit" 
                            class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg font-semibold transition-all">
                        <i class="fas {{ $dashboardContent->is_active ? 'fa-toggle-on' : 'fa-toggle-off' }} mr-2"></i>
                        {{ $dashboardContent->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                    </button>
                </form>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Content Card -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 mb-6">
                    <!-- Title and Type -->
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center">
                            @if($dashboardContent->icon)
                                <div class="p-3 bg-green-100 dark:bg-green-900 rounded-lg mr-4">
                                    <i class="{{ $dashboardContent->icon }} text-2xl text-green-600"></i>
                                </div>
                            @endif
                            <div>
                                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-1">
                                    {{ $dashboardContent->title }}
                                </h2>
                                @php
                                    $typeColors = [
                                        'news' => 'bg-green-100 text-green-800',
                                        'announcement' => 'bg-emerald-100 text-emerald-800',
                                        'achievement' => 'bg-green-100 text-green-800',
                                        'tip' => 'bg-purple-100 text-purple-800',
                                        'event' => 'bg-red-100 text-red-800'
                                    ];
                                @endphp
                                <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full {{ $typeColors[$dashboardContent->type] ?? 'bg-gray-100 text-gray-800' }}">
                                    {{ $dashboardContent->getTypeLabel() }}
                                </span>
                            </div>
                        </div>
                        
                        <!-- Status Badge -->
                        <div>
                            @if($dashboardContent->is_active && !$dashboardContent->is_expired)
                                <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-green-100 text-green-800">
                                    <i class="fas fa-check-circle mr-2"></i>
                                    Aktif
                                </span>
                            @elseif($dashboardContent->is_expired)
                                <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-red-100 text-red-800">
                                    <i class="fas fa-clock mr-2"></i>
                                    Expired
                                </span>
                            @else
                                <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-gray-100 text-gray-800">
                                    <i class="fas fa-pause-circle mr-2"></i>
                                    Nonaktif
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="prose prose-lg max-w-none dark:prose-invert">
                        {!! nl2br(e($dashboardContent->content)) !!}
                    </div>

                    <!-- Metadata -->
                    <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm text-gray-600 dark:text-gray-400">
                            @if($dashboardContent->category)
                                <div>
                                    <span class="font-medium">Kategori:</span><br>
                                    {{ $dashboardContent->category }}
                                </div>
                            @endif
                            @if($dashboardContent->author)
                                <div>
                                    <span class="font-medium">Penulis:</span><br>
                                    {{ $dashboardContent->author }}
                                </div>
                            @endif
                            <div>
                                <span class="font-medium">Urutan:</span><br>
                                {{ $dashboardContent->order ?? 0 }}
                            </div>
                            <div>
                                <span class="font-medium">Dibuat:</span><br>
                                {{ $dashboardContent->formatted_date }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Preview Card -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        <i class="fas fa-eye mr-2"></i>
                        Preview Dashboard
                    </h3>
                    <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-4">
                        <!-- Simulate dashboard card -->
                        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow-md border-l-4 border-green-500">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center">
                                    @if($dashboardContent->icon)
                                        <i class="{{ $dashboardContent->icon }} text-green-600 mr-2"></i>
                                    @endif
                                    <h4 class="font-semibold text-gray-900 dark:text-white">
                                        {{ $dashboardContent->title }}
                                    </h4>
                                </div>
                                @if($dashboardContent->category)
                                    <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded-full">
                                        {{ $dashboardContent->category }}
                                    </span>
                                @endif
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                {{ Str::limit(strip_tags($dashboardContent->content), 100) }}
                            </p>
                            <div class="mt-2 text-xs text-gray-500">
                                @if($dashboardContent->author)
                                    Oleh {{ $dashboardContent->author }} • 
                                @endif
                                {{ $dashboardContent->formatted_date }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div>
                <!-- Quick Stats -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        <i class="fas fa-chart-bar mr-2"></i>
                        Informasi
                    </h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600 dark:text-gray-400">ID Konten</span>
                            <span class="font-semibold text-gray-900 dark:text-white">#{{ $dashboardContent->id }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600 dark:text-gray-400">Tipe</span>
                            <span class="font-semibold text-gray-900 dark:text-white">{{ $dashboardContent->getTypeLabel() }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600 dark:text-gray-400">Status</span>
                            <span class="font-semibold {{ $dashboardContent->is_active ? 'text-green-600' : 'text-red-600' }}">
                                {{ $dashboardContent->is_active ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600 dark:text-gray-400">Urutan</span>
                            <span class="font-semibold text-gray-900 dark:text-white">{{ $dashboardContent->order ?? 0 }}</span>
                        </div>
                        @if($dashboardContent->expires_at)
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600 dark:text-gray-400">Kadaluarsa</span>
                                <span class="font-semibold {{ $dashboardContent->is_expired ? 'text-red-600' : 'text-orange-600' }}">
                                    {{ $dashboardContent->expires_at->format('d M Y') }}
                                </span>
                            </div>
                        @endif
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600 dark:text-gray-400">Dibuat</span>
                            <span class="font-semibold text-gray-900 dark:text-white">{{ $dashboardContent->created_at->format('d M Y H:i') }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600 dark:text-gray-400">Diupdate</span>
                            <span class="font-semibold text-gray-900 dark:text-white">{{ $dashboardContent->updated_at->format('d M Y H:i') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        <i class="fas fa-tools mr-2"></i>
                        Aksi Cepat
                    </h3>
                    <div class="space-y-3">
                        <a href="{{ route('admin.dashboard-content.edit', $dashboardContent) }}" 
                           class="w-full bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-semibold transition-all text-center block">
                            <i class="fas fa-edit mr-2"></i>
                            Edit Konten
                        </a>
                        
                        <form action="{{ route('admin.dashboard-content.toggle-active', $dashboardContent) }}" 
                              method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" 
                                    class="w-full bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg font-semibold transition-all">
                                <i class="fas {{ $dashboardContent->is_active ? 'fa-toggle-off' : 'fa-toggle-on' }} mr-2"></i>
                                {{ $dashboardContent->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                            </button>
                        </form>

                        <form action="{{ route('admin.dashboard-content.destroy', $dashboardContent) }}" 
                              method="POST" 
                              onsubmit="return confirm('Yakin ingin menghapus konten ini? Tindakan ini tidak dapat dibatalkan.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="w-full bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg font-semibold transition-all">
                                <i class="fas fa-trash mr-2"></i>
                                Hapus Konten
                            </button>
                        </form>

                        <a href="{{ route('admin.dashboard-content.create') }}" 
                           class="w-full bg-teal-500 hover:bg-teal-600 text-white px-4 py-2 rounded-lg font-semibold transition-all text-center block">
                            <i class="fas fa-plus mr-2"></i>
                            Tambah Konten Baru
                        </a>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection