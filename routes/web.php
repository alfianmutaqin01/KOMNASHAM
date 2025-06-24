<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\IsAdmin;

// Rute dokumentasi Limitless (Opsional)
Route::get('template', function () {
    return File::get(public_path() . '/documentation.html');
});

// Rute utama: Redirect setelah login berdasarkan role
Route::get('/', function () {
    if (Auth::check()) {
        if (Auth::user()->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

// Grup rute untuk user yang sudah login
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Dashboard Komisioner (User Biasa)
    Route::get('/dashboard', function () {
        return view('dashboard'); // View: resources/views/dashboard.blade.php
    })->name('dashboard');

    // Profil Pengguna
    Route::get('/user/profile', function () {
        return view('profile.show'); // View: resources/views/profile/show.blade.php
    })->name('profile.show');

    // Grup rute khusus untuk Admin
    Route::middleware([IsAdmin::class]) // ✅ Laravel 12 harus pakai class penuh
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {

            // Dashboard Admin
            Route::get('/dashboard', function () {
                return view('admin.dashboard'); // View: resources/views/admin/dashboard.blade.php
            })->name('dashboard');

            // Manajemen User (CRUD)
            Route::get('/users', function () {
                return view('admin.users.index'); // View: resources/views/admin/users/index.blade.php
            })->name('users');

            // Pengaturan Format Surat Tugas
            Route::get('/settings', function () {
                return view('admin.settings.index'); // View: resources/views/admin/settings/index.blade.php
            })->name('settings');

            // Rute admin tambahan bisa ditulis di sini
        });
});

Route::get('dashboard', function () {
    return view('backend.dashboard');
})->name('dashboard');
