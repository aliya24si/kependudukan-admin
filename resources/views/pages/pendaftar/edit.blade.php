@extends('layouts.admin.app')

@section('content')
<div class="container py-5">
    <h3 class="mb-4">Edit Pendaftar Bantuan</h3>

    <a href="{{ route('pendaftar.index') }}" class="mb-3 d-inline-block">
        <i class="fas fa-chevron-left"></i> Kembali
    </a>

    <form action="{{ route('pendaftar.update', $pendaftar->pendaftar_id) }}"
          method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Warga</label>
            <select name="warga_id" class="form-control" required>
                @foreach ($warga as $w)
                    <option value="{{ $w->id }}"
                        {{ $pendaftar->warga_id == $w->id ? 'selected' : '' }}>
                        {{ $w->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Program Bantuan</label>
            <select name="program_id" class="form-control" required>
                @foreach ($program as $p)
                    <option value="{{ $p->program_id }}"
                        {{ $pendaftar->program_id == $p->program_id ? 'selected' : '' }}>
                        {{ $p->nama_program }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="pending"  {{ $pendaftar->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="diterima" {{ $pendaftar->status == 'diterima' ? 'selected' : '' }}>Diterima</option>
                <option value="ditolak"  {{ $pendaftar->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Berkas</label>
            <input type="file" name="berkas" class="form-control">

            @if ($pendaftar->berkas)
                <small class="text-muted">File: {{ $pendaftar->berkas }}</small>
            @endif
        </div>

        <button type="submit" class="btn btn-success">Update</button>

    </form>
</div>
@endsection
