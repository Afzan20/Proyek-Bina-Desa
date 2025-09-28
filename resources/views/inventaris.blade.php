<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyek Bina Desa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-building"></i> Proyek Bina Desa
            </a>
        </div>
    </nav>

    <div class="container mt-4">
        <h1 class="mb-4"><i class="fas fa-chart-line"></i> Dashboard Inventaris & Aset</h1>

        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card bg-primary text-white">
                    <div class="card-body text-center">
                        <i class="fas fa-money-bill-wave fa-3x mb-3"></i>
                        <h5>Total Nilai Aset</h5>
                        <h3>Rp {{ number_format($totalAset, 0, ',', '.') }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-success text-white">
                    <div class="card-body text-center">
                        <i class="fas fa-boxes fa-3x mb-3"></i>
                        <h5>Jumlah Aset</h5>
                        <h3>{{ $totalJumlahAset }} Unit</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-info text-white">
                    <div class="card-body text-center">
                        <i class="fas fa-tags fa-3x mb-3"></i>
                        <h5>Kategori</h5>
                        <h3>{{ count($kategoriStats) }} Jenis</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-warning text-dark">
                    <div class="card-body text-center">
                        <i class="fas fa-tools fa-3x mb-3"></i>
                        <h5>Pemeliharaan</h5>
                        <h3>{{ count($pemeliharaanAset) }} Record</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h6><i class="fas fa-list"></i> Kategori Aset</h6>
                    </div>
                    <div class="card-body">
                        @foreach($kategoriAset as $kategori)
                            <div class="d-flex justify-content-between align-items-center mb-2 p-2 border rounded">
                                <div>
                                    <strong>{{ $kategori['nama'] }}</strong><br>
                                    <small class="text-muted">{{ $kategori['kode'] }}</small>
                                </div>
                                <span class="badge bg-primary">{{ $kategoriStats[$kategori['nama']] ?? 0 }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h6><i class="fas fa-heartbeat"></i> Status Kondisi</h6>
                    </div>
                    <div class="card-body">
                        @foreach($kondisiStats as $kondisi => $jumlah)
                            <div class="d-flex justify-content-between align-items-center mb-2 p-2 border rounded">
                                <span class="text-capitalize fw-bold">{{ str_replace('_', ' ', $kondisi) }}</span>
                                @if($kondisi == 'baik')
                                    <span class="badge bg-success">{{ $jumlah }} unit</span>
                                @elseif($kondisi == 'rusak ringan')
                                    <span class="badge bg-warning">{{ $jumlah }} unit</span>
                                @else
                                    <span class="badge bg-danger">{{ $jumlah }} unit</span>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-warning text-dark">
                        <h6><i class="fas fa-exchange-alt"></i> Mutasi Terbaru</h6>
                    </div>
                    <div class="card-body">
                        @foreach($mutasiAset as $mutasi)
                            <div class="mb-3 p-2 border rounded">
                                <strong>{{ $mutasi['jenis_mutasi'] }}</strong><br>
                                <small class="text-muted">{{ date('d/m/Y', strtotime($mutasi['tanggal'])) }}</small><br>
                                <small>{{ $mutasi['keterangan'] }}</small>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h5><i class="fas fa-table"></i> Daftar Aset</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Kode Aset</th>
                                <th>Nama Aset</th>
                                <th>Kategori</th>
                                <th>Tanggal Perolehan</th>
                                <th>Nilai Perolehan</th>
                                <th>Kondisi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($aset as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><code class="bg-light p-1">{{ $item['kode_aset'] }}</code></td>
                                    <td class="fw-bold">{{ $item['nama_aset'] }}</td>
                                    <td>
                                        @if($item['kategori_nama'] == 'Elektronik')
                                            <span class="badge bg-info">{{ $item['kategori_nama'] }}</span>
                                        @elseif($item['kategori_nama'] == 'Furniture')
                                            <span class="badge bg-secondary">{{ $item['kategori_nama'] }}</span>
                                        @else
                                            <span class="badge bg-success">{{ $item['kategori_nama'] }}</span>
                                        @endif
                                    </td>
                                    <td>{{ date('d/m/Y', strtotime($item['tgl_perolehan'])) }}</td>
                                    <td class="text-end">Rp {{ number_format($item['nilai_perolehan'], 0, ',', '.') }}</td>
                                    <td>
                                        @if($item['kondisi'] == 'baik')
                                            <span class="badge bg-success">✓ Baik</span>
                                        @elseif($item['kondisi'] == 'rusak ringan')
                                            <span class="badge bg-warning">⚠ Rusak Ringan</span>
                                        @else
                                            <span class="badge bg-danger">✗ Rusak Berat</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <h5><i class="fas fa-map-marker-alt"></i> Lokasi Aset</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="table-success">
                            <tr>
                                <th>Lokasi ID</th>
                                <th>Aset ID</th>
                                <th>Lokasi</th>
                                <th>Keterangan</th>
                                <th>RT/RW</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lokasiAset as $lokasi)
                                <tr>
                                    <td><code>{{ $lokasi['lokasi_id'] }}</code></td>
                                    <td><code>{{ $lokasi['aset_id'] }}</code></td>
                                    <td><strong>{{ $lokasi['lokasi_text'] }}</strong></td>
                                    <td>{{ $lokasi['keterangan'] }}</td>
                                    <td><small>{{ $lokasi['rt'] }}/{{ $lokasi['rw'] }}</small></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-warning text-dark">
                <h5><i class="fas fa-wrench"></i> Riwayat Pemeliharaan</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="table-warning">
                            <tr>
                                <th>ID</th>
                                <th>Aset ID</th>
                                <th>Tanggal</th>
                                <th>Tindakan</th>
                                <th>Biaya</th>
                                <th>Pelaksana</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pemeliharaanAset as $pemeliharaan)
                                <tr>
                                    <td><code>{{ $pemeliharaan['pemeliharaan_id'] }}</code></td>
                                    <td><code>{{ $pemeliharaan['aset_id'] }}</code></td>
                                    <td>{{ date('d/m/Y', strtotime($pemeliharaan['tanggal'])) }}</td>
                                    <td>{{ $pemeliharaan['tindakan'] }}</td>
                                    <td class="text-end">Rp {{ number_format($pemeliharaan['biaya'], 0, ',', '.') }}</td>
                                    <td><span class="badge bg-info">{{ $pemeliharaan['pelaksana'] }}</span></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
