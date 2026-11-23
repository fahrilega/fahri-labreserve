<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LabController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\AuthController;

// Halaman Awal / Guest
Route::get('/', function () {
    return view('guest.home');
})->name('home');
Route::get('/contact', function () {
    return view('guest.contact');
})->name('contact');

// Authentication (Guest Only)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'resetPassword'])->name('password.update');
});

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Halaman Khusus Role: Admin
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/dashboard', [LabController::class, 'index'])->name('admin.dashboard');
    Route::resource('labs', LabController::class);
    Route::resource('users', UserController::class);
    Route::resource('peminjaman', PeminjamanController::class);
    Route::patch('/peminjaman/{id}/status', [PeminjamanController::class, 'updateStatus'])->name('peminjaman.updateStatus');
});

// Halaman Khusus Role: User (Mahasiswa / Peminjam)
Route::middleware(['auth', 'role:User'])->group(function () {
    Route::get('/guest/peminjaman', [PeminjamanController::class, 'guestIndex'])->name('guest.peminjaman');
    Route::post('/guest/peminjaman', [PeminjamanController::class, 'store'])->name('guest.peminjaman.store');
    Route::get('/guest/users', [UserController::class, 'guestIndex'])->name('guest.users');
});
