<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\JadwalPeriksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalPeriksaController extends Controller
{
    // Tampilkan jadwal dokter login
    public function index()
    {
        $dokter = Auth::user();

        $jadwalPeriksas = JadwalPeriksa::where('id_dokter', $dokter->id)
                            ->orderBy('hari')
                            ->get();

        return view('dokter.jadwal-periksa.index', compact('jadwalPeriksas'));    }

    // Form tambah
    public function create()
    {
        return view('dokter.jadwal-periksa.create');
    }

    // Simpan data
    public function store(Request $request)
    {
        $request->validate([
            'hari'        => 'required|string',
            'jam_mulai'   => 'required',
            'jam_selesai' => 'required',
        ]);

        JadwalPeriksa::create([
            'id_dokter'   => Auth::id(),
            'hari'        => $request->hari,
            'jam_mulai'   => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
        ]);

        return redirect()->route('dokter.jadwal-periksa.index')
            ->with('success', 'Data berhasil disimpan');
    }

    // Form edit
    public function edit($id)
    {
        $jadwalPeriksa = JadwalPeriksa::findOrFail($id);

        return view('dokter.jadwal-periksa.edit', compact('jadwalPeriksa'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'hari'        => 'required|string',
            'jam_mulai'   => 'required',
            'jam_selesai' => 'required',
        ]);

        $jadwalPeriksa = JadwalPeriksa::findOrFail($id);

        $jadwalPeriksa->update([
            'hari'        => $request->hari,
            'jam_mulai'   => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
        ]);

        return redirect()->route('dokter.jadwal-periksa.index')
            ->with('success', 'Data berhasil diupdate');
    }

    // Hapus data
    public function destroy($id)
    {
        $jadwalPeriksa = JadwalPeriksa::findOrFail($id);
        $jadwalPeriksa->delete();

        return redirect()->route('dokter.jadwal-periksa.index')
            ->with('success', 'Data berhasil dihapus');
    }
}