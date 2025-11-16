<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Eskul;
use App\Models\PendaftaranEskul;
use App\Models\Presensi;
use App\Models\Prestasi;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        return view('siswa.index');
    }

    public function register()
    {
        return view('siswa.register');
    }

    public function storeRegister(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:siswa,nis',
            'nama_siswa' => 'required|string|max:100',
            'kelas' => 'nullable|string|max:20',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable|string',
            'no_telp' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:100',
        ]);

        Siswa::create($request->all());

        return redirect()->route('siswa.login')->with('success', 'Registrasi berhasil! Silakan login dengan NIS Anda.');
    }

    public function login()
    {
        return view('siswa.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'nis' => 'required',
        ]);

        $siswa = Siswa::where('nis', $request->nis)->first();

        if (!$siswa) {
            return back()->withErrors(['nis' => 'NIS tidak ditemukan'])->withInput();
        }

        session(['siswa_id' => $siswa->id_siswa, 'siswa_name' => $siswa->nama_siswa]);

        return redirect()->route('siswa.dashboard');
    }

    public function dashboard()
    {
        if (!session('siswa_id')) {
            return redirect()->route('siswa.login');
        }

        $siswa = Siswa::findOrFail(session('siswa_id'));
        $pendaftaran = PendaftaranEskul::where('id_siswa', $siswa->id_siswa)
            ->with('eskul')
            ->get();

        return view('siswa.dashboard', compact('siswa', 'pendaftaran'));
    }

    public function eskul()
    {
        if (!session('siswa_id')) {
            return redirect()->route('siswa.login');
        }

        $siswa = Siswa::findOrFail(session('siswa_id'));
        $eskul = Eskul::all();
        $pendaftaran = PendaftaranEskul::where('id_siswa', $siswa->id_siswa)
            ->pluck('id_eskul')
            ->toArray();

        return view('siswa.eskul', compact('eskul', 'pendaftaran'));
    }

    public function daftarEskul(Request $request, $id)
    {
        if (!session('siswa_id')) {
            return redirect()->route('siswa.login');
        }

        $siswa_id = session('siswa_id');

        $exists = PendaftaranEskul::where('id_siswa', $siswa_id)
            ->where('id_eskul', $id)
            ->exists();

        if ($exists) {
            return back()->with('error', 'Anda sudah mendaftar eskul ini!');
        }

        PendaftaranEskul::create([
            'id_siswa' => $siswa_id,
            'id_eskul' => $id,
            'tanggal_daftar' => now()->format('Y-m-d'),
            'status' => 'tunda',
        ]);

        return back()->with('success', 'Pendaftaran berhasil! Menunggu persetujuan.');
    }

    public function presensi()
    {
        if (!session('siswa_id')) {
            return redirect()->route('siswa.login');
        }

        $siswa_id = session('siswa_id');
        $presensi = Presensi::where('id_siswa', $siswa_id)
            ->with('eskul')
            ->orderBy('tanggal', 'desc')
            ->paginate(15);

        return view('siswa.presensi', compact('presensi'));
    }

    public function prestasi()
    {
        if (!session('siswa_id')) {
            return redirect()->route('siswa.login');
        }

        $siswa_id = session('siswa_id');
        $prestasi = Prestasi::whereHas('pendaftaran', function($q) use ($siswa_id) {
            $q->where('id_siswa', $siswa_id);
        })->with(['pendaftaran.eskul'])->get();

        return view('siswa.prestasi', compact('prestasi'));
    }

    public function profile()
    {
        if (!session('siswa_id')) {
            return redirect()->route('siswa.login');
        }

        $siswa = Siswa::findOrFail(session('siswa_id'));
        return view('siswa.profile', compact('siswa'));
    }

    public function updateProfile(Request $request)
    {
        if (!session('siswa_id')) {
            return redirect()->route('siswa.login');
        }

        $siswa = Siswa::findOrFail(session('siswa_id'));

        $request->validate([
            'nama_siswa' => 'required|string|max:100',
            'kelas' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'no_telp' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:100',
        ]);

        $siswa->update($request->only(['nama_siswa', 'kelas', 'alamat', 'no_telp', 'email']));

        return back()->with('success', 'Profil berhasil diupdate!');
    }

    public function logout()
    {
        session()->forget(['siswa_id', 'siswa_name']);
        return redirect()->route('siswa.login')->with('success', 'Berhasil logout!');
    }
}
