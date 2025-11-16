@extends('layouts.admin')

@section('title', 'Kelola Pendaftaran - Admin Panel')
@section('page-title', 'Kelola Pendaftaran')

@section('content')
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-orange-700 to-orange-900 dark:from-gray-800 dark:to-gray-900 rounded-xl shadow-lg p-6 mb-8">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <div class="bg-white/20 p-3 rounded-lg mr-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="font-bold text-2xl text-white leading-tight">Kelola Pendaftaran</h2>
                    <p class="text-orange-100 dark:text-gray-300 text-sm mt-1">Manajemen pendaftaran dan status keikutsertaan siswa</p>
                </div>
            </div>
            <a href="{{ route('admin.pendaftaran.create') }}" 
               class="bg-white/20 hover:bg-white/30 text-white px-6 py-3 rounded-lg font-semibold transition-all flex items-center shadow-lg">
                <i class="fas fa-plus mr-2"></i>
                Tambah Pendaftaran
            </a>
        </div>
    </div>

    <!-- Content Container -->
    <div class="space-y-8">
        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-50 dark:bg-green-900 border border-green-200 dark:border-green-700 text-green-800 dark:text-green-200 px-6 py-4 rounded-xl mb-6 flex items-center shadow-lg">
                <i class="fas fa-check-circle mr-3 text-green-600 dark:text-green-400"></i>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Data Table -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gradient-to-r from-green-50 to-green-100 dark:from-gray-900 dark:to-gray-800">
                        <tr>
                            <th class="px-8 py-4 text-left text-xs font-bold text-green-800 dark:text-green-300 uppercase tracking-wider">
                                Siswa
                            </th>
                            <th class="px-8 py-4 text-left text-xs font-bold text-green-800 dark:text-green-300 uppercase tracking-wider">
                                Ekstrakurikuler
                            </th>
                            <th class="px-8 py-4 text-left text-xs font-bold text-green-800 dark:text-green-300 uppercase tracking-wider">
                                Tanggal Daftar
                            </th>
                            <th class="px-8 py-4 text-left text-xs font-bold text-green-800 dark:text-green-300 uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-8 py-4 text-left text-xs font-bold text-green-800 dark:text-green-300 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse($pendaftaran as $p)
                                <tr class="hover:bg-green-50 dark:hover:bg-gray-700 transition-all duration-200">
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="bg-gradient-to-br from-green-400 to-green-600 p-3 rounded-full mr-4 shadow-lg">
                                                <span class="text-sm font-bold text-white">{{ substr($p->siswa->nama_siswa, 0, 1) }}</span>
                                            </div>
                                            <div>
                                                <div class="text-sm font-semibold text-gray-900 dark:text-white">{{ $p->siswa->nama_siswa }}</div>
                                                <div class="text-sm text-gray-500 dark:text-gray-400">
                                                    NIS: {{ $p->siswa->nis }} • Kelas {{ $p->siswa->kelas }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="bg-green-100 dark:bg-green-900 p-2 rounded-full mr-3">
                                                <svg class="w-4 h-4 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <div class="text-sm font-semibold text-gray-900 dark:text-white">{{ $p->eskul->nama_eskul }}</div>
                                                <div class="text-sm text-gray-500 dark:text-gray-400">Pembina: {{ $p->eskul->pembina }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ date('d M Y', strtotime($p->tanggal_daftar)) }}</div>
                                        <div class="text-xs text-gray-500 dark:text-gray-400">{{ date('l', strtotime($p->tanggal_daftar)) }}</div>
                                    </td>
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        @php
                                            $statusConfig = match($p->status) {
                                                'diterima' => ['class' => 'bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100 border border-green-300 dark:border-green-600', 'icon' => 'M5 13l4 4L19 7'],
                                                'ditolak' => ['class' => 'bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100 border border-red-300 dark:border-red-600', 'icon' => 'M6 18L18 6M6 6l12 12'],
                                                'tunda' => ['class' => 'bg-gray-200 text-gray-900 dark:bg-gray-700 dark:text-white border border-gray-400 dark:border-gray-500', 'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
                                                default => ['class' => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-100 border border-gray-300 dark:border-gray-600', 'icon' => 'M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z']
                                            };
                                        @endphp
                                        <span class="inline-flex items-center px-3 py-2 text-xs font-semibold rounded-full {{ $statusConfig['class'] }}">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $statusConfig['icon'] }}"></path>
                                            </svg>
                                            {{ ucfirst($p->status) }}
                                        </span>
                                    </td>
                                    <td class="px-8 py-6 whitespace-nowrap text-sm font-medium">
                                        <div class="flex justify-center space-x-3">
                                            <a href="{{ route('admin.pendaftaran.edit', $p->id_pendaftaran) }}" 
                                               class="bg-green-100 hover:bg-green-200 text-green-700 p-2 rounded-lg transition-all duration-200 shadow-sm" title="Edit Status">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </a>
                                            <form action="{{ route('admin.pendaftaran.destroy', $p->id_pendaftaran) }}" 
                                                  method="POST" class="inline" 
                                                  onsubmit="return confirm('Yakin ingin menghapus data pendaftaran ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="bg-red-100 hover:bg-red-200 text-red-700 p-2 rounded-lg transition-all duration-200 shadow-sm" title="Hapus">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
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
                                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                </svg>
                                            </div>
                                            <p class="text-xl font-semibold mb-2">Belum ada data pendaftaran</p>
                                            <p class="text-sm text-gray-400">Data pendaftaran siswa akan muncul di sini setelah ada yang mendaftar</p>
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
                    Menampilkan {{ $pendaftaran->firstItem() ?? 0 }} - {{ $pendaftaran->lastItem() ?? 0 }} dari {{ $pendaftaran->total() }} pendaftaran
                </div>
                <div class="pagination-orange">
                    {{ $pendaftaran->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Custom Styles for Orange Theme -->
    <style>
        .pagination-orange .pagination {
            display: flex;
            gap: 0.25rem;
        }
        
        .pagination-orange .page-link {
            background-color: white;
            border: 1px solid #d1d5db;
            color: #374151;
            padding: 0.5rem 0.75rem;
            border-radius: 0.5rem;
            text-decoration: none;
            transition: all 0.2s;
        }
        
        .pagination-orange .page-link:hover {
            background-color: #f3f4f6;
            border-color: #ea580c;
            color: #ea580c;
        }
        
        .pagination-orange .page-item.active .page-link {
            background-color: #ea580c;
            border-color: #ea580c;
            color: white;
        }
        
        .pagination-orange .page-item.disabled .page-link {
            color: #9ca3af;
            background-color: #f9fafb;
            cursor: not-allowed;
        }
        
        .dark .pagination-orange .page-link {
            background-color: #374151;
            border-color: #4b5563;
            color: #d1d5db;
        }
        
        .dark .pagination-orange .page-link:hover {
            background-color: #4b5563;
            border-color: #ea580c;
            color: #ea580c;
        }
        
        .dark .pagination-orange .page-item.active .page-link {
            background-color: #ea580c;
            border-color: #ea580c;
            color: white;
        }
    </style>
@endsection
