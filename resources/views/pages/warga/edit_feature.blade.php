@extends('layouts.admin.app')

@section('content')
    <!-- Navbar Start -->
    <div class="container-fluid bg-secondary px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="nav-bar">
            <nav class="navbar navbar-expand-lg bg-primary navbar-dark px-4 py-lg-0">
                <h4 class="d-lg-none m-0">Menu</h4>
                <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav me-auto">
                        <a href="dashboard" class="nav-item nav-link">Home</a>
                        <a href="about" class="nav-item nav-link">About</a>
                        <a href="program" class="nav-item nav-link">Program Bantuan</a>
                        <a href="feature" class="nav-item nav-link active">Data Warga</a>
                        <a href="users" class="nav-item nav-link">Data User</a>
                    </div>
                    <div class="d-none d-lg-flex ms-auto">
                        <a class="btn btn-square btn-dark ms-2" href="#!"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-dark ms-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-dark ms-2" href="#!"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-3 animated slideInDown">Data Warga</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#!">Home</a></li>
                    <li class="breadcrumb-item"><a href="#!">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Warga</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Features Start -->
    <div class="container mt-4">
        <div class="text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
            <p class="section-title bg-white text-center text-primary px-3">Edit Data Warga</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Terjadi kesalahan:</strong>
                <ul>
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('warga.update', $warga->warga_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row mb-3">
                <div class="col">
                    <label>No KTP</label>
                    <input type="text" name="no_ktp" class="form-control"
                        value="{{ old('no_ktp', $warga->no_ktp) }}">
                </div>
                <div class="col">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control"
                        value="{{ old('nama', $warga->nama) }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option value="">-- Pilih --</option>
                        <option value="Laki-laki"
                            {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                        </option>
                        <option value="Perempuan"
                            {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                            Perempuan</option>
                    </select>
                </div>
                <div class="col">
                    <label>Agama</label>
                    <input type="text" name="agama" class="form-control"
                        value="{{ old('agama', $warga->agama) }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label>Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="form-control"
                        value="{{ old('pekerjaan', $warga->pekerjaan) }}">
                </div>
                <div class="col">
                    <label>No Telp</label>
                    <input type="text" name="telp" class="form-control"
                        value="{{ old('telp', $warga->telp) }}">
                </div>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control"
                    value="{{ old('email', $warga->email) }}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('warga.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    <!-- Features End -->
@endsection
