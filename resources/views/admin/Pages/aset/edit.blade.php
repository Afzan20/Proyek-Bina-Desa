@extends('admin.layout.app')

@section('title', 'Edit Data Aset | Proyek Bina Desa')
@section('page', 'Aset')
@section('page-title', 'Edit Data Aset')

@section('content')
<div class="container mt-4">
    <h4 class="mb-3">✏️ Edit Aset</h4>

    <form action="{{ route('aset.update', $aset->aset_id) }}" method="POST">
        @csrf
        @method('PUT')

            <div class="form-group mb-3">
                <label for="kategori_id" class="form-label">Kategori Aset</label>
                <select name="kategori_id" id="kategori_id" class="form-control" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($kategori as $kat)
                        <option value="{{ $kat->kategori_id }}">{{ $kat->nama }}</option>
                    @endforeach
                </select>
            </div>

        <div class="mb-3">
            <label for="kode_aset" class="form-label">Kode Aset</label>
            <input type="text" name="kode_aset" class="form-control" value="{{ old('kode_aset', $aset->kode_aset) }}" required>
            @error('kode_aset') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="nama_aset" class="form-label">Nama Aset</label>
            <input type="text" name="nama_aset" class="form-control" value="{{ old('nama_aset', $aset->nama_aset) }}" required>
            @error('nama_aset') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="tgl_perolehan" class="form-label">Tanggal Perolehan</label>
            <input type="date" name="tgl_perolehan" class="form-control" value="{{ old('tgl_perolehan', $aset->tgl_perolehan) }}" required>
            @error('tgl_perolehan') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="nilai_perolehan" class="form-label">Nilai Perolehan (Rp)</label>
            <input type="number" name="nilai_perolehan" class="form-control" value="{{ old('nilai_perolehan', $aset->nilai_perolehan) }}" required>
            @error('nilai_perolehan') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="kondisi" class="form-label">Kondisi</label>
            <input type="text" name="kondisi" class="form-control" value="{{ old('kondisi', $aset->kondisi) }}" required>
            @error('kondisi') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="d-flex justify-content-end">
            <a href="{{ route('aset.index') }}" class="btn btn-secondary me-2">Kembali</a>
            <button type="submit" class="btn btn-warning">Update</button>
        </div>
    </form>
</div>
@endsection
