<?php

use App\Http\Controllers\Admin\PoliController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// --- GUEST ROUTES ---
Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'showLogin'])->name('login');
    Route::get('/login', [AuthController::class, 'showLogin']);
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register.show');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// --- ADMIN ROUTES (Cukup Tulis Satu Kali Saja) ---
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    Route::resource('polis', PoliController::class);
});

// --- DOKTER & PASIEN ROUTES ---
Route::middleware(['auth', 'role:dokter'])->prefix('dokter')->name('dokter.')->group(function () {
    Route::get('/dashboard', function () { return view('dokter.dashboard'); })->name('dashboard');
});

Route::middleware(['auth', 'role:pasien'])->prefix('pasien')->name('pasien.')->group(function () {
    Route::get('/dashboard', function () { return view('pasien.dashboard'); })->name('dashboard');
});