<?php

namespace App\Http\Controllers;

use App\Models\MutasiAset;
use App\Models\Aset;
use Illuminate\Http\Request;

class MutasiAsetController extends Controller
{
    public function index()
    {
        $data = MutasiAset::with('aset')->get();
        return view('admin.mutasi_aset.index', compact('data'));
    }

    public function create()
    {
        $aset = Aset::all();
        return view('admin.mutasi_aset.create', compact('aset'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'aset_id' => 'required|exists:aset,aset_id',
            'tanggal' => 'required|date',
            'jenis_mutasi' => 'required|string|max:100',
            'keterangan' => 'nullable|string',
        ]);

        MutasiAset::create($request->all());
        return redirect()->route('mutasi-aset.index')->with('success', 'Mutasi aset berhasil ditambahkan');
    }

    public function show($id)
    {
        $mutasi = MutasiAset::with('aset')->findOrFail($id);
        return view('admin.mutasi_aset.show', compact('mutasi'));
    }

    public function edit($id)
    {
        $mutasi = MutasiAset::findOrFail($id);
        $aset = Aset::all();
        return view('admin.mutasi_aset.edit', compact('mutasi', 'aset'));
    }

    public function update(Request $request, $id)
    {
        $mutasi = MutasiAset::findOrFail($id);
        $request->validate([
            'aset_id' => 'required|exists:aset,aset_id',
            'tanggal' => 'required|date',
            'jenis_mutasi' => 'required|string|max:100',
            'keterangan' => 'nullable|string',
        ]);

        $mutasi->update($request->all());
        return redirect()->route('mutasi-aset.index')->with('success', 'Mutasi aset berhasil diperbarui');
    }

    public function destroy($id)
    {
        $mutasi = MutasiAset::findOrFail($id);
        $mutasi->delete();
        return redirect()->route('mutasi-aset.index')->with('success', 'Mutasi aset berhasil dihapus');
    }
}
