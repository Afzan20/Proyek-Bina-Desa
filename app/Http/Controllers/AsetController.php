<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Media;
use App\Models\KategoriAset;
use Illuminate\Http\Request;

class AsetController extends Controller{
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
            'kategori_id' => 'required',
            'kode_aset' => 'required|unique:aset,kode_aset',
            'nama_aset' => 'required|string|max:255',
            'tgl_perolehan' => 'required|date',
            'nilai_perolehan' => 'required|numeric',
            'kondisi' => 'required|string',
            'file_url.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        Aset::create($request->all());

        if ($request->hasFile('file_url')) {
        foreach ($request->file('file_url') as $index => $file) {
            $path = $file->store('media/aset', 'public');

            Media::create([
                'ref_table' => 'aset',
                'ref_id' => $aset->aset_id,
                'file_url' => $path,
                'caption' => 'Foto Aset ' . ($index + 1),
                'mime_type' => $file->getClientMimeType(),
                'sort_order' => $index + 1,
            ]);
        }
    }

        return redirect()->route('aset.index')->with('success', 'Aset berhasil ditambahkan');
    }

    public function show($id)
    {
        $aset = Aset::findOrFail($id);
        $mediaAset = Media::where('ref_table', 'aset')
                      ->where('ref_id', $id)
                      ->get();

        return view('admin.aset.show', compact('aset', 'mediaAset'));
    }

    public function edit($id)
    {
        $aset = Aset::findOrFail($id);
        $kategori = KategoriAset::all();
        return view('admin.aset.edit', compact('aset', 'kategori'));
    }

    public function update(Request $request, $id){
    $aset = Aset::findOrFail($id);

    $validated = $request->validate([
        'kategori_id' => 'required',
        'kode_aset' => 'required|unique:aset,kode_aset,' . $id . ',aset_id',
        'nama_aset' => 'required|string|max:255',
        'tgl_perolehan' => 'required|date',
        'nilai_perolehan' => 'required|numeric',
        'kondisi' => 'required|string',
        'file_url.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $aset->update($validated);

    // Jika ada file baru
    if ($request->hasFile('file_url')) {
        // hapus media lama
        $oldMedia = Media::where('ref_table', 'aset')->where('ref_id', $aset->aset_id)->get();
        foreach ($oldMedia as $media) {
            Storage::disk('public')->delete($media->file_url);
            $media->delete();
        }

        // simpan media baru
        foreach ($request->file('file_url') as $index => $file) {
            $path = $file->store('media/aset', 'public');
            Media::create([
                'ref_table' => 'aset',
                'ref_id' => $aset->aset_id,
                'file_url' => $path,
                'caption' => 'Foto Aset ' . ($index + 1),
                'mime_type' => $file->getClientMimeType(),
                'sort_order' => $index + 1,
            ]);
        }
    }
        return redirect()->route('aset.index')->with('success', 'Aset berhasil diperbarui');
    }

    public function destroy($id)
    {
        $aset = Aset::findOrFail($id);
        $aset->delete();
        return redirect()->route('aset.index')->with('success', 'Aset berhasil dihapus');
    }
}
