<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChatbotController;


// chatbot groq
Route::post('/chatbot', [ChatbotController::class, 'reply'])->middleware('auth');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return app(LaporanController::class)->userDashboard();
})->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

    Route::get('/dashboard', [LaporanController::class, 'adminDashboard'])->name('dashboard');

    Route::prefix('users')->name('users.')->group(function () {
        // ✅ Export HARUS paling atas sebelum wildcard /{user}
        Route::get('/export/pdf', [UserController::class, 'exportPdf'])->name('export.pdf');

        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/', [UserController::class, 'store'])->name('store');
        Route::get('/{user}', [UserController::class, 'show'])->name('show');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
        Route::patch('/{user}/role', [UserController::class, 'updateRole'])->name('updateRole');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('laporan')->name('laporan.')->group(function () {
        // ✅ Export HARUS paling atas
        Route::get('/export/pdf', [LaporanController::class, 'exportPdf'])->name('export.pdf');

        Route::get('/', [LaporanController::class, 'adminIndex'])->name('index');
        Route::get('/create', [LaporanController::class, 'adminCreate'])->name('create');
        Route::post('/', [LaporanController::class, 'adminStore'])->name('store');
        Route::get('/{laporan}', [LaporanController::class, 'adminShow'])->name('show');
        Route::get('/{laporan}/edit', [LaporanController::class, 'adminEdit'])->name('edit');
        Route::put('/{laporan}', [LaporanController::class, 'adminUpdate'])->name('update');
    });

    Route::prefix('kegiatan')->name('kegiatan.')->group(function () {
        // ✅ Export HARUS paling atas
        Route::get('/export/pdf', [KegiatanController::class, 'exportPdf'])->name('export.pdf');

        Route::get('/', [KegiatanController::class, 'index'])->name('index');
        Route::get('/create', [KegiatanController::class, 'create'])->name('create');
        Route::post('/', [KegiatanController::class, 'store'])->name('store');
        Route::get('/{kegiatan}', [KegiatanController::class, 'show'])->name('show');
        Route::get('/{kegiatan}/edit', [KegiatanController::class, 'edit'])->name('edit');
        Route::put('/{kegiatan}', [KegiatanController::class, 'update'])->name('update');
        Route::delete('/{kegiatan}', [KegiatanController::class, 'destroy'])->name('destroy');
    });
});

/*
|--------------------------------------------------------------------------
| USER ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('laporan')->name('laporan.')->group(function () {
        // ✅ Export HARUS paling atas
        Route::get('/export/pdf', [LaporanController::class, 'exportUserPdf'])->name('export.pdf');

        Route::get('/', [LaporanController::class, 'laporanIndex'])->name('index');
        Route::get('/create', [LaporanController::class, 'create'])->name('create');
        Route::post('/', [LaporanController::class, 'store'])->name('store');
        Route::get('/{laporan}', [LaporanController::class, 'show'])->name('show');
    });
});

require __DIR__.'/auth.php';