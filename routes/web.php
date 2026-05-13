<?php

use App\Http\Controllers\Admin\PoliController;
use App\Http\Controllers\Admin\DokterController;
use App\Http\Controllers\Admin\PasienController; 
use App\Http\Controllers\Admin\ObatController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dokter\JadwalPeriksaController;
use App\Http\Controllers\Dokter\PeriksaPasienController;
use App\Http\Controllers\Dokter\RiwayatPasienController;
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

// --- ADMIN ROUTES (Prefix: /admin, Name: admin.*) ---
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    Route::resource('poli', PoliController::class);
    Route::resource('dokter', DokterController::class);
    Route::resource('pasien', PasienController::class);
    Route::resource('obat', ObatController::class);
});

// --- DOKTER ROUTES ---
Route::middleware(['auth', 'role:dokter'])->prefix('dokter')->group(function () {
 
    Route::get('/dashboard', function () {
        return view('admin.dokter.dashboard');
    })->name('dokter.dashboard');
 
    Route::resource('jadwal-periksa', JadwalPeriksaController::class)->names([
        'index'   => 'dokter.jadwal-periksa.index',
        'create'  => 'dokter.jadwal-periksa.create',
        'store'   => 'dokter.jadwal-periksa.store',
        'show'    => 'dokter.jadwal-periksa.show',
        'edit'    => 'dokter.jadwal-periksa.edit',
        'update'  => 'dokter.jadwal-periksa.update',
        'destroy' => 'dokter.jadwal-periksa.destroy',
    ]);
 
    Route::get('/periksa-pasien', [PeriksaPasienController::class, 'index'])->name('periksa-pasien.index');
    Route::post('/periksa-pasien', [PeriksaPasienController::class, 'store'])->name('periksa-pasien.store');
    Route::get('/periksa-pasien/{id}', [PeriksaPasienController::class, 'create'])->name('periksa-pasien.create');
 
    Route::get('/riwayat-pasien', [RiwayatPasienController::class, 'index'])->name('riwayat-pasien.index');
    Route::get('/riwayat-pasien/{id}', [RiwayatPasienController::class, 'show'])->name('riwayat-pasien.show');
});

// --- PASIEN ROUTES ---
Route::middleware(['auth', 'role:pasien'])
    ->prefix('pasien')
    ->name('pasien.')
    ->group(function () {

    Route::get('/dashboard', function () { 
        return view('pasien.dashboard'); 
    })->name('dashboard');

    Route::get('/daftar-poli', [App\Http\Controllers\Pasien\PoliController::class, 'get'])
        ->name('daftar-poli');

    Route::post('/daftar-poli', [App\Http\Controllers\Pasien\PoliController::class, 'submit'])
        ->name('daftar-poli.submit');
});