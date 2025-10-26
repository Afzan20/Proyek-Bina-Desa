@extends('admin.layout.app')

@section('title', 'Edit User | Proyek Bina Desa')
@section('page', 'User')
@section('page-title', 'Edit User')

@section('content')
<div class="container-fluid py-4">

    <!-- Tombol Tambah Data -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Data Mutasi Aset</h5>
        <a href="{{ route('mutasi_aset.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus me-2"></i>Tambah Mutasi
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
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Aset</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jenis Mutasi</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Keterangan</th>
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
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->aset->nama_aset ?? '-' }}</p>
                                </td>
                                <td>
                                    <p class="text-xs mb-0">{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</p>
                                </td>
                                <td>
                                    <p class="text-xs mb-0">{{ $item->jenis_mutasi }}</p>
                                </td>
                                <td>
                                    <p class="text-xs mb-0">{{ $item->keterangan ?? '-' }}</p>
                                </td>
                                <td class="align-middle text-center">
                                    <a href="{{ route('mutasi_aset.show', $item->mutasi_id) }}" class="text-info me-3" title="Detail">
                                        <i class="fas fa-eye fa-lg"></i>
                                    </a>
                                    <a href="{{ route('mutasi_aset.edit', $item->mutasi_id) }}" class="text-warning me-3" title="Edit">
                                        <i class="fas fa-edit fa-lg"></i>
                                    </a>
                                    <form action="{{ route('mutasi_aset.destroy', $item->mutasi_id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-danger p-0 m-0" title="Hapus">
                                            <i class="fas fa-trash fa-lg"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">Belum ada data mutasi aset.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
