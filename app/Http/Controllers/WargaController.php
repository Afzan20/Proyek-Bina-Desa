<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    // 🧾 Tampilkan semua data warga
    public function index()
    {
        $data = Warga::all();
        return view('admin.pages.warga.index', compact('data'));
    }

    // ➕ Form tambah warga
    public function create()
    {
        return view('admin.pages.warga.create');
    }

    // 💾 Simpan data warga baru
    public function store(Request $request)
    {
        $request->validate([
            'no_ktp' => 'required|unique:warga,no_ktp',
            'nama' => 'required|string|max:100',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'telp' => 'required',
            'email' => 'nullable|email'
        ]);

        Warga::create($request->all());
        return redirect()->route('warga.index')->with('success', 'Data warga berhasil ditambahkan');
    }

    // ✏️ Form edit
    public function edit($id)
    {
        $warga = Warga::findOrFail($id);
        return view('admin.pages.warga.edit', compact('warga'));
    }

    // 🔄 Update data warga
    public function update(Request $request, $id)
    {
        $warga = Warga::findOrFail($id);

        $request->validate([
            'no_ktp' => 'required|unique:warga,no_ktp,' . $id . ',warga_id',
            'nama' => 'required|string|max:100',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'telp' => 'required',
            'email' => 'nullable|email'
        ]);

        $warga->update($request->all());
        return redirect()->route('warga.index')->with('success', 'Data warga berhasil diperbarui');
    }

    // 🗑️ Hapus data warga
    public function destroy($id)
    {
        $warga = Warga::findOrFail($id);
        $warga->delete();

        return redirect()->route('warga.index')->with('success', 'Data warga berhasil dihapus');
    }
}
