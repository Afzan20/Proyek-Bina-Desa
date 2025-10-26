@extends('admin.layout.app')

@section('title', 'Data User | Proyek Bina Desa')
@section('page', 'User')
@section('page-title', 'Data User')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar User</h5>
            <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus me-1"></i> Tambah User
            </a>
        </div>

        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="card mb-4">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-3">
                        <table class="table align-items-center mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-3">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Nama</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Email</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Dibuat</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $item)
                                    <tr>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $loop->iteration }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->name }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs mb-0">{{ $item->email }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs mb-0">{{ $item->created_at->format('d M Y') }}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="{{ route('user.edit', $item->id) }}" class="text-warning me-3"
                                                title="Edit Data">
                                                <i class="fas fa-edit fa-lg"></i>
                                            </a>

                                            <form action="{{ route('user.destroy', $item->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link text-danger p-0 m-0"
                                                    title="Hapus Data">
                                                    <i class="fas fa-trash fa-lg"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted py-4">Belum ada data user.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
