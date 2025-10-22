<!DOCTYPE html>
<html lang="id">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Dashboard | Proyek Bina Desa')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets-template/img/favicon.png') }}">

    <!-- Nucleo Icons -->
    <link rel="stylesheet" href="{{ asset('assets-template/css/nucleo-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-template/css/nucleo-svg.css') }}">

    <!-- Soft UI Dashboard CSS -->
    <link rel="stylesheet" href="{{ asset('assets-template/css/soft-ui-dashboard.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    

    @stack('styles')
</head>

<body class="g-sidenav-show bg-gray-100">
    <!-- Sidebar -->
    <aside
        class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark"
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0 d-flex align-items-center" href="{{ route('home.index') }}">
                <i class="fas fa-building text-primary fs-4 me-2 opacity-10"></i>
                <span class="ms-1 fw-bold text-white" style="font-size: 1.5rem; letter-spacing: 1px; font-family: 'Poppins', sans-serif;">
                    Bina Desa
                </span>
            </a>
        </div>

        <hr class="horizontal light mt-0 mb-2">

        <div class="collapse navbar-collapse w-auto h-auto overflow-visible" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('home.index') ? 'active bg-gradient-primary' : '' }}"
                        href="{{ route('home.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('aset.index') }}"
                        class="nav-link text-white {{ request()->routeIs('aset.*') ? 'active bg-gradient-primary' : '' }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-box-2 text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Aset</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('kategori_aset.index') }}"
                        class="nav-link text-white {{ request()->routeIs('kategori_aset.*') ? 'active bg-gradient-primary' : '' }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tag text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Kategori Aset</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('lokasi_aset.index') }}"
                        class="nav-link text-white {{ request()->routeIs('lokasi_aset.*') ? 'active bg-gradient-primary' : '' }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-pin-3 text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Lokasi Aset</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ route('pemeliharaan_aset.index') }}"
                        class="nav-link text-white {{ request()->routeIs('pemeliharaan_aset.*') ? 'active bg-gradient-primary' : '' }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-settings text-danger text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Pemeliharaan</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('mutasi_aset.index') }}"
                        class="nav-link text-white {{ request()->routeIs('mutasi_aset.*') ? 'active bg-gradient-primary' : '' }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-archive-2 text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Mutasi Aset</span>
                    </a>
                </li>

                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
                        Account
                    </h6>
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

    <!-- Main Content -->
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm">
                            <a class="opacity-5 text-dark" href="#">Pages</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
                            @yield('page')
                        </li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">@yield('page-title')</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <ul class="navbar-nav justify-content-end ms-3">
                        <li class="nav-item d-flex align-items-center">
                            <a href="{{ route('login.index') }}" class="nav-link text-body font-weight-bold px-0">
                                <i class="fa fa-user me-sm-1"></i>
                                <span class="d-sm-inline d-none">{{ session('user', 'Admin') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main content from each page -->
        <div class="container-fluid py-4">
            @yield('content')

            <!-- Footer -->
            {{-- <footer class="footer pt-3">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="text-center text-sm text-muted text-lg-start">
                                © <script>document.write(new Date().getFullYear())</script>, Bina Desa
                            </div>
                        </div>
                    </div>
                </div>
            </footer> --}}
        </div>
    </main>

    <!-- Core JS -->
    <script src="{{ asset('assets-template/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets-template/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets-template/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets-template/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets-template/js/soft-ui-dashboard.min.js') }}"></script>

    @stack('scripts')
</body>
</html>
