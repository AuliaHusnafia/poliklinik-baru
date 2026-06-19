<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        $obats = Obat::all();
        return view('admin.obat.index', compact('obats'));
    }

    public function create()
    {
        return view('admin.obat.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'nama_obat' => 'required|string|max:255',
        'kemasan'   => 'required|string|max:255',
        'harga'     => 'required|numeric|min:0',
        'stok'      => 'required|integer|min:0',
    ]);

    Obat::create($request->only(['nama_obat', 'kemasan', 'harga', 'stok']));

    return redirect()->route('admin.obat.index')
                     ->with('success', 'Obat berhasil ditambahkan.');
}

    public function edit($id)
    {
        $obat = Obat::findOrFail($id);
        return view('admin.obat.edit', compact('obat'));
    }

    public function update(Request $request, $id)
    {
        $obat = Obat::findOrFail($id);

        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'kemasan'   => 'nullable|string|max:35',
            'harga'     => 'required|numeric|min:1000',
            'stok'      => 'required|integer|min:0',
        ]);

        $obat->update($request->all());

        return redirect()->route('admin.obat.index')
            ->with('message', 'Data Obat berhasil diupdate')
            ->with('type', 'success');
    }

    public function destroy($id)
    {
        $obat = Obat::findOrFail($id);
        $obat->delete();

        return redirect()->route('admin.obat.index')
            ->with('message', 'Data Obat berhasil dihapus')
            ->with('type', 'success');
    }

    // TAMBAH STOK
    public function tambahStok(Request $request, $id)
    {
        $obat = Obat::findOrFail($id);
        
        $request->validate([
            'jumlah' => 'required|integer|min:1',
        ]);

        $obat->tambahStok($request->jumlah);

        return redirect()->route('admin.obat.index')
            ->with('message', "Stok {$obat->nama_obat} berhasil ditambah {$request->jumlah} unit")
            ->with('type', 'success');
    }

    // KURANGI STOK (MANUAL)
    public function kurangiStok(Request $request, $id)
    {
        $obat = Obat::findOrFail($id);
        
        $request->validate([
            'jumlah' => 'required|integer|min:1',
        ]);

        // VALIDASI STOK HABIS
        if ($obat->stok <= 0) {
            return redirect()->route('admin.obat.index')
                ->with('message', "⚠️ GAGAL! Stok {$obat->nama_obat} sedang HABIS! Tidak dapat mengurangi stok. Silakan tambah stok terlebih dahulu.")
                ->with('type', 'error');
        }

        // VALIDASI STOK TIDAK CUKUP
        if ($obat->stok < $request->jumlah) {
            return redirect()->route('admin.obat.index')
                ->with('message', "⚠️ GAGAL! Stok {$obat->nama_obat} tidak mencukupi! Stok tersedia: {$obat->stok} unit, yang diminta: {$request->jumlah} unit.")
                ->with('type', 'error');
        }

        $obat->kurangiStok($request->jumlah);

        // CEK STOK MENIPIS SETELAH PENGURANGAN
        if ($obat->stok <= 5 && $obat->stok > 0) {
            return redirect()->route('admin.obat.index')
                ->with('message', "✓ Stok {$obat->nama_obat} berhasil dikurangi {$request->jumlah} unit. ⚠️ PERINGATAN: Stok tersisa {$obat->stok} unit (menipis)!")
                ->with('type', 'warning');
        }

        return redirect()->route('admin.obat.index')
            ->with('message', "✓ Stok {$obat->nama_obat} berhasil dikurangi {$request->jumlah} unit. Stok tersisa: {$obat->stok} unit.")
            ->with('type', 'success');
    }
}