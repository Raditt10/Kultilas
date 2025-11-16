<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Prestasi: {{ $eskul->nama_eskul }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-4">
                        <a href="{{ route('pembina.dashboard') }}" class="text-blue-600 hover:underline">← Kembali</a>
                    </div>

                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Siswa</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Prestasi</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Tingkat</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($prestasi as $p)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $p->pendaftaran->siswa->nama_siswa }}</td>
                                    <td class="px-6 py-4">{{ $p->nama_prestasi }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ ucfirst($p->tingkat) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $p->tanggal }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $prestasi->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
