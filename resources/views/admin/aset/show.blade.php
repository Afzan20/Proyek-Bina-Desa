@extends('admin.layout.app')

@section('title', 'Detail Aset')

@section('content')
<div class="container mt-4">
    <h3 class="mb-3">Detail Aset</h3>
    <div class="card p-3 shadow-sm">
        <table class="table table-bordered">
            <tr>
                <th>Kode Aset</th>
                <td>{{ $aset->kode_aset }}</td>
            </tr>
            <tr>
                <th>Nama Aset</th>
                <td>{{ $aset->nama_aset }}</td>
            </tr>
            <tr>
                <th>Tanggal Perolehan</th>
                <td>{{ $aset->tgl_perolehan }}</td>
            </tr>
            <tr>
                <th>Nilai Perolehan</th>
                <td>Rp {{ number_format($aset->nilai_perolehan, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Kondisi</th>
                <td>{{ $aset->kondisi }}</td>
            </tr>
        </table>

        <h5 class="mt-4">📷 Foto Aset</h5>
        <div class="row">
            @forelse ($mediaAset as $media)
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <img src="{{ asset($media->file_url) }}" class="card-img-top" alt="Foto Aset">
                        <div class="card-body p-2 text-center">
                            <small>{{ $media->caption }}</small>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted">Tidak ada foto aset.</p>
            @endforelse
        </div>

        <a href="{{ route('aset.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</div>
@endsection
