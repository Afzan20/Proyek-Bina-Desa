<!DOCTYPE html>
<html lang="id">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sign in | Bina Desa</title>

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
    <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-5">
        <div class="card shadow p-4 bg-dark text-white">
            <div class="text-center mb-4">
                <h3 class="fw-bold text-white">Login Bina Desa</h3>
                <p class="text-secondary">Masukkan email dan password Anda</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ route('login.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Alamat Email</label>
                    <input type="email" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror"
                        placeholder="contoh: nama@email.com"
                        value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <input type="password" name="password" id="password"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="Masukkan password Anda">
                    @error('password')
                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('login.register.form') }}" class="text-primary small">Belum punya akun?</a>
                    <button type="submit" class="btn btn-primary">Masuk</button>
                </div>
            </form>
        </div>
    </div>
    </div>
 <!-- Core JS Files -->
    <script src="{{ asset('assets-template/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets-template/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets-template/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets-template/js/plugins/smooth-scrollbar.min.js') }}"></script>

    <!-- Control Center -->
    <script src="{{ asset('assets-template/js/soft-ui-dashboard.min.js') }}"></script>
</body>
