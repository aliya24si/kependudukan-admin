@extends('layouts.admin.app')

@section('content')
<div class="container py-5">
    <h3 class="mb-4">Tambah Verifikasi Lapangan</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('verifikasi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Pendaftar</label>
            <select name="pendaftar_id" class="form-select" required>
                <option value="">-- Pilih Pendaftar --</option>
                @foreach($pendaftar as $p)
                    <option value="{{ $p->pendaftar_id }}" @selected(old('pendaftar_id') == $p->pendaftar_id)>
                        {{ optional($p->warga)->nama ?? "Pendaftar #{$p->pendaftar_id}" }}
                    </option>
                @endforeach
            </select>
            @error('pendaftar_id')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Petugas</label>
            <input type="text" name="petugas" class="form-control" value="{{ old('petugas') }}" required>
            @error('petugas')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', now()->format('Y-m-d')) }}" required>
            @error('tanggal')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Catatan</label>
            <textarea name="catatan" class="form-control" rows="4">{{ old('catatan') }}</textarea>
            @error('catatan')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Skor</label>
            <input type="number" name="skor" class="form-control" value="{{ old('skor') }}">
            @error('skor')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Foto Verifikasi (boleh >1)</label>
            <input type="file" name="media[]" class="form-control" accept="image/*" multiple>
            <small class="text-muted">Format: jpg, jpeg, png — Max 4MB per file</small>
            @error('media.*')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="d-flex gap-2">
            <button class="btn btn-success" type="submit"><i class="fa fa-save me-1"></i> Simpan</button>
            <a href="{{ route('verifikasi.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
