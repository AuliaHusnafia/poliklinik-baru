<?php
// File: app/Http/Controllers/Admin/PoliController.php
// Controller untuk manajemen poli dengan desain baru

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Poli;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    public function index()
    {
        $polis = Poli::all();
        return view('admin.polis.index', compact('polis'));
    }

    public function create()
    {
        return view('admin.polis.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_poli' => 'required|string|max:100',
            'keterangan' => 'required|string'
        ]);

        Poli::create($validated);
        return redirect()->route('admin.poli.index')->with('success', 'Data Poli berhasil ditambahkan!');    }

    public function edit($id)
    {
        $poli = Poli::findOrFail($id);
        return view('admin.poli.edit', compact('poli'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_poli' => 'required|string|max:100',
            'keterangan' => 'required|string'
        ]);

        $poli = Poli::findOrFail($id);
        $poli->update($validated);
        return redirect()->route('admin.poli.index')->with('success', 'Data Poli berhasil diperbarui!');    }

    public function destroy($id)
    {
        $poli = Poli::findOrFail($id);
        $poli->delete();
    return redirect()->route('admin.poli.index')->with('success', 'Data Poli berhasil dihapus!');    }
}

