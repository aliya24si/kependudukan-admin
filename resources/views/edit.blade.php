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
                        <a href="dashboard" class="nav-item nav-link active">Home</a>
                        <a href="about" class="nav-item nav-link">About</a>
                        <a href="program" class="nav-item nav-link active">Program Bantuan</a>
                        <a href="warga" class="nav-item nav-link">Data Warga</a>
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
            <div class="text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6 mb-4">BANTUAN SOSIAL PEMERINTAH</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="#!">Home</a></li>
                        <li class="breadcrumb-item"><a href="#!">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Program</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Event Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="section-title bg-white text-center text-primary px-3">Edit Program Bantuan</p>
            </div>
            <h1></h1>

            <div class="container mt-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form action="{{ route('event.update', $program->program_id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label>Kode</label>
                                <input type="text" name="kode" value="{{ $program->kode }}"
                                    class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Nama Program</label>
                                <input type="text" name="nama_program" value="{{ $program->nama_program }}"
                                    class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Tahun</label>
                                <input type="number" name="tahun" value="{{ $program->tahun }}"
                                    class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Anggaran</label>
                                <input type="number" step="0.01" name="anggaran"
                                    value="{{ $program->anggaran }}" class="form-control" required>
                            </div> <!-- Pemisah nol itu titik -->
                            <div class="mb-3">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" class="form-control">{{ $program->deskripsi }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label>Media</label>
                                <input type="text" name="media" value="{{ $program->media }}"
                                    class="form-control">
                            </div>
                            <button type="submit" class="btn btn-success">Perbarui</button>
                            <a href="{{ route('event.index') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Event End -->
@endsection
