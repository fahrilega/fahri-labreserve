<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LabController;

// Arahkan halaman utama langsung ke Dashboard Admin
Route::get('/', [LabController::class, 'index'])->name('admin.dashboard');
Route::get('/dashboard', [LabController::class, 'index']);

// Route Form Tambah & Simpan Lab
Route::get('/labs/create', [LabController::class, 'create'])->name('labs.create');
Route::post('/labs', [LabController::class, 'store'])->name('labs.store');
