@extends('layouts.admin')

@section('title', 'Kelola Prestasi Siswa - Admin Panel')
@section('page-title', 'Kelola Prestasi Siswa')

@section('content')
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-green-700 to-green-900 dark:from-gray-800 dark:to-gray-900 rounded-xl shadow-lg p-6 mb-8">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <div class="bg-white/20 p-3 rounded-lg mr-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="font-bold text-2xl text-white leading-tight">🏆 Kelola Prestasi Siswa</h2>
                    <p class="text-green-100 dark:text-gray-300 text-sm mt-1">Kelola pencapaian dan penghargaan siswa ekstrakurikuler</p>
                </div>
            </div>
            <a href="{{ route('admin.prestasi.create') }}" 
               class="bg-white/20 hover:bg-white/30 text-white px-6 py-3 rounded-lg font-semibold transition-all flex items-center shadow-lg">
                <i class="fas fa-plus mr-2"></i>
                Tambah Prestasi
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
                        <i class="fas fa-trophy text-2xl text-green-600 dark:text-green-400"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600 dark:text-gray-400 font-medium">Total Prestasi</p>
                        <p class="text-2xl font-bold text-green-800 dark:text-green-100">{{ $prestasi->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg border-l-4 border-red-500 hover:shadow-xl transition-shadow">
                <div class="flex items-center">
                    <div class="p-3 bg-red-50 dark:bg-red-900 rounded-xl">
                        <i class="fas fa-flag text-2xl text-red-600 dark:text-red-400"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600 dark:text-gray-400 font-medium">Nasional</p>
                        <p class="text-2xl font-bold text-green-800 dark:text-green-100">{{ $prestasi->where('tingkat', 'nasional')->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg border-l-4 border-green-500 hover:shadow-xl transition-shadow">
                <div class="flex items-center">
                    <div class="p-3 bg-green-50 dark:bg-green-900 rounded-xl">
                        <i class="fas fa-medal text-2xl text-green-600 dark:text-green-400"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600 dark:text-gray-400 font-medium">Provinsi</p>
                        <p class="text-2xl font-bold text-green-800 dark:text-green-100">{{ $prestasi->where('tingkat', 'provinsi')->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg border-l-4 border-blue-500 hover:shadow-xl transition-shadow">
                <div class="flex items-center">
                    <div class="p-3 bg-blue-50 dark:bg-blue-900 rounded-xl">
                        <i class="fas fa-star text-2xl text-blue-600 dark:text-blue-400"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600 dark:text-gray-400 font-medium">Kota/Kabupaten</p>
                        <p class="text-2xl font-bold text-green-800 dark:text-green-100">{{ $prestasi->where('tingkat', 'kota')->count() }}</p>
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
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Daftar Prestasi</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">Kelola data prestasi siswa ekstrakurikuler</p>
                </div>
                <a href="{{ route('admin.prestasi.create') }}" 
                   class="bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white px-6 py-3 rounded-xl font-semibold transition-all transform hover:scale-105 shadow-lg flex items-center">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah Prestasi Baru
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
                                Siswa
                            </th>
                            <th class="px-8 py-4 text-left text-xs font-bold text-green-800 dark:text-green-300 uppercase tracking-wider">
                                Prestasi
                            </th>
                            <th class="px-8 py-4 text-left text-xs font-bold text-green-800 dark:text-green-300 uppercase tracking-wider">
                                Tingkat
                            </th>
                            <th class="px-8 py-4 text-left text-xs font-bold text-green-800 dark:text-green-300 uppercase tracking-wider">
                                Tanggal
                            </th>
                            <th class="px-8 py-4 text-left text-xs font-bold text-green-800 dark:text-green-300 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($prestasi as $p)
                            <tr class="hover:bg-green-50 dark:hover:bg-gray-700 transition-all duration-200">
                                <td class="px-8 py-6 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="bg-gradient-to-br from-green-400 to-green-600 p-3 rounded-full mr-4 shadow-lg">
                                            <span class="text-sm font-bold text-white">{{ substr($p->pendaftaran->siswa->nama_siswa, 0, 1) }}</span>
                                        </div>
                                        <div>
                                            <div class="text-sm font-semibold text-gray-900 dark:text-white">
                                                {{ $p->pendaftaran->siswa->nama_siswa }}
                                            </div>
                                            <div class="text-sm text-gray-500 dark:text-gray-400">
                                                NIS: {{ $p->pendaftaran->siswa->nis }} | {{ $p->pendaftaran->eskul->nama_eskul }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-6 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="bg-gradient-to-br from-yellow-400 to-yellow-600 p-3 rounded-full mr-4 shadow-lg">
                                            <i class="fas fa-trophy text-white"></i>
                                        </div>
                                        <div>
                                            <div class="text-sm font-semibold text-gray-900 dark:text-white">
                                                {{ $p->nama_prestasi }}
                                            </div>
                                            <div class="text-sm text-gray-500 dark:text-gray-400">
                                                {{ $p->deskripsi ? Str::limit($p->deskripsi, 50) : 'Tidak ada deskripsi' }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-6 whitespace-nowrap">
                                    @php
                                        $badgeColor = match($p->tingkat) {
                                            'nasional' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200 border border-red-200',
                                            'provinsi' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 border border-green-200',
                                            'kota' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200 border border-blue-200',
                                            'sekolah' => 'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200 border border-gray-200',
                                            default => 'bg-teal-100 text-teal-800 dark:bg-teal-900 dark:text-teal-200 border border-teal-200'
                                        };
                                    @endphp
                                    <span class="inline-flex px-4 py-2 text-xs font-semibold rounded-full {{ $badgeColor }}">
                                        {{ ucfirst($p->tingkat) }}
                                    </span>
                                </td>
                                <td class="px-8 py-6 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ date('d M Y', strtotime($p->tanggal)) }}</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">{{ date('l', strtotime($p->tanggal)) }}</div>
                                </td>
                                <td class="px-8 py-6 whitespace-nowrap">
                                    <div class="flex space-x-3">
                                        <a href="{{ route('admin.prestasi.edit', $p->id_prestasi) }}" class="bg-green-100 hover:bg-green-200 text-green-700 p-2 rounded-lg transition-all duration-200 shadow-sm" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.prestasi.destroy', $p->id_prestasi) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-100 hover:bg-red-200 text-red-700 p-2 rounded-lg transition-all duration-200 shadow-sm" onclick="return confirm('Hapus data ini?')" title="Hapus">
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
                                            <i class="fas fa-trophy text-4xl text-gray-400"></i>
                                        </div>
                                        <p class="text-xl font-semibold mb-2">Belum ada data prestasi</p>
                                        <p class="text-sm text-gray-400 mb-6">Silakan tambah prestasi baru untuk memulai</p>
                                        <a href="{{ route('admin.prestasi.create') }}" 
                                           class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold transition-all flex items-center">
                                            <i class="fas fa-plus mr-2"></i>
                                            Tambah Prestasi Pertama
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                        </table>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 mt-8">
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                <div class="text-sm text-gray-700 dark:text-gray-300 font-medium">
                    Menampilkan {{ $prestasi->firstItem() ?? 0 }} - {{ $prestasi->lastItem() ?? 0 }} dari {{ $prestasi->total() }} prestasi
                </div>
                <div class="pagination-green">
                    {{ $prestasi->links() }}
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
