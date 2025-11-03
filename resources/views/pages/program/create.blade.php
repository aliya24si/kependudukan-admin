@extends('layouts.admin.app')

@section('content')
<div class="container py-5">
    <h3 class="mb-4">Tambah Program Baru</h3>

    <a href="{{ route('program.index') }}" class="btn btn-secondary mb-3">← Kembali</a>

    <form action="{{ route('program.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Kode Program</label>
            <input type="text" name="kode" class="form-control" value="{{ old('kode') }}" required>
        </div>
        <div class="mb-3">
            <label>Nama Program</label>
            <input type="text" name="nama_program" class="form-control" value="{{ old('nama_program') }}" required>
        </div>
        <div class="mb-3">
            <label>Tahun</label>
            <input type="number" name="tahun" class="form-control" value="{{ old('tahun') }}" required>
        </div>
        <div class="mb-3">
            <label>Anggaran (Rp)</label>
            <input type="number" name="anggaran" class="form-control" value="{{ old('anggaran') }}" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi') }}</textarea>
        </div>
        <div class="mb-3">
            <label>Media (opsional)</label>
            <input type="text" name="media" class="form-control" value="{{ old('media') }}">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
