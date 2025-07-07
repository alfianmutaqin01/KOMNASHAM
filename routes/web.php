<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Komisioner\ActivityReportController;
use App\Livewire\CreateActivityReportForm;
use App\Http\Controllers\Admin\LetterSettingController;
use App\Livewire\Admin\LetterSettings;
use App\Http\Controllers\Komisioner\AssignmentLetterController;
use App\Livewire\CreateAssignmentLetterForm;

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

    // Manajemen Pengguna Admin
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/settings/letter', [LetterSettingController::class, 'index'])->name('settings.letter');
    });

    // Group route khusus Komisioner
    Route::prefix('komisioner')->name('komisioner.')->group(function () {

        // Laporan
        Route::get('/laporan/baru', function () {
            return view('komisioner.laporan.create');
        })->name('laporan.baru');

        Route::get('/laporan/{report}/edit', function (\App\Models\Report $report) {
            return view('komisioner.laporan.create', compact('report'));
        })->name('laporan.edit');

        Route::get('/laporan/riwayat', [ReportController::class, 'history'])->name('laporan.riwayat');
        Route::put('/laporan/{report}', [ReportController::class, 'update'])->name('laporan.update');
        Route::delete('/laporan/{report}', [ReportController::class, 'destroy'])->name('laporan.destroy');
        Route::get('/reports/{report}/print', [ReportController::class, 'printPdf'])->name('reports.print');

        // Surat Tugas
        Route::prefix('surat')->name('surat.')->group(function () {
            Route::get('/cetak', [AssignmentLetterController::class, 'create'])->name('cetak');
            Route::get('/{assignmentLetter}/cetak-pdf', [AssignmentLetterController::class, 'printPdf'])->name('print_pdf');
            Route::get('/riwayat', [AssignmentLetterController::class, 'history'])->name('riwayat');
            Route::get('/{assignmentLetter}/edit', [AssignmentLetterController::class, 'edit'])->name('edit');
            Route::delete('/{assignmentLetter}', [AssignmentLetterController::class, 'destroy'])->name('destroy');
        });

        // Kegiatan
        Route::prefix('kegiatan')->name('kegiatan.')->group(function () {

            Route::get('/baru', function () {
                return view('komisioner.kegiatan.create');
            })->name('baru');
            Route::get('/{activityReport}/edit', function (\App\Models\ActivityReport $activityReport) {
                return view('komisioner.kegiatan.create', compact('activityReport'));
            })->name('edit');
            Route::get('/{activityReport}/print', [ActivityReportController::class, 'printPdf'])->name('print');
            Route::get('/riwayat', [ActivityReportController::class, 'history'])->name('riwayat');
            Route::delete('/{activityReport}', [ActivityReportController::class, 'destroy'])->name('destroy');
        });
    });
});
