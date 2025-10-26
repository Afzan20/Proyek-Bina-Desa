@extends('admin.layout.app')

@section('title', 'Edit User | Proyek Bina Desa')
@section('page', 'User')
@section('page-title', 'Edit User')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h4 class="fw-bold mb-4 text-primary">Edit Lokasi Aset</h4>

            <form action="{{ route('lokasi_aset.update', $lokasi->lokasi_id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="aset_id" class="form-label">Nama Aset</label>
                    <select name="aset_id" id="aset_id" class="form-select" required>
                        <option value="">-- Pilih Aset --</option>
                        @foreach ($aset as $a)
                            <option value="{{ $a->aset_id }}" {{ $lokasi->aset_id == $a->aset_id ? 'selected' : '' }}>
                                {{ $a->nama_aset }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="lokasi_text" class="form-label">Lokasi</label>
                    <input type="text" name="lokasi_text" id="lokasi_text" value="{{ $lokasi->lokasi_text }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="rt" class="form-label">RT</label>
                    <input type="text" name="rt" id="rt" value="{{ $lokasi->rt }}" class="form-control" maxlength="5">
                </div>

                <div class="mb-3">
                    <label for="rw" class="form-label">RW</label>
                    <input type="text" name="rw" id="rw" value="{{ $lokasi->rw }}" class="form-control" maxlength="5">
                </div>

                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="form-control" rows="3">{{ $lokasi->keterangan }}</textarea>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('lokasi_aset.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
