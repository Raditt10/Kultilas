<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PendaftaranEskul;
use App\Models\Siswa;
use App\Models\Eskul;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index()
    {
        $pendaftaran = PendaftaranEskul::with(['siswa','eskul'])
            ->orderBy('tanggal_daftar', 'desc')
            ->paginate(20);
        return view('admin.pendaftaran.index', compact('pendaftaran'));
    }

    public function create()
    {
        $siswa = Siswa::orderBy('nama_siswa')->get();
        $eskul = Eskul::orderBy('nama_eskul')->get();
        return view('admin.pendaftaran.create', compact('siswa', 'eskul'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_siswa' => 'required|exists:siswa,id_siswa',
            'id_eskul' => 'required|exists:eskul,id_eskul',
            'tanggal_daftar' => 'required|date',
            'status' => 'required|in:pending,diterima,ditolak',
            'keterangan' => 'nullable|string',
        ]);

        PendaftaranEskul::create($validated);
        return redirect()->route('admin.pendaftaran.index')->with('success', 'Pendaftaran berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pendaftaran = PendaftaranEskul::with(['siswa','eskul'])->findOrFail($id);
        return view('admin.pendaftaran.edit', compact('pendaftaran'));
    }

    public function update(Request $request, $id)
    {
        $pendaftaran = PendaftaranEskul::findOrFail($id);
        $validated = $request->validate([
            'status' => 'required|in:pending,diterima,ditolak',
            'keterangan' => 'nullable|string',
        ]);

        $pendaftaran->update($validated);
        return redirect()->route('admin.pendaftaran.index')->with('success', 'Status pendaftaran berhasil diubah');
    }

    public function destroy($id)
    {
        $pendaftaran = PendaftaranEskul::findOrFail($id);
        $pendaftaran->delete();
        return redirect()->route('admin.pendaftaran.index')->with('success', 'Pendaftaran berhasil dihapus');
    }
}
