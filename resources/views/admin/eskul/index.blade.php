@extends('layouts.admin')

@section('title', 'Kelola Ekstrakurikuler - Admin Panel')
@section('page-title', 'Kelola Ekstrakurikuler')

@section('content')
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-green-700 to-green-900 dark:from-gray-800 dark:to-gray-900 rounded-xl shadow-lg p-6 mb-8">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <div class="bg-white/20 p-3 rounded-lg mr-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="font-bold text-2xl text-white leading-tight"> Kelola Ekstrakurikuler</h2>
                    <p class="text-green-100 dark:text-gray-300 text-sm mt-1">Kelola kegiatan ekstrakurikuler dan program sekolah</p>
                </div>
            </div>
            <a href="{{ route('admin.eskul.create') }}" 
               class="bg-white/20 hover:bg-white/30 text-white px-6 py-3 rounded-lg font-semibold transition-all flex items-center shadow-lg">
                <i class="fas fa-plus mr-2"></i>
                Tambah Eskul
            </a>
        </div>
    </div>

    <!-- Content Container -->
    <div class="space-y-8">
        <!-- Stats Summary -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg border-l-4 border-green-600 hover:shadow-xl transition-shadow">
                <div class="flex items-center">
                    <div class="p-3 bg-green-100 dark:bg-green-900 rounded-xl">
                        <i class="fas fa-building text-2xl text-green-600 dark:text-green-400"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600 dark:text-gray-400 font-medium">Total Eskul</p>
                        <p class="text-2xl font-bold text-green-800 dark:text-green-100">{{ $totalEskul }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg border-l-4 border-green-500 hover:shadow-xl transition-shadow">
                <div class="flex items-center">
                    <div class="p-3 bg-green-50 dark:bg-green-900 rounded-xl">
                        <i class="fas fa-user-tie text-2xl text-green-600 dark:text-green-400"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600 dark:text-gray-400 font-medium">Pembina Aktif</p>
                        <p class="text-2xl font-bold text-green-800 dark:text-green-100">{{ $totalPembina }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg border-l-4 border-teal-500 hover:shadow-xl transition-shadow">
                <div class="flex items-center">
                    <div class="p-3 bg-teal-50 dark:bg-teal-900 rounded-xl">
                        <i class="fas fa-users text-2xl text-teal-600 dark:text-teal-400"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600 dark:text-gray-400 font-medium">Peserta Aktif</p>
                        <p class="text-2xl font-bold text-green-800 dark:text-green-100">{{ $pesertaAktif }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg border-l-4 border-purple-500 hover:shadow-xl transition-shadow">
                <div class="flex items-center">
                    <div class="p-3 bg-purple-50 dark:bg-purple-900 rounded-xl">
                        <i class="fas fa-calendar text-2xl text-purple-600 dark:text-purple-400"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600 dark:text-gray-400 font-medium">Kegiatan Minggu Ini</p>
                        <p class="text-2xl font-bold text-green-800 dark:text-green-100">{{ $kegiatanMingguIni }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="bg-green-50 dark:bg-green-900 border border-green-200 dark:border-green-700 text-green-800 dark:text-green-200 px-6 py-4 rounded-xl mb-6 flex items-center shadow-lg">
                <i class="fas fa-check-circle mr-3 text-green-600 dark:text-green-400"></i>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Action Bar -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 mb-8">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Daftar Ekstrakurikuler</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">Kelola kegiatan dan program ekstrakurikuler</p>
                </div>
                <a href="{{ route('admin.eskul.create') }}" 
                   class="bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white px-6 py-3 rounded-xl font-semibold transition-all transform hover:scale-105 shadow-lg flex items-center">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah Eskul Baru
                </a>
            </div>
        </div>

        <!-- Data Table -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gradient-to-r from-green-50 to-green-100 dark:from-gray-900 dark:to-gray-800">
                        <tr>
                            <th class="px-8 py-4 text-left text-xs font-bold text-green-800 dark:text-green-300 uppercase tracking-wider">
                                Eskul
                            </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Pembina
                                </th>
                            <th class="px-8 py-4 text-left text-xs font-bold text-green-800 dark:text-green-300 uppercase tracking-wider">
                                Jadwal
                            </th>
                            <th class="px-8 py-4 text-left text-xs font-bold text-green-800 dark:text-green-300 uppercase tracking-wider">
                                Peserta
                            </th>
                            <th class="px-8 py-4 text-left text-xs font-bold text-green-800 dark:text-green-300 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($eskuls as $e)
                            <tr class="hover:bg-green-50 dark:hover:bg-gray-700 transition-all duration-200">
                                <td class="px-8 py-6 whitespace-nowrap">
                                    <div class="flex items-center">
                                        @if($e->foto_eskul)
                                            <img src="{{ asset('images/eskul/' . $e->foto_eskul) }}" alt="{{ $e->nama_eskul }}" class="w-16 h-16 rounded-lg object-cover mr-4 shadow-lg border-2 border-green-200 dark:border-green-700">
                                        @else
                                            <div class="bg-gradient-to-br from-green-400 to-green-600 p-3 rounded-full mr-4 shadow-lg flex items-center justify-center w-16 h-16">
                                                <i class="fas fa-building text-white text-xl"></i>
                                            </div>
                                        @endif
                                        <div>
                                            <div class="text-sm font-semibold text-gray-900 dark:text-white">
                                                    {{ $e->nama_eskul }}
                                                </div>
                                                <div class="text-sm text-gray-500 dark:text-gray-400">
                                                    {{ $e->deskripsi ? Str::limit($e->deskripsi, 50) : 'Tidak ada deskripsi' }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                <td class="px-8 py-6 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="bg-gradient-to-br from-blue-400 to-blue-600 p-3 rounded-full mr-4 shadow-lg">
                                            <i class="fas fa-user-tie text-white"></i>
                                        </div>
                                        <div class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $e->pembina }}</div>
                                    </div>
                                </td>
                                <td class="px-8 py-6 whitespace-nowrap">
                                    <div class="flex flex-col">
                                        <span class="inline-flex px-4 py-2 text-xs font-semibold rounded-full bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200 mb-2 border border-purple-200">
                                            {{ $e->hari_kegiatan }}
                                        </span>
                                        @if($e->jam_mulai && $e->jam_selesai)
                                            <span class="text-xs text-gray-500 dark:text-gray-400 font-medium">
                                                {{ date('H:i', strtotime($e->jam_mulai)) }} - {{ date('H:i', strtotime($e->jam_selesai)) }}
                                            </span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-8 py-6 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $e->pendaftaranEskul->where('status', 'diterima')->count() }} Siswa
                                    </div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">
                                        Aktif
                                    </div>
                                </td>
                                <td class="px-8 py-6 whitespace-nowrap">
                                    <div class="flex space-x-3">
                                        <a href="{{ route('admin.eskul.show', $e->id_eskul) }}" 
                                           class="bg-blue-100 hover:bg-blue-200 text-blue-700 p-2 rounded-lg transition-all duration-200 shadow-sm" title="Lihat Detail">
                                                <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.eskul.edit', $e->id_eskul) }}" 
                                           class="bg-green-100 hover:bg-green-200 text-green-700 p-2 rounded-lg transition-all duration-200 shadow-sm" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.eskul.destroy', $e->id_eskul) }}" 
                                              method="POST" class="inline" 
                                              onsubmit="return confirm('Yakin ingin menghapus eskul ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="bg-red-100 hover:bg-red-200 text-red-700 p-2 rounded-lg transition-all duration-200 shadow-sm" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-8 py-12 text-center text-gray-500 dark:text-gray-400">
                                    <div class="flex flex-col items-center">
                                        <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-full mb-6">
                                            <i class="fas fa-building text-4xl text-gray-400"></i>
                                        </div>
                                        <p class="text-xl font-semibold mb-2">Belum ada data ekstrakurikuler</p>
                                        <p class="text-sm text-gray-400 mb-6">Silakan tambah ekstrakurikuler baru untuk memulai</p>
                                        <a href="{{ route('admin.eskul.create') }}" 
                                           class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold transition-all flex items-center">
                                            <i class="fas fa-plus mr-2"></i>
                                            Tambah Eskul Pertama
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 mt-8">
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                <div class="text-sm text-gray-700 dark:text-gray-300 font-medium">
                    Menampilkan {{ $eskuls->firstItem() ?? 0 }} - {{ $eskuls->lastItem() ?? 0 }} dari {{ $eskuls->total() }} ekstrakurikuler
                </div>
                <div class="pagination-green">
                    {{ $eskuls->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Custom Styles for Green Theme -->
    <style>
        .pagination-green .pagination {
            display: flex;
            gap: 0.25rem;
        }
        
        .pagination-green .page-link {
            background-color: white;
            border: 1px solid #d1d5db;
            color: #374151;
            padding: 0.5rem 0.75rem;
            border-radius: 0.5rem;
            text-decoration: none;
            transition: all 0.2s;
        }
        
        .pagination-green .page-link:hover {
            background-color: #f3f4f6;
            border-color: #16a34a;
            color: #16a34a;
        }
        
        .pagination-green .page-item.active .page-link {
            background-color: #16a34a;
            border-color: #16a34a;
            color: white;
        }
        
        .pagination-green .page-item.disabled .page-link {
            color: #9ca3af;
            background-color: #f9fafb;
            cursor: not-allowed;
        }
        
        .dark .pagination-green .page-link {
            background-color: #374151;
            border-color: #4b5563;
            color: #d1d5db;
        }
        
        .dark .pagination-green .page-link:hover {
            background-color: #4b5563;
            border-color: #16a34a;
            color: #16a34a;
        }
        
        .dark .pagination-green .page-item.active .page-link {
            background-color: #16a34a;
            border-color: #16a34a;
            color: white;
        }
    </style>
@endsection
