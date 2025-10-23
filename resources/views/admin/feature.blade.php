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
                        <a href="warga" class="nav-item nav-link active">Data Warga</a>
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

        {{-- Flash Messages --}}
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

        {{-- Form Tambah Data --}}
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">Tambah Data Warga</div>
            <div class="card-body">
                <form action="{{ route('warga.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col">
                            <label>No KTP</label>
                            <input type="text" name="no_ktp" class="form-control" value="{{ old('no_ktp') }}">
                        </div>
                        <div class="col">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control">
                                <option value="">-- Pilih --</option>
                                <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                                    Laki-laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan</option>
                            </select>
                        </div>
                        <div class="col">
                            <label>Agama</label>
                            <input type="text" name="agama" class="form-control" value="{{ old('agama') }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label>Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control"
                                value="{{ old('pekerjaan') }}">
                        </div>
                        <div class="col">
                            <label>No Telp</label>
                            <input type="text" name="telp" class="form-control" value="{{ old('telp') }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>

        {{-- Tabel Data --}}
        <div class="card">
            <div class="card-header bg-secondary text-white">Daftar Warga</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No KTP</th>
                            <th>Nama</th>
                            <th>JK</th>
                            <th>Agama</th>
                            <th>Pekerjaan</th>
                            <th>Telp</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($warga as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->no_ktp }}</td>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->jenis_kelamin }}</td>
                                <td>{{ $row->agama }}</td>
                                <td>{{ $row->pekerjaan }}</td>
                                <td>{{ $row->telp }}</td>
                                <td>{{ $row->email }}</td>
                                <td>
                                    <a href="{{ route('warga.edit', $row->warga_id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('warga.destroy', $row->warga_id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Hapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">Belum ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- Features End -->
@endsection
