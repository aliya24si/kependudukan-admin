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
    <div class="login-wrapper">
        <!-- Panel Kiri -->
        <div class="login-left">
            <div class="logo mb-4">
                <img src="{{ asset('assets-admin/images/logo/icon-logo.png') }}" alt="Logo" style="width: 200px;">
            </div>
            <h1>Hey, Hello!</h1>
            <p class="subtitle">Selamat datang di Sistem Informasi Bantuan Sosial</p>
            <p class="desc">Platform resmi untuk mengelola dan memantau penyaluran bantuan sosial pemerintah.
                Silakan masuk menggunakan akun yang telah terdaftar.</p>
        </div>

        <!-- Panel Kanan -->
        <div class="login-right">
            <div class="login-card">
                <h2>Welcome Back</h2>
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

                <!-- Form Login -->
                <form action="{{ route('login.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="email" placeholder="email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Password" required>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input"> Remember Me
                        </label>
                        <a href="#" class="forgot">Forgot Password?</a>
                    </div>

                    <button type="submit" class="btn-login">Login</button>


                </form>
            </div>
        </div>
    </div>
</body>

</html>
