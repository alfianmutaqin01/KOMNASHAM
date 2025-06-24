<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

Route::get('template', function () {
    return File::get(public_path() . '/documentation.html');
});

Route::get('/login', function () {
    return view('auth.login');
});
