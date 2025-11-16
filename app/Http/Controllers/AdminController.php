<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DashboardContent;
use App\Models\Siswa;
use App\Models\Eskul;
use App\Models\PendaftaranEskul;
use App\Models\Prestasi;

class AdminController extends Controller
{
    public function index()
    {
        // Get dashboard content from database
        $newsItems = DashboardContent::where('type', 'news')
            ->where('is_active', true)
            ->where(function($query) {
                $query->whereNull('expires_at')
                      ->orWhere('expires_at', '>', now());
            })
            ->orderBy('order')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        $achievements = DashboardContent::where('type', 'achievement')
            ->where('is_active', true)
            ->where(function($query) {
                $query->whereNull('expires_at')
                      ->orWhere('expires_at', '>', now());
            })
            ->orderBy('order')
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        // Get recent registrations
        $recentRegistrations = PendaftaranEskul::with(['siswa', 'eskul'])
            ->orderBy('tanggal_daftar', 'desc')
            ->take(5)
            ->get();

        // Get statistics
        $stats = [
            'total_siswa' => Siswa::count(),
            'total_eskul' => Eskul::count(),
            'total_pendaftaran' => PendaftaranEskul::count(),
            'total_prestasi' => Prestasi::count(),
            'pendaftaran_baru_hari_ini' => PendaftaranEskul::whereDate('tanggal_daftar', today())->count(),
            'eskul_populer' => Eskul::withCount('pendaftaranEskul')
                ->orderBy('pendaftaran_eskul_count', 'desc')
                ->take(4)
                ->get()
        ];

        return view('dashboards.admin', compact('newsItems', 'achievements', 'recentRegistrations', 'stats'));
    }
}
