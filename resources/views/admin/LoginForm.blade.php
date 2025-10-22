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

    <style>
        body, html {
            height: 100%;
        }

        .vh-lg-100 {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            max-width: 450px;
            margin: 0 auto;
        }

        .bg-soft {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
    </style>
</head>

<body class="bg-soft">
    <main>
        <!-- Section -->
        <section class="vh-lg-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 login-card">
                            <div class="text-center mb-4">
                                <h1 class="mb-2 h3">Bina Desa</h1>
                                <p class="text-muted mb-0">Sistem Informasi Pembangunan Desa</p>
                            </div>

                            @if(session('success'))
                            <div class="alert alert-success d-flex align-items-center" role="alert">
                                <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                {{ session('success') }}
                            </div>
                            @endif

                            @if(session('error'))
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ session('error') }}
                            </div>
                            @endif

                            <form action="{{ route('login.store') }}" method="POST" class="mt-4">
                                @csrf

                                <!-- Username -->
                                <div class="form-group mb-4">
                                    <label for="username" class="form-label">Username</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                            </svg>
                                        </span>
                                        <input type="text" class="form-control @error('username') is-invalid @enderror"
                                               placeholder="Username" id="username" name="username"
                                               value="{{ old('username') }}" autofocus required>
                                    </div>
                                    @error('username')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="form-group mb-4">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                        <input type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror"
                                               id="password" name="password" required>
                                    </div>
                                    @error('password')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Button -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Masuk</button>
                                </div>
                            </form>

                            <!-- Register Link -->
                            <div class="text-center mt-4">
                                <span class="fw-normal text-muted">
                                    Belum punya akun?
                                    <a href="{{ route('login.register.form') }}" class="fw-bold text-primary">Registrasi di sini</a>
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
