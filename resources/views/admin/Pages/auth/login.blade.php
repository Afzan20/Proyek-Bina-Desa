<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login | Bina Desa</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="{{ asset('assets-template/css/nucleo-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-template/css/nucleo-svg.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-template/css/soft-ui-dashboard.css') }}" rel="stylesheet">

    <style>
        :root {
            --purple: #6b21a8;
            --blue: #2563eb;
            --grad: linear-gradient(135deg, var(--purple), var(--blue));
        }

        html,
        body {
            height: 100%;
            margin: 0;
            font-family: "Open Sans", sans-serif;
            background: #f8fafc;
        }

        .split-container {
            display: flex;
            min-height: 100vh;
        }

        /* KIRI = gambar besar (FULL HEIGHT) */
        .split-left {
            flex: 1;
            background: url('{{ asset('assets-template/img/inventaris.png') }}') center/cover no-repeat;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
        }

        /* overlay gradient agar tulisan kontras */
        .split-left::before {
            content: "";
            position: absolute;
            inset: 0;
            background-image: var(--grad);
            opacity: 0.85;
            mix-blend-mode: multiply;
        }

        .left-content {
            position: relative;
            z-index: 2;
            text-align: center;
            padding: 0 32px;
            max-width: 520px;
        }

        .left-content h1 {
            font-size: 2.4rem;
            margin-bottom: 12px;
            font-weight: 800;
        }

        .left-content p {
            color: rgba(255, 255, 255, 0.95);
            line-height: 1.6;
        }

        /* KANAN = form (di atas) + module-info (di bawah) */
        .split-right {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 48px 40px;
            background: #ffffff;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            padding: 34px;
            border-radius: 16px;
            background: #fff;
            box-shadow: 0 10px 30px rgba(20, 20, 30, 0.08);
            margin-bottom: 28px;
            text-align: left;
        }

        .login-card .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            justify-content: center;
            margin-bottom: 10px;
        }

        .login-card .brand img {
            width: 72px;
            height: 72px;
            object-fit: cover;
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(107, 33, 168, 0.12);
        }

        .login-title {
            text-align: center;
            margin-bottom: 18px;
            font-weight: 700;
            font-size: 1.15rem;
            background: linear-gradient(135deg, #6b21a8, #2563eb);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .form-label {
            font-size: 0.85rem;
            color: #374151;
            font-weight: 600;
        }

        .form-control {
            border-radius: 8px;
            padding: 10px 12px;
        }

        .btn-primary {
            background: linear-gradient(90deg, #6b21a8, #2563eb);
            border: none;
            padding: 8px 18px;
            border-radius: 10px;
            color: #fff;
            box-shadow: 0 8px 20px rgba(107, 33, 168, 0.12);
        }

        /* Module info (DI BAWAH BOX LOGIN) */
        .module-info {
            width: 100%;
            max-width: 420px;
            text-align: center;
            margin-top: 8px;
            padding: 18px;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 8px 30px rgba(16, 24, 40, 0.04);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        .module-info h5 {
            margin: 0;
            font-size: 1.05rem;
            color: #111827;
            font-weight: 700;
        }

        .module-info p {
            margin: 0;
            color: #6b7280;
            font-size: 0.92rem;
            line-height: 1.45;
        }

        @media (max-width: 992px) {
            .split-container {
                flex-direction: column;
            }

            .split-left {
                min-height: 36vh;
                width: 100%;
            }

            .split-right {
                padding: 28px;
                min-height: 64vh;
            }

            .login-card,
            .module-info {
                max-width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="split-container">

        <!-- BAGIAN KIRI (Background + Tulisan) -->
        <div class="split-left">
            <div class="left-content">
                <h1>Selamat Datang di Sistem Inventaris & Aset</h1>
                <p>Kelola inventaris dan aset desa secara efisien, akurat, dan transparan.</p>
            </div>
        </div>

        <!-- BAGIAN KANAN (Form Login) -->
        <div class="split-right">
            <div class="login-card">
                <div class="brand">
                    <img src="{{ asset('assets-template/img/login.png') }}" alt="Logo Bina Desa">
                </div>

                <div class="login-title">Masuk ke Akun Anda</div>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form method="POST" action="{{ route('login.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input id="email" type="email" name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="contoh: nama@email.com" value="{{ old('email') }}">
                        @error('email')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <input id="password" type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="Masukkan password Anda">
                        @error('password')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('login.register.form') }}" class="small text-primary">Belum punya akun?</a>
                        <button type="submit" class="btn btn-primary">MASUK</button>
                    </div>
                </form>
            </div>

            <div class="module-info">
                <h5>Inventaris dan Aset</h5>
                <p>Sistem Manajemen Inventaris dan Aset.<br>
                    "Bersama membangun desa yang lebih maju dan mandiri."</p>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets-template/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets-template/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets-template/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets-template/js/plugins/smooth-scrollbar.min.js') }}"></script>
</body>

<!-- Floating WhatsApp Button -->
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
                background-color: #f7faf8;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
                z-index: 9999;
                transition: all 0.3s ease;
            }

            .whatsapp-float img {
                width: 100px;
                height: auto;
            }


            .whatsapp-float:hover {
                transform: scale(1.1);
                background-color: #f3f7f5;
            }

            .whatsapp-float::after {
                content: '';
                position: absolute;
                width: 60px;
                height: 60px;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.418);
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


</html>
