<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LabController;
use App\Http\Controllers\UserController;

// Arahkan halaman utama langsung ke Dashboard Admin
Route::get('/', [LabController::class, 'index'])->name('admin.dashboard');
Route::get('/dashboard', [LabController::class, 'index']);

// Halaman Khusus Tiap Data
Route::get('/peminjaman', [LabController::class, 'peminjaman'])->name('admin.peminjaman');
Route::get('/labs', [LabController::class, 'labs'])->name('admin.labs');
Route::get('/users', [LabController::class, 'users'])->name('admin.users');

// Route Form Tambah & Simpan Lab
Route::get('/labs/create', [LabController::class, 'create'])->name('labs.create');
Route::post('/labs', [LabController::class, 'store'])->name('labs.store');

Route::resource('labs', LabController::class);
Route::resource('users', UserController::class);
