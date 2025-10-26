@extends('admin.layout.app')

@section('title', 'Detail Lokasi Aset')

@section('content')
<div class="container mt-4">
    <h3 class="mb-3">Detail Lokasi Aset</h3>
    <div class="card p-3 shadow-sm">
        <table class="table table-bordered">
            <tr>
                <th>Nama Aset</th>
                <td>{{ $lokasiAset->aset->nama_aset }}</td>
            </tr>
            <tr>
                <th>Keterangan</th>
                <td>{{ $lokasiAset->keterangan }}</td>
            </tr>
            <tr>
                <th>Lokasi</th>
                <td>{{ $lokasiAset->lokasi_text }} (RT {{ $lokasiAset->rt }} / RW {{ $lokasiAset->rw }})</td>
            </tr>
        </table>

        <h5 class="mt-4">📍 Denah / Foto Lokasi</h5>
        <div class="row">
            @forelse ($mediaLokasi as $media)
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <img src="{{ asset($media->file_url) }}" class="card-img-top" alt="Foto Lokasi">
                        <div class="card-body p-2 text-center">
                            <small>{{ $media->caption }}</small>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted">Tidak ada foto lokasi.</p>
            @endforelse
        </div>

        <a href="{{ route('lokasi_aset.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</div>
@endsection
