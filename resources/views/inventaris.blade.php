<!DOCTYPE html>
<html lang="id">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard | Proyek Bina Desa</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets-template/img/favicon.png') }}">

    <!-- Nucleo Icons CSS (dari template) -->
    <link type="text/css" href="{{ asset('assets-template/css/nucleo-icons.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets-template/css/nucleo-svg.css') }}" rel="stylesheet">

    <!-- Soft UI Dashboard CSS -->
    <link type="text/css" href="{{ asset('assets-template/css/soft-ui-dashboard.css') }}" rel="stylesheet">
</head>

<body class="g-sidenav-show bg-gray-100">
    <!-- Sidebar -->
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="{{ route('home.index') }}">
                <i class="fas fa-building text-primary text-sm opacity-10"></i>
                <span class="ms-1 font-weight-bold">Bina Desa</span>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-primary" href="{{ route('home.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-archive-2 text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Inventaris</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('login.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-button-power text-danger text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Dashboard Inventaris & Aset</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="Type here...">
                        </div>
                    </div>
                    <ul class="navbar-nav justify-content-end ms-3">
                        <li class="nav-item d-flex align-items-center">
                            <a href="{{ route('login.index') }}" class="nav-link text-body font-weight-bold px-0">
                                <i class="fa fa-user me-sm-1"></i>
                                <span class="d-sm-inline d-none">{{ session('user', 'Admin') }}</span>
                            </a>
                        </li>
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="container-fluid py-4">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show text-white" role="alert">
                <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                <span class="alert-text"><strong>Berhasil!</strong> {{ session('success') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <!-- Stats Row -->
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Nilai Aset</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            Rp {{ number_format($totalAset, 0, ',', '.') }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-success shadow text-center border-radius-md">
                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Aset</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            {{ $totalJumlahAset }} Unit
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                        <i class="ni ni-box-2 text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Kategori</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            {{ count($kategoriStats) }} Jenis
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-warning shadow text-center border-radius-md">
                                        <i class="ni ni-tag text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Pemeliharaan</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            {{ count($pemeliharaanAset) }} Record
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-danger shadow text-center border-radius-md">
                                        <i class="ni ni-settings text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row -->
            <div class="row mt-4">
                <div class="col-lg-4 mb-lg-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-12">
                                    <h6 class="mb-0">Kategori Aset</h6>
                                </div>
                            </div>
                            <hr class="horizontal dark my-3">
                            @foreach($kategoriAset as $kategori)
                            <div class="row mb-3">
                                <div class="col-9">
                                    <h6 class="text-sm mb-0">{{ $kategori['nama'] }}</h6>
                                    <p class="text-xs text-secondary mb-0">{{ $kategori['kode'] }}</p>
                                </div>
                                <div class="col-3 text-end">
                                    <span class="badge badge-sm bg-gradient-primary">{{ $kategoriStats[$kategori['nama']] ?? 0 }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-lg-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-12">
                                    <h6 class="mb-0">Status Kondisi</h6>
                                </div>
                            </div>
                            <hr class="horizontal dark my-3">
                            @foreach($kondisiStats as $kondisi => $jumlah)
                            <div class="row mb-3">
                                <div class="col-9">
                                    <h6 class="text-sm mb-0 text-capitalize">{{ str_replace('_', ' ', $kondisi) }}</h6>
                                </div>
                                <div class="col-3 text-end">
                                    @if($kondisi == 'baik')
                                        <span class="badge badge-sm bg-gradient-success">{{ $jumlah }} unit</span>
                                    @elseif($kondisi == 'rusak ringan')
                                        <span class="badge badge-sm bg-gradient-warning">{{ $jumlah }} unit</span>
                                    @else
                                        <span class="badge badge-sm bg-gradient-danger">{{ $jumlah }} unit</span>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-12">
                                    <h6 class="mb-0">Mutasi Terbaru</h6>
                                </div>
                            </div>
                            <hr class="horizontal dark my-3">
                            @foreach($mutasiAset as $mutasi)
                            <div class="mb-3">
                                <h6 class="text-sm mb-0">{{ $mutasi['jenis_mutasi'] }}</h6>
                                <p class="text-xs text-secondary mb-0">{{ date('d/m/Y', strtotime($mutasi['tanggal'])) }}</p>
                                <p class="text-xs mb-0">{{ $mutasi['keterangan'] }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tables -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Daftar Aset</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kode Aset</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Aset</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kategori</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl Perolehan</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nilai</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kondisi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($aset as $index => $item)
                                        <tr>
                                            <td><p class="text-xs font-weight-bold mb-0 ps-3">{{ $index + 1 }}</p></td>
                                            <td><p class="text-xs font-weight-bold mb-0">{{ $item['kode_aset'] }}</p></td>
                                            <td><p class="text-xs font-weight-bold mb-0">{{ $item['nama_aset'] }}</p></td>
                                            <td class="align-middle text-center text-sm">
                                                @if($item['kategori_nama'] == 'Elektronik')
                                                    <span class="badge badge-sm bg-gradient-info">{{ $item['kategori_nama'] }}</span>
                                                @elseif($item['kategori_nama'] == 'Furniture')
                                                    <span class="badge badge-sm bg-gradient-secondary">{{ $item['kategori_nama'] }}</span>
                                                @else
                                                    <span class="badge badge-sm bg-gradient-success">{{ $item['kategori_nama'] }}</span>
                                                @endif
                                            </td>
                                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ date('d/m/Y', strtotime($item['tgl_perolehan'])) }}</span></td>
                                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">Rp {{ number_format($item['nilai_perolehan'], 0, ',', '.') }}</span></td>
                                            <td class="align-middle text-center text-sm">
                                                @if($item['kondisi'] == 'baik')
                                                    <span class="badge badge-sm bg-gradient-success">Baik</span>
                                                @elseif($item['kondisi'] == 'rusak ringan')
                                                    <span class="badge badge-sm bg-gradient-warning">Rusak Ringan</span>
                                                @else
                                                    <span class="badge badge-sm bg-gradient-danger">Rusak Berat</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Lokasi Table -->
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Lokasi Aset</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Lokasi ID</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aset ID</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Lokasi</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Keterangan</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">RT/RW</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($lokasiAset as $lokasi)
                                        <tr>
                                            <td><p class="text-xs font-weight-bold mb-0 ps-3">{{ $lokasi['lokasi_id'] }}</p></td>
                                            <td><p class="text-xs font-weight-bold mb-0">{{ $lokasi['aset_id'] }}</p></td>
                                            <td><p class="text-xs font-weight-bold mb-0">{{ $lokasi['lokasi_text'] }}</p></td>
                                            <td><p class="text-xs mb-0">{{ $lokasi['keterangan'] }}</p></td>
                                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $lokasi['rt'] }}/{{ $lokasi['rw'] }}</span></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pemeliharaan Table -->
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Riwayat Pemeliharaan</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aset ID</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tindakan</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Biaya</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pelaksana</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pemeliharaanAset as $pemeliharaan)
                                        <tr>
                                            <td><p class="text-xs font-weight-bold mb-0 ps-3">{{ $pemeliharaan['pemeliharaan_id'] }}</p></td>
                                            <td><p class="text-xs font-weight-bold mb-0">{{ $pemeliharaan['aset_id'] }}</p></td>
                                            <td><p class="text-xs mb-0">{{ date('d/m/Y', strtotime($pemeliharaan['tanggal'])) }}</p></td>
                                            <td><p class="text-xs mb-0">{{ $pemeliharaan['tindakan'] }}</p></td>
                                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">Rp {{ number_format($pemeliharaan['biaya'], 0, ',', '.') }}</span></td>
                                            <td class="align-middle text-center"><span class="badge badge-sm bg-gradient-info">{{ $pemeliharaan['pelaksana'] }}</span></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="footer pt-3">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                © <script>document.write(new Date().getFullYear())</script>, Bina Desa
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </main>

    <!-- Core JS Files -->
    <script src="{{ asset('assets-template/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets-template/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets-template/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets-template/js/plugins/smooth-scrollbar.min.js') }}"></script>

    <!-- Control Center -->
    <script src="{{ asset('assets-template/js/soft-ui-dashboard.min.js') }}"></script>
</body>
</html>
