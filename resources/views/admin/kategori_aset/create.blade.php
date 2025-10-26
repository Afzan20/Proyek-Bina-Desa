@extends('admin.layout.app')

@section('title', 'Edit User | Proyek Bina Desa')
@section('page', 'User')
@section('page-title', 'Edit User')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Tambah Kategori Aset</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('kategori_aset.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Kategori</label>
                            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror"
                                   placeholder="Masukkan nama kategori" value="{{ old('nama') }}">
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="kode" class="form-label">Kode Kategori</label>
                            <input type="text" name="kode" id="kode" class="form-control @error('kode') is-invalid @enderror"
                                   placeholder="Masukkan kode kategori" value="{{ old('kode') }}">
                            @error('kode')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror"
                                      placeholder="Tuliskan deskripsi kategori aset">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="text-end">
                            <a href="{{ route('kategori_aset.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
