@extends('admin.layout.app')

@section('title', 'Edit User | Proyek Bina Desa')
@section('page', 'User')
@section('page-title', 'Edit User')

@section('content')
<div class="container-fluid py-4">

    <!-- Tombol Tambah Data -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Daftar Kategori Aset</h5>
        <a href="{{ route('kategori_aset.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus me-2"></i>Tambah Data
        </a>
    </div>

    <!-- Tabel Data -->
    <div class="card mb-4">
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-3">
                <table class="table align-items-center mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">No</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Kategori</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kode</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Deskripsi</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $index => $item)
                            <tr>
                                <td class="ps-3">
                                    <p class="text-xs font-weight-bold mb-0">{{ $index + 1 }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->nama }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->kode }}</p>
                                </td>
                                <td>
                                    <p class="text-xs mb-0">{{ $item->deskripsi ?? '-' }}</p>
                                </td>
                                <td class="align-middle text-center">
                                    <a href="{{ route('kategori_aset.edit', $item->kategori_id) }}"
                                    class="text-warning me-3"
                                    title="Edit Data">
                                        <i class="fas fa-edit fa-lg"></i>
                                    </a>

                                    <form action="{{ route('kategori_aset.destroy', $item->kategori_id) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-danger p-0 m-0" title="Hapus Data">
                                            <i class="fas fa-trash fa-lg"></i>
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">Belum ada data kategori aset.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
