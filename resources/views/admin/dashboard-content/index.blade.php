@extends('layouts.admin')

@section('title', 'Kelola Konten Dashboard - Admin Panel')

@section('content')
<div>
        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">
                    🛠️ Kelola Konten Dashboard
                </h1>
                <p class="text-gray-600 dark:text-gray-300">
                    Kelola pengumuman, prestasi, dan konten interaktif untuk dashboard siswa
                </p>
            </div>
            <a href="{{ route('admin.dashboard-content.create') }}" 
               class="mt-4 md:mt-0 bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold transition-all transform hover:scale-105 shadow-lg">
                <i class="fas fa-plus mr-2"></i>
                Tambah Konten
            </a>
        </div>

        <!-- Stats Summary -->
        <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-8">
            <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md border-l-4 border-green-500">
                <div class="flex items-center">
                    <div class="p-2 bg-green-100 dark:bg-green-900 rounded-lg">
                        <i class="fas fa-newspaper text-green-600"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-gray-600 dark:text-gray-400">Berita</p>
                        <p class="text-lg font-semibold text-green-800 dark:text-green-100">{{ $contents->where('type', 'news')->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md border-l-4 border-emerald-500">
                <div class="flex items-center">
                    <div class="p-2 bg-emerald-100 dark:bg-emerald-900 rounded-lg">
                        <i class="fas fa-bullhorn text-emerald-600"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-gray-600 dark:text-gray-400">Pengumuman</p>
                        <p class="text-lg font-semibold text-green-800 dark:text-green-100">{{ $contents->where('type', 'announcement')->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md border-l-4 border-green-500">
                <div class="flex items-center">
                    <div class="p-2 bg-green-100 dark:bg-green-900 rounded-lg">
                        <i class="fas fa-trophy text-green-600"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-gray-600 dark:text-gray-400">Prestasi</p>
                        <p class="text-lg font-semibold text-green-800 dark:text-green-100">{{ $contents->where('type', 'achievement')->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md border-l-4 border-purple-500">
                <div class="flex items-center">
                    <div class="p-2 bg-purple-100 dark:bg-purple-900 rounded-lg">
                        <i class="fas fa-lightbulb text-purple-600"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-gray-600 dark:text-gray-400">Tips</p>
                        <p class="text-lg font-semibold text-green-800 dark:text-green-100">{{ $contents->where('type', 'tip')->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md border-l-4 border-red-500">
                <div class="flex items-center">
                    <div class="p-2 bg-red-100 dark:bg-red-900 rounded-lg">
                        <i class="fas fa-calendar text-red-600"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-gray-600 dark:text-gray-400">Acara</p>
                        <p class="text-lg font-semibold text-green-800 dark:text-green-100">{{ $contents->where('type', 'event')->count() }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 animate-pulse">
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('success') }}
            </div>
        @endif

        <!-- Content Table -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-900">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Konten
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Tipe
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Urutan
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Dibuat
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($contents as $content)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        @if($content->icon)
                                            <div class="p-2 bg-gray-100 dark:bg-gray-700 rounded-lg mr-3">
                                                <i class="{{ $content->icon }} text-gray-600 dark:text-gray-300"></i>
                                            </div>
                                        @endif
                                        <div>
                                            <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                {{ Str::limit($content->title, 40) }}
                                            </div>
                                            <div class="text-sm text-gray-500 dark:text-gray-400">
                                                {{ Str::limit(strip_tags($content->content), 60) }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @php
                                        $typeColors = [
                                            'news' => 'bg-green-100 text-green-800',
                                            'announcement' => 'bg-emerald-100 text-emerald-800',
                                            'achievement' => 'bg-green-100 text-green-800',
                                            'tip' => 'bg-purple-100 text-purple-800',
                                            'event' => 'bg-red-100 text-red-800'
                                        ];
                                    @endphp
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $typeColors[$content->type] ?? 'bg-gray-100 text-gray-800' }}">
                                        {{ $content->getTypeLabel() }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        @if($content->is_active && !$content->is_expired)
                                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                                <i class="fas fa-check-circle mr-1"></i>
                                                Aktif
                                            </span>
                                        @elseif($content->is_expired)
                                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                                <i class="fas fa-clock mr-1"></i>
                                                Expired
                                            </span>
                                        @else
                                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">
                                                <i class="fas fa-pause-circle mr-1"></i>
                                                Nonaktif
                                            </span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                    {{ $content->order ?? 0 }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    {{ $content->formatted_date }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.dashboard-content.show', $content) }}" 
                                           class="text-teal-600 hover:text-teal-900 transition-colors">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.dashboard-content.edit', $content) }}" 
                                           class="text-green-600 hover:text-green-900 transition-colors">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.dashboard-content.toggle-active', $content) }}" 
                                              method="POST" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" 
                                                    class="text-orange-600 hover:text-orange-900 transition-colors"
                                                    title="{{ $content->is_active ? 'Nonaktifkan' : 'Aktifkan' }}">
                                                <i class="fas {{ $content->is_active ? 'fa-toggle-on' : 'fa-toggle-off' }}"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.dashboard-content.destroy', $content) }}" 
                                              method="POST" class="inline" 
                                              onsubmit="return confirm('Yakin ingin menghapus konten ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="text-red-600 hover:text-red-900 transition-colors">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center">
                                    <div class="text-gray-500 dark:text-gray-400">
                                        <i class="fas fa-inbox text-4xl mb-4"></i>
                                        <p class="text-lg">Belum ada konten dashboard</p>
                                        <p class="text-sm">Tambahkan konten pertama untuk dashboard siswa</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        @if($contents->hasPages())
            <div class="mt-6 flex justify-center">
                {{ $contents->links() }}
            </div>
        @endif
</div>
@endsection