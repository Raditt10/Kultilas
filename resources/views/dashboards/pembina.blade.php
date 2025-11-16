<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Dashboard Pembina
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Selamat datang, {{ Auth::user()->nama_lengkap }}!</h3>
                    
                    <div class="mb-6">
                        <h4 class="text-md font-semibold mb-3">Ekstrakurikuler yang Anda Bina:</h4>
                        
                        @if($eskul->isEmpty())
                            <p class="text-gray-500">Anda belum ditugaskan untuk membina eskul manapun.</p>
                        @else
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                @foreach($eskul as $e)
                                    <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                                        <h5 class="font-bold text-lg mb-2">{{ $e->nama_eskul }}</h5>
                                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-3">{{ $e->hari_kegiatan }}, {{ $e->jam_mulai }} - {{ $e->jam_selesai }}</p>
                                        <p class="text-sm mb-3">{{ Str::limit($e->deskripsi, 100) }}</p>
                                        
                                        <div class="flex gap-2 flex-wrap">
                                            <a href="{{ route('pembina.eskul.detail', $e->id_eskul) }}" 
                                               class="text-xs px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                                                Detail
                                            </a>
                                            <a href="{{ route('pembina.presensi', $e->id_eskul) }}" 
                                               class="text-xs px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600">
                                                Presensi
                                            </a>
                                            <a href="{{ route('pembina.prestasi', $e->id_eskul) }}" 
                                               class="text-xs px-3 py-1 bg-purple-500 text-white rounded hover:bg-purple-600">
                                                Prestasi
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

