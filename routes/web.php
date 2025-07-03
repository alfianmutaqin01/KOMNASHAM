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
        Route::get('/laporan/baru', function () {
    return view('komisioner.laporan.create');
})->name('laporan.baru');

Route::get('/laporan/{report}/edit', function (\App\Models\Report $report) {
    return view('komisioner.laporan.create', compact('report'));
})->name('laporan.edit');

        Route::get('/laporan/riwayat', [ReportController::class, 'history'])->name('laporan.riwayat');

        Route::put('/laporan/{report}', [ReportController::class, 'update'])->name('laporan.update');
        Route::delete('/laporan/{report}', [ReportController::class, 'destroy'])->name('laporan.destroy');
        Route::get('/surat/cetak', function () {return view('komisioner.surat.print');})->name('surat.cetak');

        Route::get('/reports/{report}/print', [ReportController::class, 'printPdf'])->name('reports.print'); 
        
        Route::prefix('kegiatan')->name('kegiatan.')->group(function () {
            // Buat Laporan Baru
Route::get('/baru', function () {
    return view('komisioner.kegiatan.create');
})->name('baru');

// Edit Laporan (panggil view yang sama)
Route::get('/{activityReport}/edit', function (\App\Models\ActivityReport $activityReport) {
    return view('komisioner.kegiatan.create', compact('activityReport'));
})->name('edit');

// Cetak PDF
Route::get('/{activityReport}/print', [ActivityReportController::class, 'printPdf'])->name('print');

// Riwayat
Route::get('/riwayat', [ActivityReportController::class, 'history'])->name('riwayat');

// Hapus
Route::delete('/{activityReport}', [ActivityReportController::class, 'destroy'])->name('destroy');

});
    });
});