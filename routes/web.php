<?php

use Illuminate\Support\Facades\Route;

// Halaman Depan untuk Guest
Route::get('/', function () {
    return view('index');
});

// Halaman Dashboard Admin
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});
