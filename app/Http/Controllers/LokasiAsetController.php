<?php

namespace App\Http\Controllers;

use App\Models\LokasiAset;
use App\Models\Aset;
use Illuminate\Http\Request;

class LokasiAsetController extends Controller
{
    public function index()
    {
        $data = LokasiAset::with('aset')->get();
        return view('admin.lokasi_aset.index', compact('data'));
    }

    public function create()
    {
        $aset = Aset::all();
        return view('admin.lokasi_aset.create', compact('aset'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'aset_id' => 'required|exists:aset,aset_id',
            'lokasi_text' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'rt' => 'nullable|string|max:5',
            'rw' => 'nullable|string|max:5',
        ]);

        LokasiAset::create($request->all());
        return redirect()->route('lokasi-aset.index')->with('success', 'Lokasi aset berhasil ditambahkan');
    }

    public function show($id)
    {
        $lokasi = LokasiAset::with('aset')->findOrFail($id);
        return view('admin.lokasi_aset.show', compact('lokasi'));
    }

    public function edit($id)
    {
        $lokasi = LokasiAset::findOrFail($id);
        $aset = Aset::all();
        return view('admin.lokasi_aset.edit', compact('lokasi', 'aset'));
    }

    public function update(Request $request, $id)
    {
        $lokasi = LokasiAset::findOrFail($id);
        $request->validate([
            'aset_id' => 'required|exists:aset,aset_id',
            'lokasi_text' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'rt' => 'nullable|string|max:5',
            'rw' => 'nullable|string|max:5',
        ]);

        $lokasi->update($request->all());
        return redirect()->route('lokasi-aset.index')->with('success', 'Lokasi aset berhasil diperbarui');
    }

    public function destroy($id)
    {
        $lokasi = LokasiAset::findOrFail($id);
        $lokasi->delete();
        return redirect()->route('lokasi-aset.index')->with('success', 'Lokasi aset berhasil dihapus');
    }
}
