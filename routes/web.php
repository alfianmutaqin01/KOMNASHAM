<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ReportController;
use App\Livewire\CreateReportForm; // Penting: Ini untuk rute '/laporan/baru'

// Route untuk dokumentasi template
Route::get('template', function () {
    return File::get(public_path() . '/documentation.html');
});

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

    // Group route khusus Komisioner
    Route::prefix('komisioner')->name('komisioner.')->group(function () {

Route::get('/laporan/baru', function () {
    return view('komisioner.laporan.create');
})->name('laporan.baru');

        // Riwayat Laporan
        Route::get('/laporan/riwayat', [ReportController::class, 'history'])->name('laporan.riwayat');

        // Edit dan Hapus Laporan (Masih pakai Controller & Blade biasa)
        Route::get('/laporan/{report}/edit', [ReportController::class, 'edit'])->name('laporan.edit');
        Route::put('/laporan/{report}', [ReportController::class, 'update'])->name('laporan.update');
        Route::delete('/laporan/{report}', [ReportController::class, 'destroy'])->name('laporan.destroy');

        // Cetak Surat
        Route::get('/surat/cetak', function () {return view('komisioner.surat.print');})->name('surat.cetak');

        // PERBAIKI: Nama rute cetak PDF harus konsisten: komisioner.reports.print
        Route::get('/reports/{report}/print', [ReportController::class, 'printPdf'])->name('reports.print'); // NAMANYA JADI komisioner.reports.print
    });
});