@extends('layouts.admin.app')

@section('content')
    <div class="container py-5">
        <h3 class="mb-4">Edit Data Warga</h3>

        <a href="{{ route('warga.index') }}" class="mb-3 d-inline-block">
            <i class="fas fa-chevron-left"></i> Kembali
        </a>

        @if ($errors->any())
            <div class="alert alert-danger mb-3">
                <strong>Terjadi kesalahan:</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('warga.update', $warga->warga_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>No KTP</label>
                <input type="text" name="no_ktp" class="form-control" value="{{ old('no_ktp', $warga->no_ktp) }}">
            </div>

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama', $warga->nama) }}">
            </div>

            <div class="mb-3">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control">
                    <option value="">-- Pilih --</option>
                    <option value="Laki-laki"
                        {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                    </option>
                    <option value="Perempuan"
                        {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan
                    </option>
                </select>
            </div>

            <div class="mb-3">
                <label>Agama</label>
                <input type="text" name="agama" class="form-control" value="{{ old('agama', $warga->agama) }}">
            </div>

            <div class="mb-3">
                <label>Pekerjaan</label>
                <input type="text" name="pekerjaan" class="form-control"
                    value="{{ old('pekerjaan', $warga->pekerjaan) }}">
            </div>

            <div class="mb-3">
                <label>No Telp</label>
                <input type="text" name="telp" class="form-control" value="{{ old('telp', $warga->telp) }}">
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $warga->email) }}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
