@extends('admin.layout.app')

@section('title', 'Show Detail Mutasi | Proyek Bina Desa')
@section('page', 'Mutasi Aset')
@section('page-title', 'Show Detail Mutasi')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Detail Mutasi Aset</h5>
        <a href="{{ route('mutasi_aset.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-borderless">
                <tr>
                    <th width="25%">Nama Aset</th>
                    <td>: {{ $mutasi->aset->nama_aset ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Tanggal Mutasi</th>
                    <td>: {{ \Carbon\Carbon::parse($mutasi->tanggal)->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <th>Jenis Mutasi</th>
                    <td>: {{ $mutasi->jenis_mutasi }}</td>
                </tr>
                <tr>
                    <th>Keterangan</th>
                    <td>: {{ $mutasi->keterangan ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Dibuat Pada</th>
                    <td>: {{ \Carbon\Carbon::parse($mutasi->created_at)->format('d-m-Y H:i') }}</td>
                </tr>
                <tr>
                    <th>Terakhir Diperbarui</th>
                    <td>: {{ \Carbon\Carbon::parse($mutasi->updated_at)->format('d-m-Y H:i') }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
