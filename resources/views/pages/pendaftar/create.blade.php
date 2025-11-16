@extends('layouts.admin.app')

@section('content')
<div class="container py-5">
    <h3 class="mb-4">Tambah Pendaftar Bantuan</h3>

    <a href="{{ route('pendaftar.index') }}" class="mb-3 d-inline-block">
        <i class="fas fa-chevron-left"></i> Kembali
    </a>

    <form action="{{ route('pendaftar.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Warga</label>
            <select name="warga_id" class="form-control" required>
                <option value="">-- Pilih Warga --</option>
                @foreach ($warga as $w)
                    <option value="{{ $w->id }}">{{ $w->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Program Bantuan</label>
            <select name="program_id" class="form-control" required>
                <option value="">-- Pilih Program --</option>
                @foreach ($program as $p)
                    <option value="{{ $p->program_id }}">{{ $p->nama_program }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="pending">Pending</option>
                <option value="diterima">Diterima</option>
                <option value="ditolak">Ditolak</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Berkas</label>
            <input type="file" name="berkas" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
