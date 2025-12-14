<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - Bantuan Sosial</title>

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
                Silakan buat akun baru untuk melanjutkan.
            </p>
        </div>
    </div>

    <!-- Panel Kanan -->
    <div class="login-right d-flex align-items-center justify-content-center w-100">
        <div class="login-card w-100" style="max-width: 420px;">

            <h1><strong>Register</strong></h1>
            <p class="small-text">Buat akun baru untuk masuk ke sistem</p>

            <!-- Error -->
            @if ($errors->any())
                <div class="alert alert-danger text-center py-2">
                    @foreach ($errors->all() as $error)
                        <small>{{ $error }}</small><br>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <input type="text" name="name" placeholder="Nama Lengkap"
                           value="{{ old('name') }}" required>
                </div>

                <div class="form-group">
                    <input type="email" name="email" placeholder="Email"
                           value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <select name="role" required>
                        <option value="">-- Pilih Role --</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>
                            Admin
                        </option>
                        <option value="staff" {{ old('role') == 'staff' ? 'selected' : '' }}>
                            Staff
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>

                <div class="form-group">
                    <input type="password" name="password_confirmation"
                           placeholder="Konfirmasi Password" required>
                </div>

                <div class="form-group">
                    <input type="file" name="profile_picture">
                    <small class="text-muted">Foto profil (opsional)</small>
                </div>

                <button type="submit" class="btn-login w-100">
                    Register
                </button>

            </form>

        </div>
    </div>

</div>
</body>
</html>
