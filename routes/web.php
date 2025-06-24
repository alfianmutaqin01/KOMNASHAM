<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

Route::get('template', function () {
    return File::get(public_path() . '/documentation.html');
});

Route::get('/', function () {
    return view('auth.login');
});

Route::get('dashboard', function () {
    return view('backend.dashboard');
})->name('dashboard');
