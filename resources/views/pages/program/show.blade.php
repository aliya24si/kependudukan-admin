@extends('layouts.admin.app')

@section('content')
    <div class="container py-5">

        <h3 class="mb-4">Detail Program</h3>

        <a href="{{ route('programs.index') }}" class="mb-3 d-inline-block">
            <i class="fas fa-chevron-left"></i> Kembali
        </a>

        <div class="card shadow-sm">
            <div class="card-body">

                <h4>{{ $program->nama_program }}</h4>
                <p class="text-muted mb-4">
                    Kode: <strong>{{ $program->kode }}</strong> |
                    Tahun: <strong>{{ $program->tahun }}</strong>
                </p>

                <div class="mb-3">
                    <label class="fw-bold">Anggaran</label>
                    <p>Rp {{ number_format($program->anggaran, 0, ',', '.') }}</p>
                </div>

                <div class="mb-3">
                    <label class="fw-bold">Deskripsi</label>
                    <p>{{ $program->deskripsi ?? '-' }}</p>
                </div>

                <hr>

                {{-- MEDIA --}}
                <div class="mb-3">
                    <label class="fw-bold">Media Program</label>

                    <div class="row g-3 mt-2">
                        @forelse ($files as $media)
                            <div class="col-md-3">
                                <div class="card shadow-sm">

                                    {{-- Thumbnail --}}
                                    <a href="{{ asset('storage/' . $media->file_path) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $media->file_path) }}" class="card-img-top"
                                            style="height:180px; object-fit:cover;">
                                    </a>

                                    <div class="card-body p-2 text-center">

                                        {{-- Nama file --}}
                                        <p class="small text-muted"
                                            style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                            {{ $media->caption ?? $media->file_name }}
                                        </p>

                                        {{-- Tombol Hapus --}}
                                        <form action="{{ route('programs.media.destroy', $media->media_id) }}"
                                            method="POST" onsubmit="return confirm('Yakin hapus file ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm w-100">Hapus File</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted">Tidak ada media.</p>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
