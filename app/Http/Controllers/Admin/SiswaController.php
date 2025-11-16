<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::orderBy('nama_siswa')->paginate(20);
        return view('admin.siswa.index', compact('siswa'));
    }

    public function create()
    {
        return view('admin.siswa.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nis' => 'required|unique:siswa,nis',
            'nama_siswa' => 'required|max:200',
            'kelas' => 'required|max:10',
            'jenis_kelamin' => 'nullable|in:L,P',
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable',
            'no_telp' => 'nullable|max:15',
            'email' => 'nullable|email|max:100',
        ]);

        Siswa::create($validated);
        return redirect()->route('admin.siswa.index')->with('success', 'Siswa berhasil ditambahkan');
    }

    public function show($id)
    {
        $siswa = Siswa::with(['pendaftaranEskul.eskul', 'presensi.eskul', 'prestasi'])->findOrFail($id);
        return view('admin.siswa.show', compact('siswa'));
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('admin.siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);
        $validated = $request->validate([
            'nis' => 'required|unique:siswa,nis,'.$id.',id_siswa',
            'nama_siswa' => 'required|max:200',
            'kelas' => 'required|max:10',
            'jenis_kelamin' => 'nullable|in:L,P',
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable',
            'no_telp' => 'nullable|max:15',
            'email' => 'nullable|email|max:100',
        ]);

        $siswa->update($validated);
        return redirect()->route('admin.siswa.index')->with('success', 'Siswa berhasil diubah');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
        return redirect()->route('admin.siswa.index')->with('success', 'Siswa berhasil dihapus');
    }
}
