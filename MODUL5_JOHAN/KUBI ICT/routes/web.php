<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;

use App\Http\Controllers\MahasiswaController;

// Route::get('/', function () {
//     return view('layout/app');
// });

Route::get('/', function () {
    // Return ke view dashboard
    return view('Layout/app', [
        'totalDosen' => App\Models\Dosen::count(),
        'totalMahasiswa' => App\Models\Mahasiswa::count(),
        'totalEntitas' => App\Models\Dosen::count() + App\Models\Mahasiswa::count(),
    ]);
})->name('dashboard');


Route::prefix('dosen')->group(function () {
    Route::get('/', [DosenController::class, 'index'])->name('dosen.index');
    Route::get('/create', [DosenController::class, 'create'])->name('dosen.create');
    Route::post('/', [DosenController::class, 'store'])->name('dosen.store');
    Route::get('/{id}', [DosenController::class, 'show'])->name('dosen.show');
    Route::get('/{id}/edit', [DosenController::class, 'edit'])->name('dosen.edit');
    Route::put('/{id}', [DosenController::class, 'update'])->name('dosen.update');
    Route::delete('/{id}', [DosenController::class, 'destroy'])->name('dosen.destroy');
});

Route::prefix('mahasiswa')->group(function () {
    Route::get('/', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
    Route::get('/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
    Route::post('/', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
    Route::get('/{id}', [MahasiswaController::class, 'show'])->name('mahasiswa.show');
    Route::get('/{id}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
    Route::put('/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
    Route::delete('/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
});
