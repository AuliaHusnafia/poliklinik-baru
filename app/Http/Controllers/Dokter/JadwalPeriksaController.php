<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\JadwalPeriksa;
use Illuminate\Http\Request;

class JadwalPeriksaController extends Controller
{
    public function index()
    {
        $dokter = auth()->user()->dokter;

        if (!$dokter) {
            return redirect()->route('dokter.dashboard')
                ->with('error', 'Data dokter tidak ditemukan. Hubungi administrator.');
        }

        $jadwals = JadwalPeriksa::where('dokter_id', $dokter->id)->get();

        return view('components.dokter.jadwal-periksa.index', compact('jadwals'));
    }

    public function create()
    {
        return view('components.dokter.jadwal-periksa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        // Ambil data dokter dari user yang sedang login
        $dokter = auth()->user()->dokter;

        JadwalPeriksa::create([
            'dokter_id'   => $dokter->id, // Mengirim ID dokter ke database
            'hari'        => $request->hari,
            'jam_mulai'   => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'status'      => 'aktif', // Otomatis diset 'aktif' tanpa perlu input/dropdown di form view
        ]);

        return redirect()->route('dokter.jadwal-periksa.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Cari data jadwal berdasarkan ID
        $jadwalPeriksa = JadwalPeriksa::findOrFail($id);

        // Kirim ke view dengan nama variabel 'jadwalPeriksa' yang sesuai
        return view('components.dokter.jadwal-periksa.edit', compact('jadwalPeriksa'));
    }

    public function update(Request $request, $id)
    {
        // 1. Validasi Input (Pastikan aturannya tidak menjebak)
        $request->validate([
            'hari'        => 'required',
            'jam_mulai'   => 'required',
            'jam_selesai' => 'required',
        ]);

        // 2. Cari data lama yang mau di-update
        $jadwalPeriksa = JadwalPeriksa::findOrFail($id);

        // 3. Update datanya ke database
        $jadwalPeriksa->update([
            'hari'        => $request->hari,
            'jam_mulai'   => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            // 'status' tidak perlu di-update jika kamu ingin statusnya tetap/otomatis bawaan yang lama
        ]);

        // 4. Alihkan halaman ke index dengan pesan sukses
        return redirect()->route('dokter.jadwal-periksa.index')->with('success', 'Jadwal berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $jadwal = JadwalPeriksa::findOrFail($id);

        if ($jadwal->dokter_id != auth()->user()->dokter->id) {
            abort(403);
        }

        $jadwal->delete();

        return redirect()->route('dokter.jadwal-periksa.index')
            ->with('message', 'Jadwal periksa berhasil dihapus')
            ->with('type', 'success');
    }
}