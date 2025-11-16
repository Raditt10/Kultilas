<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Presensi;
use App\Models\Siswa;
use App\Models\Eskul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PresensiController extends Controller
{
    public function index(Request $request)
    {
        $query = Presensi::with(['siswa', 'eskul']);

        // Filter berdasarkan eskul
        if ($request->filled('eskul')) {
            $query->where('id_eskul', $request->eskul);
        }

        // Filter berdasarkan tanggal
        if ($request->filled('tanggal')) {
            $query->whereDate('tanggal', $request->tanggal);
        }

        // Filter berdasarkan status
        if ($request->filled('status')) {
            $query->where('status_hadir', $request->status);
        }

        $presensi = $query->orderBy('tanggal', 'desc')
                         ->orderBy('id_eskul')
                         ->paginate(15);

        $eskul = Eskul::orderBy('nama_eskul')->get();
        
        // Statistics
        $stats = [
            'total' => Presensi::count(),
            'hadir' => Presensi::where('status_hadir', 'hadir')->count(),
            'izin' => Presensi::where('status_hadir', 'izin')->count(),
            'sakit' => Presensi::where('status_hadir', 'sakit')->count(),
            'alpa' => Presensi::where('status_hadir', 'alpa')->count(),
        ];

        return view('admin.presensi.index', compact('presensi', 'eskul', 'stats'));
    }

    public function create()
    {
        $eskul = Eskul::orderBy('nama_eskul')->get();
        return view('admin.presensi.create', compact('eskul'));
    }

    public function show($id)
    {
        $presensi = Presensi::with(['siswa', 'eskul'])->findOrFail($id);
        return view('admin.presensi.show', compact('presensi'));
    }

    public function getSiswaByEskul(Request $request)
    {
        $siswa = DB::table('pendaftaran_eskul')
            ->join('siswa', 'pendaftaran_eskul.id_siswa', '=', 'siswa.id_siswa')
            ->where('pendaftaran_eskul.id_eskul', $request->id_eskul)
            ->where('pendaftaran_eskul.status_pendaftaran', 'diterima')
            ->select('siswa.id_siswa', 'siswa.nama_siswa', 'siswa.kelas')
            ->orderBy('siswa.nama_siswa')
            ->get();

        return response()->json($siswa);
    }

    public function store(Request $request)
    {
        // Check if this is a bulk create (array format) or single create
        if ($request->has('siswa') && is_array($request->siswa)) {
            // Bulk create logic (existing logic)
            return $this->storeBulk($request);
        } else {
            // Single create logic
            return $this->storeSingle($request);
        }
    }
    
    private function storeBulk(Request $request)
    {
        $validated = $request->validate([
            'id_eskul' => 'required|exists:eskul,id_eskul',
            'tanggal' => 'required|date',
            'siswa' => 'required|array|min:1',
            'siswa.*.id_siswa' => 'required|exists:siswa,id_siswa',
            'siswa.*.status_hadir' => 'required|in:hadir,izin,sakit,alpa',
            'siswa.*.catatan' => 'nullable|string|max:255',
        ]);

        DB::beginTransaction();
        try {
            foreach ($validated['siswa'] as $siswaData) {
                // Check if presensi already exists for this date, eskul, and siswa
                $existingPresensi = Presensi::where([
                    'id_siswa' => $siswaData['id_siswa'],
                    'id_eskul' => $validated['id_eskul'],
                    'tanggal' => $validated['tanggal']
                ])->first();

                if ($existingPresensi) {
                    // Update existing presensi
                    $existingPresensi->update([
                        'status_hadir' => $siswaData['status_hadir'],
                        'catatan' => $siswaData['catatan'] ?? null,
                    ]);
                } else {
                    // Create new presensi
                    Presensi::create([
                        'id_siswa' => $siswaData['id_siswa'],
                        'id_eskul' => $validated['id_eskul'],
                        'tanggal' => $validated['tanggal'],
                        'status_hadir' => $siswaData['status_hadir'],
                        'catatan' => $siswaData['catatan'] ?? null,
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('admin.presensi.index')->with('success', 'Data presensi berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data presensi');
        }
    }
    
    private function storeSingle(Request $request)
    {
        $validated = $request->validate([
            'id_siswa' => 'required|exists:siswa,id_siswa',
            'id_eskul' => 'required|exists:eskul,id_eskul',
            'tanggal' => 'required|date',
            'status_hadir' => 'required|in:hadir,izin,sakit,alpa',
            'status' => 'required|in:tunda,diterima,ditolak',
            'catatan' => 'nullable|string|max:255',
        ]);

        // Check if presensi already exists for this date, eskul, and siswa
        $existingPresensi = Presensi::where([
            'id_siswa' => $validated['id_siswa'],
            'id_eskul' => $validated['id_eskul'],
            'tanggal' => $validated['tanggal']
        ])->first();

        if ($existingPresensi) {
            return redirect()->back()->with('error', 'Presensi untuk siswa ini pada tanggal dan eskul yang sama sudah ada');
        }

        try {
            Presensi::create([
                'id_siswa' => $validated['id_siswa'],
                'id_eskul' => $validated['id_eskul'],
                'tanggal' => $validated['tanggal'],
                'status_hadir' => $validated['status_hadir'],
                'status' => $validated['status'],
                'catatan' => $validated['catatan'],
            ]);

            return redirect()->route('admin.presensi.index')->with('success', 'Data presensi berhasil disimpan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data presensi: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $presensi = Presensi::with(['siswa', 'eskul'])->findOrFail($id);
        return view('admin.presensi.edit', compact('presensi'));
    }

    public function update(Request $request, $id)
    {
        $presensi = Presensi::findOrFail($id);
        
        $validated = $request->validate([
            'id_siswa' => 'required|exists:siswa,id_siswa',
            'id_eskul' => 'required|exists:eskul,id_eskul',
            'tanggal' => 'required|date',
            'status_hadir' => 'required|in:hadir,izin,sakit,alpa',
            'status' => 'required|in:tunda,diterima,ditolak',
            'catatan' => 'nullable|string|max:255',
        ]);

        // Check if another presensi already exists for this combination (except current record)
        $existingPresensi = Presensi::where([
            'id_siswa' => $validated['id_siswa'],
            'id_eskul' => $validated['id_eskul'],
            'tanggal' => $validated['tanggal']
        ])->where('id_presensi', '!=', $id)->first();

        if ($existingPresensi) {
            return redirect()->back()->with('error', 'Presensi untuk siswa ini pada tanggal dan eskul yang sama sudah ada');
        }

        try {
            $presensi->update($validated);
            return redirect()->route('admin.presensi.index')->with('success', 'Data presensi berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data presensi: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $presensi = Presensi::findOrFail($id);
        $presensi->delete();
        return redirect()->route('admin.presensi.index')->with('success', 'Presensi berhasil dihapus');
    }
}
