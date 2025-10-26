@extends('admin.layout.app')

@section('title', 'Detail Pemeliharaan Aset | Proyek Bina Desa')
@section('page', 'Pemeliharaan Aset')
@section('page-title', 'Detail Pemeliharaan Aset')

@section('content')
<div class="container-fluid py-4">

    <h5 class="mb-3">Detail Pemeliharaan Aset</h5>

    <div class="card">
        <div class="card-body">
            <p><strong>Nama Aset:</strong> {{ $pemeliharaan->aset->nama_aset ?? '-' }}</p>
            <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($pemeliharaan->tanggal)->format('d-m-Y') }}</p>
            <p><strong>Tindakan:</strong> {{ $pemeliharaan->tindakan }}</p>
            <p><strong>Biaya:</strong> Rp {{ number_format($pemeliharaan->biaya, 0, ',', '.') }}</p>
            <p><strong>Pelaksana:</strong> {{ $pemeliharaan->pelaksana }}</p>

            {{-- Bagian Bukti Pemeliharaan --}}
            <hr>
            <h6 class="mt-4 mb-3"><i class="fas fa-file-image text-info me-2"></i>Bukti Pemeliharaan</h6>
            <div class="row">
                @forelse ($mediaPemeliharaan as $media)
                    <div class="col-md-3 mb-4">
                        <div class="card shadow-sm h-100">
                            @if(Str::contains($media->mime_type, 'image'))
                                <a href="{{ asset($media->file_url) }}" target="_blank">
                                    <img src="{{ asset($media->file_url) }}" class="card-img-top" style="height: 180px; object-fit: cover;" alt="Bukti Pemeliharaan">
                                </a>
                            @else
                                <div class="card-body text-center">
                                    <i class="fas fa-file-alt fa-3x text-secondary mb-2"></i>
                                    <p class="text-muted small">File non-gambar</p>
                                    <a href="{{ asset($media->file_url) }}" target="_blank" class="btn btn-outline-info btn-sm">Lihat File</a>
                                </div>
                            @endif
                            <div class="card-footer text-center p-2">
                                <small>{{ $media->caption ?? 'Tanpa keterangan' }}</small>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">Tidak ada bukti pemeliharaan.</p>
                @endforelse
            </div>

            <a href="{{ route('pemeliharaan_aset.index') }}" class="btn btn-secondary mt-3">
                <i class="fas fa-arrow-left me-2"></i> Kembali
            </a>
        </div>
    </div>

</div>
@endsection
