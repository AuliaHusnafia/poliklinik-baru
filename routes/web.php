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

// --- ADMIN ROUTES ---
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('poli', PoliController::class);
    Route::resource('dokter', DokterController::class);
    Route::resource('pasien', PasienController::class);
    Route::resource('obat', ObatController::class);

    Route::post('/obat/{id}/tambah-stok', [ObatController::class, 'tambahStok'])->name('obat.tambah-stok');
    Route::post('/obat/{id}/kurangi-stok', [ObatController::class, 'kurangiStok'])->name('obat.kurangi-stok');
});

// --- DOKTER ROUTES ---
// DIPERBAIKI: hapus name('dokter.') dari group, definisikan nama tiap route secara eksplisit
Route::middleware(['auth', 'role:dokter'])->prefix('dokter')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dokter.dashboard');
    })->name('dokter.dashboard');

    Route::get('/jadwal-periksa',           [JadwalPeriksaController::class, 'index'])  ->name('dokter.jadwal-periksa.index');
    Route::get('/jadwal-periksa/create',    [JadwalPeriksaController::class, 'create']) ->name('dokter.jadwal-periksa.create');
    Route::post('/jadwal-periksa',          [JadwalPeriksaController::class, 'store'])  ->name('dokter.jadwal-periksa.store');
    Route::get('/jadwal-periksa/{id}',      [JadwalPeriksaController::class, 'show'])   ->name('dokter.jadwal-periksa.show');
    Route::get('/jadwal-periksa/{id}/edit', [JadwalPeriksaController::class, 'edit'])   ->name('dokter.jadwal-periksa.edit');
    Route::put('/jadwal-periksa/{id}',      [JadwalPeriksaController::class, 'update']) ->name('dokter.jadwal-periksa.update');
    Route::delete('/jadwal-periksa/{id}',   [JadwalPeriksaController::class, 'destroy'])->name('dokter.jadwal-periksa.destroy');

    Route::get('/periksa-pasien',        [PeriksaPasienController::class, 'index']) ->name('dokter.periksa-pasien.index');
    Route::get('/periksa-pasien/{id}',   [PeriksaPasienController::class, 'create'])->name('dokter.periksa-pasien.create');
    Route::post('/periksa-pasien',       [PeriksaPasienController::class, 'store']) ->name('dokter.periksa-pasien.store');

    Route::get('/riwayat-pasien',        [RiwayatPasienController::class, 'index'])->name('dokter.riwayat-pasien.index');
    Route::get('/riwayat-pasien/{id}',   [RiwayatPasienController::class, 'show']) ->name('dokter.riwayat-pasien.show');
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