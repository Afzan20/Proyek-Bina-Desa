<?php

namespace App\Http\Controllers;

use App\Models\KategoriAset;
use Illuminate\Http\Request;

class KategoriAsetController extends Controller
{
    /**
     * Tampilkan daftar kategori aset
     */
    public function index()
    {
        $data = KategoriAset::all();
        return view('admin.pages.kategori_aset.index', compact('data'));
    }

    /**
     * Tampilkan form tambah kategori aset
     */
    public function create()
    {
        return view('admin.pages.kategori_aset.create');
    }

    /**
     * Simpan data kategori aset baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'kode' => 'required|string|max:50|unique:kategori_aset,kode',
            'deskripsi' => 'nullable|string'
        ]);

        KategoriAset::create($validated);

        return redirect()->route('kategori_aset.index')
                         ->with('success', 'Kategori aset berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit kategori aset
     */
    public function edit($id)
    {
        $kategori = KategoriAset::findOrFail($id);
        return view('admin.pages.kategori_aset.edit', compact('kategori'));
    }

    /**
     * Update data kategori aset
     */
    public function update(Request $request, $id)
    {
        $kategori = KategoriAset::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'kode' => 'required|string|max:50|unique:kategori_aset,kode,' . $kategori->kategori_id . ',kategori_id',
            'deskripsi' => 'nullable|string'
        ]);

        $kategori->update($validated);

        return redirect()->route('kategori_aset.index')
                         ->with('success', 'Kategori aset berhasil diperbarui.');
    }

    /**
     * Hapus data kategori aset
     */
    public function destroy($id)
    {
        $kategori = KategoriAset::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori_aset.index')
                         ->with('success', 'Kategori aset berhasil dihapus.');
    }
}
