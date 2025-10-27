<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Media;
use Illuminate\Http\Request;
use App\Models\PemeliharaanAset;

class PemeliharaanAsetController extends Controller
{
    public function index()
    {
        $data = PemeliharaanAset::with('aset')->get();
        return view('admin.pages.pemeliharaan_aset.index', compact('data'));
    }

    public function create()
    {
        $aset = Aset::all();
        return view('admin.pages.pemeliharaan_aset.create', compact('aset'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'aset_id' => 'required|exists:aset,aset_id',
            'tanggal' => 'required|date',
            'tindakan' => 'required|string|max:255',
            'biaya' => 'required|numeric',
            'pelaksana' => 'required|string|max:100',
        ]);

        PemeliharaanAset::create($request->all());
        return redirect()->route('pemeliharaan_aset.index')->with('success', 'Data pemeliharaan berhasil ditambahkan');
    }

    public function show($id)
    {
        $pemeliharaan = PemeliharaanAset::with('aset')->findOrFail($id);
        $mediaPemeliharaan = Media::where('ref_table', 'pemeliharaan_aset')
                            ->where('ref_id', $id)
                            ->get();

        return view('admin.pages.pemeliharaan_aset.show', compact('pemeliharaan', 'mediaPemeliharaan'));
    }

    public function edit($id)
    {
        $pemeliharaan = PemeliharaanAset::findOrFail($id);
        $aset = Aset::all();
        return view('admin.pages.pemeliharaan_aset.edit', compact('pemeliharaan', 'aset'));
    }

    public function update(Request $request, $id)
    {
        $pemeliharaan = PemeliharaanAset::findOrFail($id);
        $request->validate([
            'aset_id' => 'required|exists:aset,aset_id',
            'tanggal' => 'required|date',
            'tindakan' => 'required|string|max:255',
            'biaya' => 'required|numeric',
            'pelaksana' => 'required|string|max:100',
        ]);

        $pemeliharaan->update($request->all());
        return redirect()->route('pemeliharaan_aset.index')->with('success', 'Data pemeliharaan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $pemeliharaan = PemeliharaanAset::findOrFail($id);
        $pemeliharaan->delete();
        return redirect()->route('pemeliharaan_aset.index')->with('success', 'Data pemeliharaan berhasil dihapus');
    }
}
