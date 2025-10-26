@extends('admin.layout.app')

@section('title', 'Index Data Pemeliharaan Aset | Proyek Bina Desa')
@section('page', 'Pemeliharaan Aset')
@section('page-title', 'Index Data Pemeliharaan Aset')

@section('content')
<div class="container-fluid py-4">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Data Pemeliharaan Aset</h5>
        <a href="{{ route('pemeliharaan_aset.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus me-2"></i>Tambah Pemeliharaan
        </a>
    </div>

    <!-- Tabel -->
    <div class="card mb-4">
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-3">
                <table class="table align-items-center mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-3">No</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Aset</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Tanggal</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Tindakan</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Biaya</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Pelaksana</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Aksi</th>
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
                                    <p class="text-xs mb-0">{{ $item->tindakan }}</p>
                                </td>
                                <td>
                                    <p class="text-xs mb-0">Rp {{ number_format($item->biaya, 0, ',', '.') }}</p>
                                </td>
                                <td>
                                    <p class="text-xs mb-0">{{ $item->pelaksana }}</p>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('pemeliharaan_aset.show', $item->pemeliharaan_id) }}" class="text-info me-3" title="Detail">
                                        <i class="fas fa-eye fa-lg"></i>
                                    </a>
                                    <a href="{{ route('pemeliharaan_aset.edit', $item->pemeliharaan_id) }}" class="text-warning me-3" title="Edit">
                                        <i class="fas fa-edit fa-lg"></i>
                                    </a>
                                    <form action="{{ route('pemeliharaan_aset.destroy', $item->pemeliharaan_id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
                                <td colspan="7" class="text-center text-muted py-4">Belum ada data pemeliharaan aset.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
