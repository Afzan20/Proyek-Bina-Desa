<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Media;
use App\Models\LokasiAset;
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
        return redirect()->route('lokasi_aset.index')->with('success', 'Lokasi aset berhasil ditambahkan');
    }

    public function show($id)
    {
        $lokasiAset = LokasiAset::with('aset')->findOrFail($id);
        $mediaLokasi = Media::where('ref_table', 'lokasi_aset')
                        ->where('ref_id', $id)
                        ->get();

        return view('admin.lokasi_aset.show', compact('lokasiAset', 'mediaLokasi'));
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
        return redirect()->route('lokasi_aset.index')->with('success', 'Lokasi aset berhasil diperbarui');
    }

    public function destroy($id)
    {
        $lokasi = LokasiAset::findOrFail($id);
        $lokasi->delete();
        return redirect()->route('lokasi_aset.index')->with('success', 'Lokasi aset berhasil dihapus');
    }
}
