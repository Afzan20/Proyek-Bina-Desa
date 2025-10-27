@extends('admin.layout.app')

@section('title', 'Index Data Lokasi | Proyek Bina Desa')
@section('page', 'Lokasi Aset')
@section('page-title', 'Index Data Lokasi')

@section('content')

    <!-- Tombol Tambah Data -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-dark mb-0">Data Lokasi Aset</h3>
        <a href="{{ route('lokasi_aset.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus me-2"></i> Tambah Lokasi
        </a>
    </div>

    <!-- Tabel Data -->
    <div class="card mb-4">
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-3">
                <table class="table align-items-center mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">No
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama
                                Aset</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                Lokasi</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                RT</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                RW</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                Keterangan</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Aksi</th>
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
                                    <p class="text-xs mb-0">{{ $item->lokasi_text }}</p>
                                </td>
                                <td>
                                    <p class="text-xs mb-0">{{ $item->rt ?? '-' }}</p>
                                </td>
                                <td>
                                    <p class="text-xs mb-0">{{ $item->rw ?? '-' }}</p>
                                </td>
                                <td>
                                    <p class="text-xs mb-0">{{ $item->keterangan ?? '-' }}</p>
                                </td>

                                <td class="text-center">
                                    <a href="{{ route('lokasi_aset.show', $item->lokasi_id) }}"
                                        class="text-info me-3" title="Detail">
                                        <i class="fas fa-eye fa-lg"></i>
                                    </a>
                                    <a href="{{ route('lokasi_aset.edit', $item->lokasi_id) }}"
                                        class="text-warning me-3" title="Edit">
                                        <i class="fas fa-edit fa-lg"></i>
                                    </a>
                                    <form action="{{ route('lokasi_aset.destroy', $item->lokasi_id) }}"
                                        method="POST" class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
                                <td colspan="6" class="text-center text-muted py-4">Belum ada data lokasi aset.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
