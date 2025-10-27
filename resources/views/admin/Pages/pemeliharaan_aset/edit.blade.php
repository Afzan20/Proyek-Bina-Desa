@extends('admin.layout.app')

@section('title', 'Edit Data Pemeliharaan Aset | Proyek Bina Desa')
@section('page', 'Pemeliharaan Aset')
@section('page-title', 'Edit Data Pemeliharaan Aset')

@section('content')
<div class="container-fluid py-4">

    <h5 class="mb-3">Edit Data Pemeliharaan Aset</h5>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('pemeliharaan_aset.update', $pemeliharaan->pemeliharaan_aset_id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Aset</label>
                    <select name="aset_id" class="form-select" required>
                        @foreach ($aset as $a)
                            <option value="{{ $a->aset_id }}" {{ $pemeliharaan->aset_id == $a->aset_id ? 'selected' : '' }}>
                                {{ $a->nama_aset }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Pemeliharaan</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ $pemeliharaan->tanggal }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tindakan</label>
                    <input type="text" name="tindakan" class="form-control" value="{{ $pemeliharaan->tindakan }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Biaya (Rp)</label>
                    <input type="number" name="biaya" class="form-control" value="{{ $pemeliharaan->biaya }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Pelaksana</label>
                    <input type="text" name="pelaksana" class="form-control" value="{{ $pemeliharaan->pelaksana }}" required>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('pemeliharaan_aset.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Perbarui</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
