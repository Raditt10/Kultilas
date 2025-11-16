<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use App\Models\PendaftaranEskul;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasi = Prestasi::with(['pendaftaran.siswa','pendaftaran.eskul'])
            ->orderBy('tanggal', 'desc')
            ->paginate(20);
        return view('admin.prestasi.index', compact('prestasi'));
    }

    public function create()
    {
        $pendaftaran = PendaftaranEskul::with(['siswa','eskul'])->get();
        return view('admin.prestasi.create', compact('pendaftaran'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pendaftaran' => 'required|exists:pendaftaran_eskul,id_pendaftaran',
            'nama_prestasi' => 'required|max:100',
            'tingkat' => 'required|in:sekolah,kecamatan,kabupaten,provinsi,nasional,internasional',
            'tanggal' => 'required|date',
            'deskripsi' => 'nullable',
        ]);

        Prestasi::create($validated);
        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $prestasi = Prestasi::with(['pendaftaran.siswa','pendaftaran.eskul'])->findOrFail($id);
        $pendaftaran = PendaftaranEskul::with(['siswa','eskul'])->get();
        return view('admin.prestasi.edit', compact('prestasi','pendaftaran'));
    }

    public function update(Request $request, $id)
    {
        $prestasi = Prestasi::findOrFail($id);
        $validated = $request->validate([
            'id_pendaftaran' => 'required|exists:pendaftaran_eskul,id_pendaftaran',
            'nama_prestasi' => 'required|max:100',
            'tingkat' => 'required|in:sekolah,kecamatan,kabupaten,provinsi,nasional,internasional',
            'tanggal' => 'required|date',
            'deskripsi' => 'nullable',
        ]);

        $prestasi->update($validated);
        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil diubah');
    }

    public function destroy($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        $prestasi->delete();
        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil dihapus');
    }
}
