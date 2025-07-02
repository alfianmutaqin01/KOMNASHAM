<?php

use Illuminate\Support\Facades\Route; 
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Auth; 
use App\Http\Controllers\ReportController; 
use App\Http\Controllers\Admin\UserController; 
use App\Http\Controllers\Komisioner\ActivityReportController;
use App\Livewire\CreateActivityReportForm;

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

    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');

    // Group route khusus Komisioner
    Route::prefix('komisioner')->name('komisioner.')->group(function () {
        Route::get('/laporan/baru', function () {return view('komisioner.laporan.create');
        })->name('laporan.baru');
        Route::get('/laporan/riwayat', [ReportController::class, 'history'])->name('laporan.riwayat');

        Route::get('/laporan/{report}/edit', [ReportController::class, 'edit'])->name('laporan.edit');
        Route::put('/laporan/{report}', [ReportController::class, 'update'])->name('laporan.update');
        Route::delete('/laporan/{report}', [ReportController::class, 'destroy'])->name('laporan.destroy');
        Route::get('/surat/cetak', function () {return view('komisioner.surat.print');})->name('surat.cetak');

        Route::get('/reports/{report}/print', [ReportController::class, 'printPdf'])->name('reports.print'); 
        
        Route::prefix('kegiatan')->name('kegiatan.')->group(function () {
    // Buat Laporan Kegiatan
    Route::get('/baru', function () {
        return view('komisioner.kegiatan.create');
    })->name('baru');

    // Riwayat Laporan Kegiatan
    Route::get('/riwayat', [ActivityReportController::class, 'history'])->name('riwayat');

    // Cetak PDF Laporan Kegiatan
    Route::get('/{activityReport}/print', [ActivityReportController::class, 'printPdf'])->name('print');

    // Edit Laporan Kegiatan
    Route::get('/{activityReport}/edit', function () {
        return view('komisioner.kegiatan.create');
    })->name('edit');

    // Hapus Laporan Kegiatan
    Route::delete('/{activityReport}', [ActivityReportController::class, 'destroy'])->name('destroy');
});

    });
});