@extends('layouts.admin.app')

@section('content')
<div class="container py-5">
    <h3 class="mb-4">Edit Verifikasi</h3>

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

    <form action="{{ route('verifikasi.update', $ver->verifikasi_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Pendaftar</label>
            <select name="pendaftar_id" class="form-select" required>
                <option value="">-- Pilih Pendaftar --</option>
                @foreach($pendaftar as $p)
                    <option value="{{ $p->pendaftar_id }}"
                        @selected(old('pendaftar_id', $ver->pendaftar_id) == $p->pendaftar_id)>
                        {{ optional($p->warga)->nama ?? "Pendaftar #{$p->pendaftar_id}" }}
                    </option>
                @endforeach
            </select>
            @error('pendaftar_id')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Petugas</label>
            <input type="text" name="petugas" class="form-control" value="{{ old('petugas', $ver->petugas) }}" required>
            @error('petugas')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', $ver->tanggal) }}" required>
            @error('tanggal')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Catatan</label>
            <textarea name="catatan" class="form-control" rows="4">{{ old('catatan', $ver->catatan) }}</textarea>
            @error('catatan')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Skor</label>
            <input type="number" name="skor" class="form-control" value="{{ old('skor', $ver->skor) }}">
            @error('skor')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
        </div>

        {{-- Existing media --}}
        <div class="mb-3">
            <label class="form-label">Foto Verifikasi (existing)</label>
            <div class="d-flex flex-wrap gap-2">
                @foreach($ver->media as $m)
                    <div class="position-relative" style="width:120px;">
                        <img src="{{ asset('storage/' . $m->file_path) }}" class="img-fluid rounded" style="width:120px; height:120px; object-fit:cover;">
                        <form action="{{ route('verifikasi.media.delete', $m->media_id) }}" method="POST" style="position:absolute; top:6px; right:6px;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus foto ini?')">
                                <i class="fa fa-times"></i>
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Upload more --}}
        <div class="mb-3">
            <label class="form-label">Tambah Foto Verifikasi (boleh lebih dari 1)</label>
            <input type="file" name="media[]" class="form-control" accept="image/*" multiple>
            <small class="text-muted">Format: jpg, jpeg, png — Max 4MB per file</small>
            @error('media.*')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="d-flex gap-2">
            <button class="btn btn-primary" type="submit"><i class="fa fa-save me-1"></i> Update</button>
            <a href="{{ route('verifikasi.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
