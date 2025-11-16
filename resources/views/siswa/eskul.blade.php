@extends('siswa.layout')

@section('title', 'Daftar Ekstrakurikuler')

@section('content')
<div class="mb-6">
    <h2 class="text-3xl font-bold text-gray-800">Daftar Ekstrakurikuler</h2>
    <p class="text-gray-600">Pilih ekstrakurikuler yang ingin Anda ikuti</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($eskul as $e)
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="p-6">
                <h3 class="text-xl font-bold mb-2">{{ $e->nama_eskul }}</h3>
                <p class="text-gray-600 text-sm mb-3">{{ Str::limit($e->deskripsi, 100) }}</p>
                
                <div class="space-y-1 text-sm mb-4">
                    <p><strong>Pembina:</strong> {{ $e->pembina }}</p>
                    <p><strong>Jadwal:</strong> {{ $e->hari_kegiatan }}</p>
                    <p><strong>Waktu:</strong> {{ $e->jam_mulai }} - {{ $e->jam_selesai }}</p>
                    <p><strong>Lokasi:</strong> {{ $e->lokasi }}</p>
                    @if($e->kuota)
                        <p><strong>Kuota:</strong> {{ $e->kuota }} orang</p>
                    @endif
                </div>

                @if(in_array($e->id_eskul, $pendaftaran))
                    <button disabled class="w-full bg-gray-300 text-gray-600 py-2 rounded cursor-not-allowed">
                        Sudah Terdaftar
                    </button>
                @else
                    <form action="{{ route('siswa.eskul.daftar', $e->id_eskul) }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                            Daftar
                        </button>
                    </form>
                @endif
            </div>
        </div>
    @endforeach
</div>

@if($eskul->isEmpty())
    <div class="text-center py-12">
        <p class="text-gray-500 text-lg">Belum ada ekstrakurikuler tersedia.</p>
    </div>
@endif
@endsection
