<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <span class="navbar-brand">Dashboard</span>
        <span class="text-white">Welcome, {{ $username }}</span>
    </div>
</nav>

<div class="container mt-5">
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card shadow-sm text-center p-4">
                <h5>Program Bantuan</h5>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm text-center p-4">
                <h5>Pendaftar Bantuan</h5>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm text-center p-4">
                <h5>Verifikasi Lapangan</h5>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm text-center p-4">
                <h5>Penerima Bantuan</h5>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm text-center p-4">
                <h5>Riwayat Penyaluran Bantuan</h5>
            </div>
        </div>
    </div>
</div>

</body>
</html>
