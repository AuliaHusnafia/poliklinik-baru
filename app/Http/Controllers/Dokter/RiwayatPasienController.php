<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\Periksa;
use Illuminate\Http\Request;

class RiwayatPasienController extends Controller
{
    public function index()
    {
        $dokter = auth()->user()->dokter;

        if (!$dokter) {
            return redirect()->route('dokter.dashboard')
                ->with('error', 'Data dokter tidak ditemukan. Hubungi administrator.');
        }

        $riwayatPasien = Periksa::whereHas('daftarPoli.jadwalPeriksa', function ($query) use ($dokter) {
                $query->where('dokter_id', $dokter->id);
            })
            ->with([
                'daftarPoli.pasien',
                'daftarPoli.jadwalPeriksa',
                'detailPeriksas.obat',
            ])
            ->orderBy('tgl_periksa', 'desc')
            ->get();

        return view('components.dokter.riwayat-pasien.index', compact('riwayatPasien'));
    }

    public function show($id)
    {
        $dokter = auth()->user()->dokter;

        if (!$dokter) {
            return redirect()->route('dokter.dashboard')
                ->with('error', 'Data dokter tidak ditemukan. Hubungi administrator.');
        }

        $periksa = Periksa::whereHas('daftarPoli.jadwalPeriksa', function ($query) use ($dokter) {
                $query->where('dokter_id', $dokter->id);
            })
            ->with([
                'daftarPoli.pasien',
                'daftarPoli.jadwalPeriksa',
                'detailPeriksas.obat',
            ])
            ->findOrFail($id);

        return view('components.dokter.riwayat-pasien.show', compact('periksa'));
    }
}