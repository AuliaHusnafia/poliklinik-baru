<?php

use App\Http\Controllers\Admin\PoliController;
use App\Http\Controllers\Admin\DokterController;
use App\Http\Controllers\Admin\PasienController; // Tambahkan ini
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// --- GUEST ROUTES (Hanya bisa diakses sebelum login) ---
Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'showLogin'])->name('login');
    Route::get('/login', [AuthController::class, 'showLogin']);
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register.show');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

// Logout (Hanya bisa diakses setelah login)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// --- ADMIN ROUTES (Prefix: /admin, Name: admin.*) ---
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard Admin
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    // Manajemen Poli
    Route::resource('polis', PoliController::class);

    // Manajemen Dokter
    Route::resource('dokter', DokterController::class);

    // Manajemen Pasien
    Route::resource('pasien', PasienController::class);
});

// --- DOKTER ROUTES (Prefix: /dokter, Name: dokter.*) ---
Route::middleware(['auth', 'role:dokter'])->prefix('dokter')->name('dokter.')->group(function () {
    Route::get('/dashboard', function () { 
        return view('dokter.dashboard'); 
    })->name('dashboard');
});

// --- PASIEN ROUTES (Prefix: /pasien, Name: pasien.*) ---
Route::middleware(['auth', 'role:pasien'])->prefix('pasien')->name('pasien.')->group(function () {
    Route::get('/dashboard', function () { 
        return view('pasien.dashboard'); 
    })->name('dashboard');
});