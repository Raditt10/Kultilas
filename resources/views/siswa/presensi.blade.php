@extends('siswa.layout')

@section('title', 'Presensi Saya')

@section('content')
<div class="mb-6">
    <h2 class="text-3xl font-bold text-gray-800">Riwayat Presensi</h2>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-4 py-3 text-left">Tanggal</th>
                <th class="px-4 py-3 text-left">Eskul</th>
                <th class="px-4 py-3 text-left">Status Hadir</th>
                <th class="px-4 py-3 text-left">Status</th>
                <th class="px-4 py-3 text-left">Catatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($presensi as $p)
                <tr class="border-t">
                    <td class="px-4 py-3">{{ $p->tanggal }}</td>
                    <td class="px-4 py-3">{{ $p->eskul->nama_eskul }}</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 rounded text-xs font-semibold
                            {{ $p->status_hadir == 'hadir' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ ucfirst($p->status_hadir) }}
                        </span>
                    </td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 rounded text-xs font-semibold
                            {{ $p->status == 'diterima' ? 'bg-green-100 text-green-800' : ($p->status == 'ditolak' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                            {{ ucfirst($p->status) }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-sm text-gray-600">{{ $p->catatan ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@if($presensi->isEmpty())
    <div class="text-center py-12 bg-white rounded-lg shadow">
        <p class="text-gray-500 text-lg">Belum ada data presensi.</p>
    </div>
@endif

<div class="mt-4">
    {{ $presensi->links() }}
</div>
@endsection
