<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Berhasil - Bina Desa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .success-container {
            animation: zoomIn 0.6s ease-out;
        }

        @keyframes zoomIn {
            from {
                opacity: 0;
                transform: scale(0.8);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            text-align: center;
        }

        .success-icon {
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            padding: 3rem 1.5rem;
            color: white;
        }

        .success-icon i {
            font-size: 5rem;
            animation: bounce 1s ease infinite;
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .card-body {
            padding: 3rem 2rem;
        }

        .card-body h1 {
            color: #11998e;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .user-info {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 15px;
            margin: 1.5rem 0;
        }

        .user-info .username {
            font-size: 1.5rem;
            font-weight: 700;
            color: #11998e;
            margin-bottom: 0.5rem;
        }

        .user-info .role {
            color: #6c757d;
            font-size: 0.9rem;
        }

        .btn-dashboard {
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            border: none;
            padding: 0.75rem 2rem;
            font-weight: 600;
            font-size: 1rem;
            border-radius: 50px;
            color: white;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-dashboard:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(17, 153, 142, 0.4);
            color: white;
        }

        .btn-logout {
            background: transparent;
            border: 2px solid #dc3545;
            color: #dc3545;
            padding: 0.5rem 1.5rem;
            font-weight: 600;
            font-size: 0.9rem;
            border-radius: 50px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            margin-top: 1rem;
        }

        .btn-logout:hover {
            background: #dc3545;
            color: white;
        }

        .welcome-text {
            color: #6c757d;
            margin-bottom: 1rem;
        }

        .date-time {
            color: #6c757d;
            font-size: 0.9rem;
            margin-top: 1.5rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5 success-container">
                <div class="card">
                    <div class="success-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>

                    <div class="card-body">
                        <h1>Login Berhasil!</h1>
                        <p class="welcome-text">Selamat datang di Sistem Bina Desa</p>

                        <div class="user-info">
                            <div class="username">
                                <i class="fas fa-user-circle me-2"></i>
                                {{ session('user') }}
                            </div>
                            <div class="role">
                                <i class="fas fa-id-badge me-1"></i>
                                Administrator Desa
                            </div>
                        </div>

                        <p class="text-muted">
                            Anda berhasil masuk ke sistem. Silakan lanjutkan ke dashboard untuk mengelola data
                            pembangunan desa.
                        </p>

                        <div class="mt-4">
                            <a href="{{ route('home.index') }}" class="btn btn-success">
                                <i class="fas fa-tachometer-alt me-2"></i> Menuju Dashboard
                            </a>
                        </div>

                        <div>
                            <a href="/auth" class="btn-logout">
                                <i class="fas fa-sign-out-alt me-2"></i>
                                Keluar
                            </a>
                        </div>

                        <div class="date-time">
                            <i class="fas fa-calendar-alt me-2"></i>
                            {{ date('d F Y, H:i') }} WIB
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
