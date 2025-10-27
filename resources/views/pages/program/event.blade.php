@extends('layouts.admin.app')

@section('content')
    <!-- Navbar Start -->
    <div class="container-fluid bg-secondary px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="nav-bar">
            <nav class="navbar navbar-expand-lg bg-primary navbar-dark px-4 py-lg-0">
                <h4 class="d-lg-none m-0">Menu</h4>
                <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav me-auto">
                        <a href="dashboard" class="nav-item nav-link">Home</a>
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
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Terjadi kesalahan:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- Form tambah data -->
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-primary text-white">Tambah Program</div>
                <div class="card-body">
                    <form action="{{ route('programs') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col">
                                <label>Kode</label>
                                <input type="text" name="kode" class="form-control" required>
                            </div>
                            <div class="col">
                                <label>Nama Program</label>
                                <input type="text" name="nama_program" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label>Tahun</label>
                                <input type="number" name="tahun" class="form-control" required>
                            </div>
                            <div class="col">
                                <label>Anggaran</label>
                                <input type="number" name="anggaran" step="0.01" class="form-control" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label>Media (dokumen/gambar)</label>
                            <input type="text" name="media" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>

            <!-- Tabel daftar program -->
            <div class="card shadow-sm">
                <div class="card-header bg-secondary text-white">Data Program</div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama Program</th>
                                <th>Tahun</th>
                                <th>Anggaran</th>
                                <th>Media</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($programs as $program)
                                <tr>
                                    <td>{{ $program->kode }}</td>
                                    <td>{{ $program->nama_program }}</td>
                                    <td>{{ $program->tahun }}</td>
                                    <td>{{ number_format($program->anggaran, 2) }}</td>
                                    <td>{{ $program->media }}</td>
                                    <td>
                                        <a href="{{ route('programs', $program->program_id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('programs', $program->program_id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin hapus?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">Belum ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <!-- Event End -->
@endsection
