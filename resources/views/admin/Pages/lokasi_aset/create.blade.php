@extends('admin.layout.app')

@section('title', 'Create Data Lokasi | Proyek Bina Desa')
@section('page', 'Lokasi Aset')
@section('page-title', 'Create Data Lokasi')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h4 class="fw-bold mb-4 text-primary">Tambah Lokasi Aset</h4>

            <form action="{{ route('lokasi_aset.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="aset_id" class="form-label">Nama Aset</label>
                    <select name="aset_id" id="aset_id" class="form-select" required>
                        <option value="">-- Pilih Aset --</option>
                        @foreach ($aset as $a)
                            <option value="{{ $a->aset_id }}">{{ $a->nama_aset }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="lokasi_text" class="form-label">Lokasi</label>
                    <input type="text" name="lokasi_text" id="lokasi_text" class="form-control" placeholder="Contoh: Gedung Utama, Lantai 2" required>
                </div>

                <div class="mb-3">
                    <label for="rt" class="form-label">RT</label>
                    <input type="text" name="rt" id="rt" class="form-control" maxlength="5">
                </div>

                <div class="mb-3">
                    <label for="rw" class="form-label">RW</label>
                    <input type="text" name="rw" id="rw" class="form-control" maxlength="5">
                </div>

                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="form-control" rows="3" placeholder="Opsional"></textarea>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('lokasi_aset.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
