@extends('siswa.layout')

@section('title', 'Prestasi Saya')

@section('content')
<div class="mb-6">
    <h2 class="text-3xl font-bold text-gray-800">Prestasi Saya</h2>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    @foreach($prestasi as $p)
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex justify-between items-start mb-3">
                <h3 class="text-xl font-bold">{{ $p->nama_prestasi }}</h3>
                <span class="px-3 py-1 rounded-full text-xs font-semibold bg-purple-100 text-purple-800">
                    {{ ucfirst($p->tingkat) }}
                </span>
            </div>
            
            <p class="text-gray-600 mb-2"><strong>Eskul:</strong> {{ $p->pendaftaran->eskul->nama_eskul }}</p>
            <p class="text-gray-600 mb-2"><strong>Tanggal:</strong> {{ date('d F Y', strtotime($p->tanggal)) }}</p>
            
            @if($p->deskripsi)
                <p class="text-gray-700 mt-3">{{ $p->deskripsi }}</p>
            @endif
        </div>
    @endforeach
</div>

@if($prestasi->isEmpty())
    <div class="text-center py-12 bg-white rounded-lg shadow">
        <p class="text-gray-500 text-lg">Belum ada prestasi yang tercatat.</p>
        <p class="text-gray-400 mt-2">Terus berprestasi dan raih kesuksesan!</p>
    </div>
@endif
@endsection
