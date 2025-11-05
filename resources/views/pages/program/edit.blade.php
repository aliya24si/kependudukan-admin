@extends('layouts.admin.app')

@section('content')
    <div class="container py-5">
        <h3 class="mb-4">Edit Program</h3>

        {{-- Tombol Kembali --}}
        <a href="{{ route('programs.index') }}" class="mb-3 d-inline-block">
            <i class="fas fa-chevron-left"></i> Kembali
        </a>

        {{-- Form Edit --}}
        <form action="{{ route('programs.update', $program->program_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Kode Program</label>
                <input type="text" name="kode" class="form-control"
                       value="{{ old('kode', $program->kode) }}" required>
            </div>

            <div class="mb-3">
                <label>Nama Program</label>
                <input type="text" name="nama_program" class="form-control"
                       value="{{ old('nama_program', $program->nama_program) }}" required>
            </div>

            <div class="mb-3">
                <label>Tahun</label>
                <input type="number" name="tahun" class="form-control"
                       value="{{ old('tahun', $program->tahun) }}" required>
            </div>

            <div class="mb-3">
                <label>Anggaran (Rp)</label>
                <input type="number" name="anggaran" class="form-control"
                       value="{{ old('anggaran', $program->anggaran) }}" required>
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $program->deskripsi) }}</textarea>
            </div>

            <div class="mb-3">
                <label>Media</label>
                <input type="text" name="media" class="form-control"
                       value="{{ old('media', $program->media) }}">
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection
