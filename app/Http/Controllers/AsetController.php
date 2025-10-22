<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\KategoriAset;
use Illuminate\Http\Request;

class AsetController extends Controller
{
    public function index()
    {
        $data = Aset::with('kategori')->get();
        return view('admin.aset.index', compact('data'));
    }

    public function create()
    {
        $kategori = KategoriAset::all();
        return view('admin.aset.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori_aset,kategori_id',
            'kode_aset' => 'required|string|max:50|unique:aset,kode_aset',
            'nama_aset' => 'required|string|max:100',
            'tgl_perolehan' => 'required|date',
            'nilai_perolehan' => 'required|numeric',
            'kondisi' => 'required|string|max:50',
        ]);

        Aset::create($request->all());
        return redirect()->route('aset.index')->with('success', 'Aset berhasil ditambahkan');
    }

    public function show($id)
    {
        $aset = Aset::with('kategori')->findOrFail($id);
        return view('admin.aset.show', compact('aset'));
    }

    public function edit($id)
    {
        $aset = Aset::findOrFail($id);
        $kategori = KategoriAset::all();
        return view('admin.aset.edit', compact('aset', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $aset = Aset::findOrFail($id);
        $request->validate([
            'kategori_id' => 'required|exists:kategori_aset,kategori_id',
            'kode_aset' => 'required|string|max:50|unique:aset,kode_aset,' . $aset->aset_id . ',aset_id',
            'nama_aset' => 'required|string|max:100',
            'tgl_perolehan' => 'required|date',
            'nilai_perolehan' => 'required|numeric',
            'kondisi' => 'required|string|max:50',
        ]);

        $aset->update($request->all());
        return redirect()->route('aset.index')->with('success', 'Aset berhasil diperbarui');
    }

    public function destroy($id)
    {
        $aset = Aset::findOrFail($id);
        $aset->delete();
        return redirect()->route('aset.index')->with('success', 'Aset berhasil dihapus');
    }
}
