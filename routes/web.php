<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingsController;

// Route untuk dokumentasi template
Route::get('template', function () {
    return File::get(public_path() . '/documentation.html');
});
//route registrasi pengguna baru
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);
// Route untuk root URL
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

// Group route yang membutuhkan autentikasi
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Dashboard Universal
    Route::get('/dashboard', function () {
        return view('dashboard.default');
    })->name('dashboard');

    // Profil Pengguna
    Route::get('/user/profile', function () {
        return view('profile.show');
    })->name('profile.show');

    // Manajemen Pengguna (Admin)
    Route::get('/admin/users', function () {
        return view('admin.users.index');
    })->name('admin.users');

    // Pengaturan Sistem (Admin)
    Route::get('/admin/settings', function () {
        return view('admin.settings.index');
    })->name('admin.settings');

    Route::get('/admin/user/edit', function () {
        return view('admin.settings.index');
    })->name('admin.user');

    // Group route khusus Komisioner
    Route::prefix('komisioner')->name('komisioner.')->group(function () {

        // Buat Laporan Baru
        Route::get('/laporan/baru', function () {
            return view('komisioner.laporan.create');
        })->name('laporan.baru');

        // Riwayat Laporan
        Route::get('/laporan/riwayat', [ReportController::class, 'history'])->name('laporan.riwayat');

        // Cetak Surat
        Route::get('/surat/cetak', function () {
            return view('komisioner.surat.print');
        })->name('surat.cetak');
    });
    Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});


    // Cetak PDF Laporan
    Route::get('/reports/{report}/print', [ReportController::class, 'printPdf'])->name('reports.print');


});
