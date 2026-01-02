@extends('layouts.admin.app')

@section('content')
<div class="container py-5">
    <h3 class="mb-4">Edit Program</h3>

    {{-- Tombol Kembali --}}
    <a href="{{ route('programs.index') }}" class="mb-3 d-inline-block">
        <i class="fas fa-chevron-left"></i> Kembali
    </a>

    {{-- Form Edit --}}
    <form action="{{ route('programs.update', $program->program_id) }}"
          method="POST" enctype="multipart/form-data">
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

        {{-- Upload Media Baru --}}
        <div class="mb-3">
            <label>Tambah Dokumen / Foto Baru (opsional)</label>
            <input type="file" name="media[]" class="form-control" multiple>
            <small class="text-muted">Bisa upload lebih dari satu file</small>
        </div>

        {{-- Preview Media Lama --}}
        @if ($program->media && $program->media->count())
            <div class="mb-3">
                <label class="fw-bold">Media yang Sudah Ada</label>

                <div class="d-flex gap-3 flex-wrap mt-2">
                    @foreach ($program->media as $m)

                        @php
                            // 🔥 HANDLE DUMMY vs STORAGE
                            $imgUrl = str_starts_with($m->file_path, 'dummy/')
                                ? asset($m->file_path)
                                : asset('storage/' . $m->file_path);
                        @endphp

                        <div class="border p-2 rounded" style="width: 130px;">
                            <a href="{{ $imgUrl }}" target="_blank">
                                <img src="{{ $imgUrl }}"
                                     class="img-fluid rounded"
                                     style="height:90px; object-fit:cover;">
                            </a>

                            <p class="small text-muted mt-1"
                               style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                {{ $m->caption ?? $m->file_name }}
                            </p>
                        </div>

                    @endforeach
                </div>
            </div>
        @endif

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
