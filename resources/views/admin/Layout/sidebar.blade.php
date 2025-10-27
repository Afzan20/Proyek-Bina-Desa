<!-- Sidebar -->
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark"
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
            <!-- Dashboard -->
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('home.index') ? 'active bg-gradient-primary' : '' }}"
                    href="{{ route('home.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1 fw-bold">Dashboard</span>
                </a>
            </li>

            <!-- Fitur Utama -->
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
                    Fitur Utama
                </h6>
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

            <!-- Master Data -->
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
                    Master Data
                </h6>
            </li>

            <li class="nav-item">
                <a href="{{ route('user.index') }}"
                    class="nav-link text-white {{ request()->routeIs('user.*') ? 'active bg-gradient-primary' : '' }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">User</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('warga.index') }}"
                    class="nav-link text-white {{ request()->routeIs('warga.*') ? 'active bg-gradient-primary' : '' }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-circle-08 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Warga</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
