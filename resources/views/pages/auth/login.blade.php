<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Bantuan Sosial</title>

    <link rel="icon" href="{{ asset('assets-admin/images/fevicon.png') }}" type="image/png" />
    <link rel="stylesheet" href="{{ asset('assets-admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/css/login-modern.css') }}">
</head>

<body>
<div class="login-wrapper min-vh-100 d-flex">

    <!-- Panel Kiri -->
    <div class="login-left d-none d-lg-flex align-items-center">
        <div class="logo mb-4">
            <img src="{{ asset('assets-admin/images/logo/bina-desa.png') }}"
                 alt="Logo"
                 class="img-fluid"
                 style="max-width: 450px;">
            <p class="subtitle">Selamat datang di Sistem Informasi Bantuan Sosial</p>
            <p class="desc">
                Platform resmi untuk mengelola dan memantau penyaluran bantuan sosial pemerintah.
                Silakan masuk menggunakan akun yang telah terdaftar.
            </p>
        </div>
    </div>

    <!-- Panel Kanan -->
    <div class="login-right d-flex align-items-center justify-content-center w-100">
        <div class="login-card w-100" style="max-width: 420px;">

            <h1><strong>Welcome!</strong></h1>
            <p class="small-text">Masuk untuk melanjutkan ke sistem Anda</p>

            <!-- Notifikasi logout sukses -->
            @if (session('success'))
                <div class="alert alert-success text-center py-2">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Notifikasi error -->
            @if ($errors->any())
                <div class="alert alert-danger text-center py-2">
                    @foreach ($errors->all() as $error)
                        <small>{{ $error }}</small><br>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('login.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <input type="text" name="email" placeholder="Email" required>
                </div>

                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>

                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('register') }}" class="forgot">Register?</a>
                </div>

                <button type="submit" class="btn-login w-100">
                    Login
                </button>
            </form>

        </div>
    </div>

</div>
</body>
</html>
