<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| HOME & DASHBOARD REDIRECT
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

// Shortcut untuk mengarahkan user ke dashboard yang sesuai dengan role-nya
Route::get('/dashboard', function () {
    if (auth()->user()->role === 'admin') { 
        return redirect()->route('admin.dashboard');
    }
    return app(LaporanController::class)->userDashboard();
})->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES (Hanya untuk Role Admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

    // Dashboard Utama Admin
    Route::get('/dashboard', [LaporanController::class, 'adminDashboard'])->name('dashboard');

    // KELOLA USER (Lengkap: Index, Create, Store, Show, Edit, Update, Destroy)
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/', [UserController::class, 'store'])->name('store');
        Route::get('/{user}', [UserController::class, 'show'])->name('show');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
        Route::patch('/{user}/role', [UserController::class, 'updateRole'])->name('updateRole');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
    });

    // ADMIN LAPORAN (Kelola Semua Aduan Masuk)
    Route::prefix('laporan')->name('laporan.')->group(function () {
        Route::get('/', [LaporanController::class, 'adminIndex'])->name('index');
        Route::get('/create', [LaporanController::class, 'adminCreate'])->name('create');
        Route::post('/', [LaporanController::class, 'adminStore'])->name('store');
        Route::get('/{laporan}', [LaporanController::class, 'adminShow'])->name('show');
        Route::get('/{laporan}/edit', [LaporanController::class, 'adminEdit'])->name('edit');
        Route::put('/{laporan}', [LaporanController::class, 'adminUpdate'])->name('update');
    });

    // ADMIN KEGIATAN (Kelola Agenda Komunitas)
    Route::prefix('kegiatan')->name('kegiatan.')->group(function () {
        Route::get('/', [KegiatanController::class, 'index'])->name('index');
        Route::get('/create', [KegiatanController::class, 'create'])->name('create');
        Route::post('/', [KegiatanController::class, 'store'])->name('store');
        Route::get('/{id}', [KegiatanController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [KegiatanController::class, 'edit'])->name('edit');
        Route::put('/{id}', [KegiatanController::class, 'update'])->name('update');
        Route::delete('/{id}', [KegiatanController::class, 'destroy'])->name('destroy');
    });
});

/*
|--------------------------------------------------------------------------
| USER ROUTES (Akses untuk User Biasa & Admin)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    
    // Profil Personal
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Laporan Pribadi (Hanya milik user yang login)
    Route::prefix('laporan')->name('laporan.')->group(function () {
        Route::get('/', [LaporanController::class, 'laporanIndex'])->name('index');
        Route::get('/create', [LaporanController::class, 'create'])->name('create');
        Route::post('/', [LaporanController::class, 'store'])->name('store');
        Route::get('/{laporan}', [LaporanController::class, 'show'])->name('show');
    });
});

require __DIR__.'/auth.php';