@extends('admin.layout.app')

@section('title', 'Create Data Pemeliharaan Aset | Proyek Bina Desa')
@section('page', 'Pemeliharaan Aset')
@section('page-title', 'Create Data Pemeliharaan Aset')

@section('content')
<div class="container-fluid py-4">

    <h5 class="mb-3">Tambah Data Pemeliharaan Aset</h5>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('pemeliharaan_aset.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Aset</label>
                    <select name="aset_id" class="form-select" required>
                        <option value="">-- Pilih Aset --</option>
                        @foreach ($aset as $a)
                            <option value="{{ $a->aset_id }}">{{ $a->nama_aset }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Pemeliharaan</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tindakan</label>
                    <input type="text" name="tindakan" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Biaya (Rp)</label>
                    <input type="number" name="biaya" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Pelaksana</label>
                    <input type="text" name="pelaksana" class="form-control" required>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('pemeliharaan_aset.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
