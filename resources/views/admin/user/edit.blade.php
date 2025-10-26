@extends('admin.layout.app')

@section('title', 'Edit User | Proyek Bina Desa')
@section('page', 'User')
@section('page-title', 'Edit User')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Edit Data User</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" name="name" id="name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $user->name) }}">
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Alamat Email</label>
                <input type="email" name="email" id="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email', $user->email) }}">
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <hr>
            <h6 class="fw-bold text-secondary mb-3">Ubah Password (Opsional)</h6>

            <div class="mb-3">
                <label for="password" class="form-label">Password Baru</label>
                <input type="password" name="password" id="password"
                    class="form-control @error('password') is-invalid @enderror"
                    placeholder="Isi jika ingin mengganti password">
                @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="form-control" placeholder="Ulangi password baru">
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
