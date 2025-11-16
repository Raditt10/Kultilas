<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Eskul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EskulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eskuls = Eskul::orderBy('nama_eskul')->paginate(10);
        
        // Get statistics from database
        $totalEskul = Eskul::count();
        $totalPembina = Eskul::distinct('pembina')->count('pembina');
        $totalSiswa = \App\Models\Siswa::count();
        $totalPendaftaran = \App\Models\PendaftaranEskul::where('status', 'diterima')->count();
        $pesertaAktif = \App\Models\PendaftaranEskul::where('status', 'diterima')->count();
        $kegiatanMingguIni = $totalEskul; // Semua eskul dianggap aktif minggu ini
        
        return view('admin.eskul.index', compact('eskuls', 'totalEskul', 'totalPembina', 'totalSiswa', 'totalPendaftaran', 'pesertaAktif', 'kegiatanMingguIni'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.eskul.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_eskul' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'pembina' => 'required|string|max:100',
            'hari_kegiatan' => 'required|string|max:50',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'lokasi' => 'required|string|max:100',
            'kuota' => 'required|integer|min:1',
            'foto_eskul' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->all();

        // Handle file upload
        if ($request->hasFile('foto_eskul')) {
            $file = $request->file('foto_eskul');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/eskul'), $filename);
            $data['foto_eskul'] = $filename;
        }

        Eskul::create($data);

        return redirect()->route('admin.eskul.index')
            ->with('success', 'Ekstrakurikuler berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Eskul $eskul)
    {
        return view('admin.eskul.show', compact('eskul'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Eskul $eskul)
    {
        return view('admin.eskul.edit', compact('eskul'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Eskul $eskul)
    {
        $request->validate([
            'nama_eskul' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'pembina' => 'required|string|max:100',
            'hari_kegiatan' => 'required|string|max:50',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'lokasi' => 'required|string|max:100',
            'kuota' => 'required|integer|min:1',
            'foto_eskul' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->all();

        // Handle file upload
        if ($request->hasFile('foto_eskul')) {
            // Delete old file if exists
            if ($eskul->foto_eskul && file_exists(public_path('images/eskul/' . $eskul->foto_eskul))) {
                unlink(public_path('images/eskul/' . $eskul->foto_eskul));
            }

            $file = $request->file('foto_eskul');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/eskul'), $filename);
            $data['foto_eskul'] = $filename;
        }

        $eskul->update($data);

        return redirect()->route('admin.eskul.index')
            ->with('success', 'Ekstrakurikuler berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Eskul $eskul)
    {
        // Delete photo if exists
        if ($eskul->foto_eskul && file_exists(public_path('images/eskul/' . $eskul->foto_eskul))) {
            unlink(public_path('images/eskul/' . $eskul->foto_eskul));
        }

        $eskul->delete();

        return redirect()->route('admin.eskul.index')
            ->with('success', 'Ekstrakurikuler berhasil dihapus');
    }
}