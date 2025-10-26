@extends('admin.layout.app')

@section('content')
    <div class="container-fluid py-4">

        <!-- Header dan Tombol Tambah -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">Data Warga</h5>
            <a href="{{ route('warga.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus me-2"></i>Tambah Warga
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
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No KTP</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis
                                    Kelamin</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Agama</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pekerjaan
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Telepon</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $index => $item)
                                <tr>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $index + 1 }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $item->no_ktp }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $item->nama }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs mb-0">{{ $item->jenis_kelamin }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs mb-0">{{ $item->agama }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs mb-0">{{ $item->pekerjaan }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs mb-0">{{ $item->telp }}</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <a href="{{ route('warga.edit', $item->warga_id) }}" class="text-warning me-3"
                                            title="Edit">
                                            <i class="fas fa-edit fa-lg"></i>
                                        </a>
                                        <form action="{{ route('warga.destroy', $item->warga_id) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
                                    <td colspan="7" class="text-center text-muted py-4">Belum ada data warga.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
