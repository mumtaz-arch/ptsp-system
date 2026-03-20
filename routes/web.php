<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Public\PageController;
use App\Http\Controllers\Public\BukuTamuController as PublicBukuTamuController;
use App\Http\Controllers\Public\LayananController as PublicLayananController;
use App\Http\Controllers\Public\PengaduanController as PublicPengaduanController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BukuTamuController as AdminBukuTamuController;
use App\Http\Controllers\Admin\LayananController as AdminLayananController;
use App\Http\Controllers\Admin\PengajuanController as AdminPengajuanController;
use App\Http\Controllers\Admin\PengaduanController as AdminPengaduanController;
use App\Http\Controllers\Admin\KontenController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/profil', [PageController::class, 'profil'])->name('profil');
Route::get('/layanan', [PageController::class, 'layanan'])->name('layanan');
Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');

// Buku Tamu Public
Route::get('/buku-tamu', [PublicBukuTamuController::class, 'create'])->name('buku-tamu.create');
Route::post('/buku-tamu', [PublicBukuTamuController::class, 'store'])->name('buku-tamu.store');

// Layanan Public
Route::get('/layanan-online', [PublicLayananController::class, 'index'])->name('layanan-online.index');
Route::get('/layanan-online/create', [PublicLayananController::class, 'create'])->name('layanan-online.create');
Route::post('/layanan-online', [PublicLayananController::class, 'store'])->name('layanan-online.store');

// Pengaduan Public
Route::get('/pengaduan', [PublicPengaduanController::class, 'create'])->name('pengaduan.create');
Route::post('/pengaduan', [PublicPengaduanController::class, 'store'])->name('pengaduan.store');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Users
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/export-pdf', [UserController::class, 'exportPdf'])->name('users.export-pdf');

    // Buku Tamu
    Route::get('/buku-tamu', [AdminBukuTamuController::class, 'index'])->name('buku-tamu.index');
    Route::get('/buku-tamu/export-pdf', [AdminBukuTamuController::class, 'exportPdf'])->name('buku-tamu.export-pdf');

    // Layanan
    Route::resource('/layanan', AdminLayananController::class)->names('layanan');

    // Pengajuan Layanan
    Route::get('/pengajuan', [AdminPengajuanController::class, 'index'])->name('pengajuan.index');
    Route::get('/pengajuan/{pengajuan}', [AdminPengajuanController::class, 'show'])->name('pengajuan.show');
    Route::patch('/pengajuan/{pengajuan}', [AdminPengajuanController::class, 'update'])->name('pengajuan.update');

    // Pengaduan
    Route::get('/pengaduan', [AdminPengaduanController::class, 'index'])->name('pengaduan.index');
    Route::get('/pengaduan/{pengaduan}', [AdminPengaduanController::class, 'show'])->name('pengaduan.show');
    Route::patch('/pengaduan/{pengaduan}', [AdminPengaduanController::class, 'update'])->name('pengaduan.update');
    Route::get('/pengaduan-export-pdf', [AdminPengaduanController::class, 'exportPdf'])->name('pengaduan.export-pdf');

    // Konten
    Route::resource('/konten', KontenController::class)->names('konten');

    // Profile Edit from Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
