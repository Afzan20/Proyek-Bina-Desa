@extends('admin.layout.app')

@section('title', 'Edit User | Proyek Bina Desa')
@section('page', 'User')
@section('page-title', 'Edit User')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Edit Mutasi Aset</h5>
        <a href="{{ route('mutasi_aset.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('mutasi_aset.update', $mutasi->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="aset_id" class="form-label">Pilih Aset</label>
                    <select name="aset_id" id="aset_id" class="form-select" required>
                        <option value="">-- Pilih Aset --</option>
                        @foreach ($aset as $a)
                            <option value="{{ $a->aset_id }}" {{ $a->aset_id == $mutasi->aset_id ? 'selected' : '' }}>
                                {{ $a->nama_aset }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal Mutasi</label>
                    <input type="date" class="form-control" name="tanggal" value="{{ $mutasi->tanggal }}" required>
                </div>

                <div class="mb-3">
                    <label for="jenis_mutasi" class="form-label">Jenis Mutasi</label>
                    <input type="text" class="form-control" name="jenis_mutasi" value="{{ $mutasi->jenis_mutasi }}" required>
                </div>

                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea name="keterangan" class="form-control" rows="3">{{ $mutasi->keterangan }}</textarea>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('mutasi_aset.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
