@extends('layouts.admin')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-green-50 to-emerald-100 dark:from-gray-900 dark:to-gray-800 py-8">
    <!-- Header -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-8">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-green-100 dark:border-gray-700 p-6">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-4 md:space-y-0">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white flex items-center">
                        <svg class="w-8 h-8 mr-3 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Kelola Presensi
                    </h1>
                    <p class="text-gray-600 dark:text-gray-400 mt-2">Manajemen kehadiran siswa ekstrakurikuler</p>
                </div>
                <a href="{{ route('admin.presensi.create') }}" 
                   class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-medium transition-colors duration-200 flex items-center gap-2 shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Tambah Presensi
                </a>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-50 dark:bg-green-900 border border-green-200 dark:border-green-700 text-green-800 dark:text-green-200 px-6 py-4 rounded-xl mb-6 flex items-center shadow-lg">
                <svg class="w-5 h-5 mr-3 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
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
                                Tanggal
                            </th>
                            <th class="px-8 py-4 text-left text-xs font-bold text-green-800 dark:text-green-300 uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-8 py-4 text-left text-xs font-bold text-green-800 dark:text-green-300 uppercase tracking-wider">
                                Catatan
                            </th>
                            <th class="px-8 py-4 text-left text-xs font-bold text-green-800 dark:text-green-300 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($presensi as $p)
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
                                    <div class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ date('d M Y', strtotime($p->tanggal)) }}</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">{{ date('l', strtotime($p->tanggal)) }}</div>
                                </td>
                                <td class="px-8 py-6 whitespace-nowrap">
                                    @php
                                        $statusConfig = match($p->status_hadir) {
                                            'hadir' => ['bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200', 'Hadir'],
                                            'izin' => ['bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200', 'Izin'],
                                            'sakit' => ['bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-200', 'Sakit'],
                                            'alpa' => ['bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200', 'Alpa'],
                                            default => ['bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200', 'Unknown']
                                        };
                                    @endphp
                                    <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full {{ $statusConfig[0] }}">
                                        {{ $statusConfig[1] }}
                                    </span>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="text-sm text-gray-900 dark:text-gray-100 max-w-xs truncate">
                                        {{ $p->catatan ?: '-' }}
                                    </div>
                                </td>
                                <td class="px-8 py-6 whitespace-nowrap text-sm font-medium">
                                    <div class="flex items-center space-x-3">
                                        <a href="{{ route('admin.presensi.show', $p->id_presensi) }}" 
                                           class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 transition-colors duration-200"
                                           title="Lihat Detail">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </a>
                                        <a href="{{ route('admin.presensi.edit', $p->id_presensi) }}" 
                                           class="text-green-600 hover:text-green-900 dark:text-green-400 dark:hover:text-green-300 transition-colors duration-200"
                                           title="Edit">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                        </a>
                                        <form action="{{ route('admin.presensi.destroy', $p->id_presensi) }}" method="POST" class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                            <button type="submit" 
                                                    onclick="return confirm('Yakin ingin menghapus data presensi ini?')"
                                                    class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 transition-colors duration-200"
                                                    title="Hapus">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-8 py-12 text-center text-gray-500 dark:text-gray-400">
                                    <div class="flex flex-col items-center">
                                        <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-full mb-6">
                                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <p class="text-xl font-semibold mb-2">Belum ada data presensi</p>
                                        <p class="text-sm text-gray-400">Data presensi siswa akan muncul di sini setelah ditambahkan</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        @if($presensi->hasPages())
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 mt-8">
                <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                    <div class="text-sm text-gray-700 dark:text-gray-300">
                        <span class="font-medium">Menampilkan {{ $presensi->firstItem() ?? 0 }} - {{ $presensi->lastItem() ?? 0 }}</span>
                        dari <span class="font-medium">{{ $presensi->total() }}</span> presensi
                    </div>
                    <div>
                        {{ $presensi->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
