@include('admin.layout.header')

<body class="g-sidenav-show bg-gray-100">

    {{-- Sidebar --}}
    @include('admin.layout.sidebar')

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

                <!-- Navbar kanan -->
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <ul class="navbar-nav justify-content-end align-items-center ms-auto">

                        <!-- Nama User -->
                        <li class="nav-item d-flex align-items-center me-3">
                            <i class="fa fa-user text-primary me-2"></i>
                            <span class="text-dark font-weight-bold">{{ session('user', 'Admin') }}</span>
                        </li>

                        <!-- Tombol Logout -->
                        <li class="nav-item d-flex align-items-center">
                            <a class="nav-link text-white" href="{{ route('login.index') }}">
                                <i class="ni ni-button-power text-danger text-sm opacity-10"></i>
                                <span class="nav-link-text ms-1">Logout</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <!-- Konten utama halaman -->
        <div class="px-4 py-4">
            @yield('content')
        </div>

        {{-- Footer --}}
        @include('admin.layout.footer')

        <!-- Floating WhatsApp Button -->
        <a href="https://wa.me/6285836969009?text=Halo%20Admin%2C%20saya%20ingin%20bertanya%20tentang%20sistem%20ini"
            class="whatsapp-float" target="_blank" title="Hubungi via WhatsApp">
            <img src="{{ asset('assets-template/img/wa.png') }}" alt="WhatsApp">
        </a>

        <!-- Style Floating WhatsApp -->
        <style>
            .whatsapp-float {
                position: fixed;
                bottom: 25px;
                right: 25px;
                width: 60px;
                height: 60px;
                background-color: #25D366;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
                z-index: 9999;
                transition: all 0.3s ease;
            }

            .whatsapp-float img {
                width: 35px;
                height: 35px;
            }

            .whatsapp-float:hover {
                transform: scale(1.1);
                background-color: #1ebe5d;
            }

            .whatsapp-float::after {
                content: '';
                position: absolute;
                width: 60px;
                height: 60px;
                border-radius: 50%;
                background: rgba(37, 211, 102, 0.4);
                animation: pulse 1.6s infinite;
                z-index: -1;
            }

            @keyframes pulse {
                0% {
                    transform: scale(1);
                    opacity: 0.8;
                }

                100% {
                    transform: scale(1.8);
                    opacity: 0;
                }
            }
        </style>

    </main>
</body>
</html>
