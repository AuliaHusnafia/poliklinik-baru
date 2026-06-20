<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\DaftarPoli;
use App\Models\Obat;
use App\Models\Periksa;
use App\Models\DetailPeriksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeriksaPasienController extends Controller
{
    public function index()
    {
        $dokter = auth()->user()->dokter;

        if (!$dokter) {
            return redirect()->route('dokter.dashboard')
                ->with('error', 'Data dokter tidak ditemukan. Hubungi administrator.');
        }

        $daftarPoli = DaftarPoli::with(['pasien', 'jadwalPeriksa'])
                        ->whereHas('jadwalPeriksa', function ($query) use ($dokter) {
                            $query->where('dokter_id', $dokter->id);
                        })
                        ->where('status', 'menunggu')
                        ->get();

        $daftarPasien = $daftarPoli;

        return view('components.dokter.periksa-pasien.index', compact('daftarPoli', 'daftarPasien'));
    }

    public function create($id)
    {
        $daftarPoli = DaftarPoli::with(['pasien', 'jadwalPeriksa'])->findOrFail($id);
        $obats = Obat::where('stok', '>', 0)->get();

        return view('components.dokter.periksa-pasien.create', compact('daftarPoli', 'obats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'daftar_poli_id' => 'required|exists:daftar_poli,id',
            'tgl_periksa'    => 'required|date',
            'catatan'        => 'nullable|string',
            'obat_ids'       => 'required|array|min:1',
            'obat_ids.*'     => 'exists:obats,id',
            'jumlahs'        => 'required|array',
            'jumlahs.*'      => 'integer|min:1',
        ]);

        DB::beginTransaction();

        try {
            $periksa = Periksa::create([
                'id_daftar_poli' => $request->daftar_poli_id,
                'tgl_periksa'    => $request->tgl_periksa,
                'catatan'        => $request->catatan,
                'biaya_periksa'  => 150000,
            ]);

            $stokError      = [];
            $stokWarning    = [];
            $totalBiayaObat = 0;

            foreach ($request->obat_ids as $index => $obatId) {
                $obat   = Obat::find($obatId);
                $jumlah = $request->jumlahs[$index];

                if ($obat->stok <= 0) {
                    $stokError[] = "{$obat->nama_obat} (STOK HABIS!)";
                    continue;
                }

                if ($obat->stok < $jumlah) {
                    $stokError[] = "{$obat->nama_obat} (stok: {$obat->stok}, diminta: {$jumlah})";
                    continue;
                }

                $obat->stok -= $jumlah;
                $obat->save();

                if ($obat->stok <= 0) {
                    $stokWarning[] = "{$obat->nama_obat} STOK HABIS!";
                } elseif ($obat->stok <= 5) {
                    $stokWarning[] = "{$obat->nama_obat} tersisa {$obat->stok} unit (MENIPIS)!";
                }

                DetailPeriksa::create([
                    'id_periksa' => $periksa->id,
                    'obat_id'    => $obatId,
                    'jumlah'     => $jumlah,
                ]);

                $totalBiayaObat += $obat->harga * $jumlah;
            }

            if (!empty($stokError)) {
                DB::rollBack();
                return redirect()->route('dokter.periksa-pasien.create', $request->daftar_poli_id)
                    ->with('error', '⚠️ RESEP GAGAL! Stok tidak mencukupi: ' . implode(', ', $stokError));
            }

            $periksa->update(['biaya_periksa' => 150000 + $totalBiayaObat]);

            DaftarPoli::find($request->daftar_poli_id)->update(['status' => 'selesai']);

            DB::commit();

            $message = "✓ Resep berhasil! Total: Rp " . number_format(150000 + $totalBiayaObat, 0, ',', '.');

            if (!empty($stokWarning)) {
                $message .= " ⚠️ " . implode(', ', $stokWarning);
                return redirect()->route('dokter.periksa-pasien.index')
                    ->with('message', $message)->with('type', 'warning');
            }

            return redirect()->route('dokter.periksa-pasien.index')
                ->with('message', $message)->with('type', 'success');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('dokter.periksa-pasien.create', $request->daftar_poli_id)
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}