@extends('layouts.admin.app')

@section('content')
    <div class="container py-5">
        <h3 class="mb-4">Tambah Data Warga</h3>

        <a href="{{ route('warga.index') }}" class="mb-3 d-inline-block">
            <i class="fas fa-chevron-left"></i> Kembali
        </a>

        <div class="card">
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
                            <input type="text" name="pekerjaan" class="form-control" value="{{ old('pekerjaan') }}">
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
    </div>
@endsection
