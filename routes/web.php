<?php

use Illuminate\Support\Facades\Route;

Route::get('template', function () {
    return File::get(public_path() . '/documentation.html');
});

Route::get('/login', function () {
    return view('auth.login');
});
