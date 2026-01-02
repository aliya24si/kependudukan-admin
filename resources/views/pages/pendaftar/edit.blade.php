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

        {{-- Nama Warga --}}
        <div class="mb-3">
            <label>Nama Warga</label>
            <select name="warga_id" class="form-control" required>
                @foreach ($warga as $w)
                    <option value="{{ $w->warga_id }}"
                        {{ $pendaftar->warga_id == $w->warga_id ? 'selected' : '' }}>
                        {{ $w->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Program --}}
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

        {{-- Status --}}
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="pending"  {{ $pendaftar->status=='pending' ? 'selected':'' }}>Pending</option>
                <option value="diterima" {{ $pendaftar->status=='diterima'? 'selected':'' }}>Diterima</option>
                <option value="ditolak"  {{ $pendaftar->status=='ditolak' ? 'selected':'' }}>Ditolak</option>
            </select>
        </div>

        {{-- Upload media tambahan --}}
        <div class="mb-3">
            <label>Upload Berkas Tambahan (opsional, bisa banyak)</label>
            <input type="file" name="media[]" class="form-control" multiple>
            @error('media.*')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <hr>

        <h5 class="mb-3">Berkas Yang Sudah Ada</h5>

        <div class="row">
            @forelse($pendaftar->media as $m)
                <div class="col-md-3 mb-3">
                    <div class="border p-3 text-center rounded">

                        @if(Str::contains($m->file_type, 'image'))

                            @php
                                $src = Str::startsWith($m->file_path, 'dummy/')
                                    ? asset($m->file_path)
                                    : asset('storage/' . $m->file_path);
                            @endphp

                            <img src="{{ $src }}"
                                 style="width:100%; height:140px; object-fit:cover;">

                        @else
                            <i class="fa-solid fa-file-pdf fa-3x text-danger"></i>
                        @endif

                        <p class="small mt-2">{{ $m->file_name }}</p>

                        <form action="{{ route('pendaftar.media.destroy', $m->media_id) }}"
                              method="POST"
                              onsubmit="return confirm('Hapus berkas ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm w-100">Hapus</button>
                        </form>

                    </div>
                </div>
            @empty
                <p class="text-muted">Belum ada berkas</p>
            @endforelse
        </div>

        <button type="submit" class="btn btn-success mt-3">Update</button>

    </form>

</div>
@endsection
