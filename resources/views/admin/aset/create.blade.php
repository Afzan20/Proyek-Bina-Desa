@extends('admin.layout.app')

@section('title', 'Create Data Aset | Proyek Bina Desa')
@section('page', 'Aset')
@section('page-title', 'Crate Data Aset')

@section('content')
    <div class="container mt-4">
        <h4 class="mb-3">➕ Tambah Aset</h4>

        <form action="{{ route('aset.store') }}" method="POST">
            @csrf

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
                <input type="text" name="kode_aset" class="form-control" value="{{ old('kode_aset') }}" required>
                @error('kode_aset')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nama_aset" class="form-label">Nama Aset</label>
                <input type="text" name="nama_aset" class="form-control" value="{{ old('nama_aset') }}" required>
                @error('nama_aset')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tgl_perolehan" class="form-label">Tanggal Perolehan</label>
                <input type="date" name="tgl_perolehan" class="form-control" value="{{ old('tgl_perolehan') }}" required>
                @error('tgl_perolehan')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nilai_perolehan" class="form-label">Nilai Perolehan (Rp)</label>
                <input type="number" name="nilai_perolehan" class="form-control" value="{{ old('nilai_perolehan') }}"
                    required>
                @error('nilai_perolehan')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kondisi" class="form-label">Kondisi</label>
                <input type="text" name="kondisi" class="form-control" value="{{ old('kondisi') }}" required>
                @error('kondisi')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="file_url" class="form-label">Foto Aset</label>
                <input type="file" name="file_url[]" id="file_url" class="form-control" multiple accept="image/*">
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('aset.index') }}" class="btn btn-secondary me-2">Kembali</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
@endsection
