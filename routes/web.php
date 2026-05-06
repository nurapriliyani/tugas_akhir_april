<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanController;

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Protected Routes (Login Required)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    /*
    |------------------------
    | Profile
    |------------------------
    */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*
    |------------------------
    | Laporan (FIXED 🔥)
    |------------------------
    */

    // LIST
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');

    // FORM CREATE
    Route::get('/laporan/create', [LaporanController::class, 'create'])->name('laporan.create');

    // SIMPAN (INI YANG TADI SALAH)
    Route::post('/laporan', [LaporanController::class, 'store'])->name('laporan.store');

    // DETAIL (PAKE MODEL BINDING BIAR LEBIH BAGUS)
    Route::get('/laporan/{laporan}', [LaporanController::class, 'show'])->name('laporan.show');

});

/*
|--------------------------------------------------------------------------
| Auth (Breeze)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';