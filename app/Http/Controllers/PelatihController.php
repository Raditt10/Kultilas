<?php

namespace App\Http\Controllers;

use App\Models\Eskul;
use App\Models\Presensi;
use App\Models\PendaftaranEskul;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelatihController extends Controller
{
    public function index()
    {
        $pelatih = Auth::user()->nama_lengkap;
        $eskul = Eskul::where('pembina', $pelatih)->get();
        
        return view('dashboards.pelatih', compact('eskul'));
    }

    public function eskulDetail($id)
    {
        $eskul = Eskul::findOrFail($id);
        
        // Pastikan pelatih hanya bisa akses eskul yang dia latih
        if ($eskul->pembina !== Auth::user()->nama_lengkap) {
            abort(403, 'Unauthorized');
        }

        $pendaftaran = PendaftaranEskul::where('id_eskul', $id)
            ->with('siswa')
            ->paginate(10);

        return view('pelatih.eskul-detail', compact('eskul', 'pendaftaran'));
    }

    public function presensi($id)
    {
        $eskul = Eskul::findOrFail($id);
        
        if ($eskul->pembina !== Auth::user()->nama_lengkap) {
            abort(403, 'Unauthorized');
        }

        $presensi = Presensi::where('id_eskul', $id)
            ->with('siswa')
            ->orderBy('tanggal', 'desc')
            ->paginate(15);

        return view('pelatih.presensi', compact('eskul', 'presensi'));
    }

    public function updatePresensi(Request $request, $id)
    {
        $presensi = Presensi::findOrFail($id);
        $eskul = Eskul::findOrFail($presensi->id_eskul);
        
        if ($eskul->pembina !== Auth::user()->nama_lengkap) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'status' => 'required|in:tunda,diterima,ditolak',
            'catatan' => 'nullable|string'
        ]);

        $presensi->update($request->only('status', 'catatan'));

        return redirect()->back()->with('success', 'Presensi berhasil diupdate');
    }

    public function prestasi($id)
    {
        $eskul = Eskul::findOrFail($id);
        
        if ($eskul->pembina !== Auth::user()->nama_lengkap) {
            abort(403, 'Unauthorized');
        }

        $prestasi = Prestasi::whereHas('pendaftaran', function($q) use ($id) {
            $q->where('id_eskul', $id);
        })->with(['pendaftaran.siswa'])->paginate(10);

        return view('pelatih.prestasi', compact('eskul', 'prestasi'));
    }
}
