<?php

use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PengelolaController;
use App\Http\Controllers\KelolaPejabatController;
use App\Http\Controllers\KelolaPetugasController;

use App\Http\Controllers\PemohonController;
use App\Http\Controllers\KeberatanInformasiController;
use App\Http\Controllers\PermohonanInformasiController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [PengelolaController::class, 'index'])->name('dashboard');

    // Bisa diakses oleh semua role
    Route::resources([
        'pemohon' => PemohonController::class, // Pemohon Informasi
        'permohonan' => PermohonanInformasiController::class, // Permohonan Informasi
        'keberatan' => KeberatanInformasiController::class, // Keberatan Informasi
    ]);
});


Route::middleware(['auth', 'verified', CheckRole::class . ':superadmin'])->group(function () {
    // Hanya superadmin yang bisa kelola petugas dan pejabat
    Route::resources([
        'petugasppid' => KelolaPetugasController::class, // Kelola Petugas PPID
        'pejabatppid' => KelolaPejabatController::class, // Kelola Pejabat PPID
    ]);
});

Route::middleware('auth')
    ->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__ . '/auth.php';
