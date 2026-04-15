<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Obat; // Pastikan ini mengarah ke model Obat
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        // Mengambil semua data obat
        $obats = Obat::all();
        return view('admin.obat.index', compact('obats'));
    }

    public function create()
    {
        // Pastikan view mengarah ke folder obat, bukan pasien
        return view('admin.obat.create');
    }

    public function store(Request $request)
    {
        // Validasi data obat (sesuaikan dengan kolom di database kamu)
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'kemasan' => 'required|string|max:255',
            'harga' => 'required|numeric',
        ]);

        Obat::create([
            'nama_obat' => $request->nama_obat,
            'kemasan' => $request->kemasan,
            'harga' => $request->harga,
        ]);

        // Redirect ke admin.obat.index
        return redirect()->route('admin.obat.index')
            ->with('message', 'Data Obat berhasil ditambah')
            ->with('type', 'success');
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
            'kemasan' => 'required|string|max:255',
            'harga' => 'required|numeric',
        ]);

        $obat->update([
            'nama_obat' => $request->nama_obat,
            'kemasan' => $request->kemasan,
            'harga' => $request->harga,
        ]);

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
}