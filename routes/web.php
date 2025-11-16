<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PembinaController;
use App\Http\Controllers\PelatihController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\Admin\SiswaController as AdminSiswaController;
use App\Http\Controllers\Admin\EskulController;
use App\Http\Controllers\Admin\PendaftaranController;
use App\Http\Controllers\Admin\PresensiController;
use App\Http\Controllers\Admin\PrestasiController;
use App\Http\Controllers\Admin\DashboardContentController;
use App\Models\Eskul;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $eskuls = Eskul::all();
    return view('home', compact('eskuls'));
})->name('home');

Route::get('/dashboard', function () {
    $user = auth()->user();
    
    // Redirect based on role
    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($user->role === 'pembina') {
        return redirect()->route('pembina.dashboard');
    } elseif ($user->role === 'pelatih') {
        return redirect()->route('pelatih.dashboard');
    }
    
    return redirect('/');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Role dashboards
    Route::get('/admin', [AdminController::class, 'index'])
        ->middleware('role:admin')
        ->name('admin.dashboard');
    Route::get('/pembina', [PembinaController::class, 'index'])
        ->middleware('role:pembina')
        ->name('pembina.dashboard');
    Route::get('/pelatih', [PelatihController::class, 'index'])
        ->middleware('role:pelatih')
        ->name('pelatih.dashboard');
    
    // Admin CRUD routes
    Route::prefix('admin')->name('admin.')->middleware('role:admin')->group(function () {
        Route::resource('siswa', AdminSiswaController::class);
        Route::resource('eskul', EskulController::class);
        Route::resource('pendaftaran', PendaftaranController::class);
        Route::resource('presensi', PresensiController::class);
        Route::get('presensi/siswa-by-eskul', [PresensiController::class, 'getSiswaByEskul'])->name('presensi.getSiswaByEskul');
        Route::resource('prestasi', PrestasiController::class);
        
        // Dashboard Content Management routes
        Route::resource('dashboard-content', DashboardContentController::class);
        Route::patch('dashboard-content/{dashboardContent}/toggle-active', [DashboardContentController::class, 'toggleActive'])
            ->name('dashboard-content.toggle-active');
    });

    // Pembina routes
    Route::prefix('pembina')->name('pembina.')->middleware('role:pembina')->group(function () {
        Route::get('/eskul/{id}', [PembinaController::class, 'eskulDetail'])->name('eskul.detail');
        Route::get('/eskul/{id}/presensi', [PembinaController::class, 'presensi'])->name('presensi');
        Route::put('/presensi/{id}', [PembinaController::class, 'updatePresensi'])->name('presensi.update');
        Route::get('/eskul/{id}/prestasi', [PembinaController::class, 'prestasi'])->name('prestasi');
    });

    // Pelatih routes
    Route::prefix('pelatih')->name('pelatih.')->middleware('role:pelatih')->group(function () {
        Route::get('/eskul/{id}', [PelatihController::class, 'eskulDetail'])->name('eskul.detail');
        Route::get('/eskul/{id}/presensi', [PelatihController::class, 'presensi'])->name('presensi');
        Route::put('/presensi/{id}', [PelatihController::class, 'updatePresensi'])->name('presensi.update');
        Route::get('/eskul/{id}/prestasi', [PelatihController::class, 'prestasi'])->name('prestasi');
    });
});

// Siswa routes (public - no auth middleware)
Route::prefix('siswa')->name('siswa.')->group(function () {
    Route::get('/', [SiswaController::class, 'index'])->name('index');
    Route::get('/register', [SiswaController::class, 'register'])->name('register');
    Route::post('/register', [SiswaController::class, 'storeRegister'])->name('register.store');
    Route::get('/login', [SiswaController::class, 'login'])->name('login');
    Route::post('/login', [SiswaController::class, 'authenticate'])->name('authenticate');
    
    // Protected siswa routes
    Route::get('/dashboard', [SiswaController::class, 'dashboard'])->name('dashboard');
    Route::get('/eskul', [SiswaController::class, 'eskul'])->name('eskul');
    Route::post('/eskul/{id}/daftar', [SiswaController::class, 'daftarEskul'])->name('eskul.daftar');
    Route::get('/presensi', [SiswaController::class, 'presensi'])->name('presensi');
    Route::get('/prestasi', [SiswaController::class, 'prestasi'])->name('prestasi');
    Route::get('/profile', [SiswaController::class, 'profile'])->name('profile');
    Route::put('/profile', [SiswaController::class, 'updateProfile'])->name('profile.update');
    Route::post('/logout', [SiswaController::class, 'logout'])->name('logout');
});

require __DIR__.'/auth.php';
