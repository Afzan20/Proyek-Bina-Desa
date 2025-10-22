<!DOCTYPE html>
<html lang="id">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sign up | Bina Desa</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets-template/img/favicon.png') }}">

    <!-- Nucleo Icons CSS -->
    <link type="text/css" href="{{ asset('assets-template/css/nucleo-icons.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets-template/css/nucleo-svg.css') }}" rel="stylesheet">

    <!-- Soft UI Dashboard CSS -->
    <link type="text/css" href="{{ asset('assets-template/css/soft-ui-dashboard.css') }}" rel="stylesheet">
</head>

<body>
    <main>
        <!-- Section -->
        <section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center form-bg-image">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-600">
                            <div class="text-center text-md-center mb-4 mt-md-0">
                                <h1 class="mb-0 h3">Registrasi Akun</h1>
                                <p class="text-muted">Buat akun baru untuk Sistem Bina Desa</p>
                            </div>

                            @if(session('error'))
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ session('error') }}
                            </div>
                            @endif

                            @if($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <strong>Terdapat kesalahan:</strong>
                                <ul class="mb-0 mt-2">
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <form action="{{ route('login.register') }}" method="POST" class="mt-4">
                                @csrf

                                <!-- Nama -->
                                <div class="form-group mb-4">
                                    <label for="nama">Nama Lengkap</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                               placeholder="Masukkan nama lengkap" id="nama" name="nama"
                                               value="{{ old('nama') }}" required>
                                    </div>
                                    @error('nama')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Alamat -->
                                <div class="form-group mb-4">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control @error('alamat') is-invalid @enderror"
                                              placeholder="Masukkan alamat lengkap (maksimal 300 karakter)"
                                              id="alamat" name="alamat" rows="3" maxlength="300" required>{{ old('alamat') }}</textarea>
                                    @error('alamat')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tanggal Lahir -->
                                <div class="form-group mb-4">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                               id="tanggal_lahir" name="tanggal_lahir"
                                               value="{{ old('tanggal_lahir') }}" required>
                                    </div>
                                    @error('tanggal_lahir')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Username -->
                                <div class="form-group mb-4">
                                    <label for="username">Username</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                            </svg>
                                        </span>
                                        <input type="text" class="form-control @error('username') is-invalid @enderror"
                                               placeholder="Masukkan username" id="username" name="username"
                                               value="{{ old('username') }}" required>
                                    </div>
                                    @error('username')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="form-group mb-4">
                                    <label for="password">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                               placeholder="Password" id="password" name="password" required>
                                    </div>
                                    <small class="text-muted">Password harus mengandung huruf kapital dan angka</small>
                                    @error('password')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Confirm Password -->
                                <div class="form-group mb-4">
                                    <label for="confirm_password">Konfirmasi Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                        <input type="password" class="form-control @error('confirm_password') is-invalid @enderror"
                                               placeholder="Ulangi password" id="confirm_password" name="confirm_password" required>
                                    </div>
                                    @error('confirm_password')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-gray-800">Daftar</button>
                                </div>
                            </form>

                            <div class="d-flex justify-content-center align-items-center mt-4">
                                <span class="fw-normal">
                                    Sudah punya akun?
                                    <a href="{{ route('login.index') }}" class="fw-bold">Login di sini</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
