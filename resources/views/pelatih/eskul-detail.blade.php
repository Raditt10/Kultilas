<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detail Eskul: {{ $eskul->nama_eskul }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="font-bold text-lg mb-2">{{ $eskul->nama_eskul }}</h3>
                    <p class="mb-2"><strong>Deskripsi:</strong> {{ $eskul->deskripsi }}</p>
                    <p class="mb-2"><strong>Jadwal:</strong> {{ $eskul->hari_kegiatan }}, {{ $eskul->jam_mulai }} - {{ $eskul->jam_selesai }}</p>
                    <p class="mb-2"><strong>Lokasi:</strong> {{ $eskul->lokasi }}</p>
                    <p class="mb-2"><strong>Kuota:</strong> {{ $eskul->kuota ?? 'Tidak terbatas' }}</p>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="font-bold text-lg mb-4">Daftar Siswa Terdaftar</h3>
                    
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Nama Siswa</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">NIS</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Kelas</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Tanggal Daftar</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($pendaftaran as $p)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $p->siswa->nama_siswa }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $p->siswa->nis }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $p->siswa->kelas }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $p->tanggal_daftar }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $p->status == 'diterima' ? 'bg-green-100 text-green-800' : ($p->status == 'ditolak' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                            {{ ucfirst($p->status) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $pendaftaran->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
