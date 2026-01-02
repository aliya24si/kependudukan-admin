@extends('layouts.admin.app')

@section('content')
    <div class="container py-4">

        {{-- HEADER --}}
        <div class="d-flex align-items-center mb-3">
            <h4 class="mb-0 fw-semibold">Detail Program</h4>

        </div>
        <a href="{{ route('programs.index') }}" class="me-3 text-decoration-none">
            <i class="fas fa-chevron-left"></i> kembali
        </a>
        <p></p>

        {{-- ================= LAYOUT KIRI - KANAN ================= --}}
        <div class="row g-4">

            {{-- ================= KIRI : CARD INFO PROGRAM ================= --}}
            <div class="col-md-4">

                <div class="card shadow-sm border-0">
                    <div class="card-body">

                        <h5 class="fw-bold mb-3 text-uppercase">
                            {{ $program->nama_program }}
                        </h5>

                        <div class="mb-3">
                            <small class="text-muted">Kode</small>
                            <div class="fw-semibold">{{ $program->kode }}</div>
                        </div>

                        <div class="mb-3">
                            <small class="text-muted">Tahun</small>
                            <div class="fw-semibold">{{ $program->tahun }}</div>
                        </div>

                        <div class="mb-3">
                            <small class="text-muted">Anggaran</small>
                            <div class="fw-semibold">
                                Rp {{ number_format($program->anggaran, 0, ',', '.') }}
                            </div>
                        </div>

                        <div class="mt-4">
                            <small class="text-muted">Deskripsi</small>
                            <p class="mb-0">
                                {{ $program->deskripsi ?? '-' }}
                            </p>
                        </div>

                    </div>
                </div>

            </div>

            {{-- ================= KANAN : MEDIA PROGRAM (DI LUAR CARD) ================= --}}
            <div class="col-md-8">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="fw-bold mb-0">Media Program</h6>
                    <small class="text-muted">{{ $files->count() }} file</small>
                </div>

                <div class="row g-3">
                    @forelse ($files as $media)
                        @php
                            $imgUrl = str_starts_with($media->file_path, 'dummy/')
                                ? asset($media->file_path)
                                : asset('storage/' . $media->file_path);
                        @endphp

                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="text-center">

                                <a href="{{ $imgUrl }}" target="_blank">
                                    <img src="{{ $imgUrl }}" class="rounded shadow-sm mb-2"
                                        style="width:100%; height:150px; object-fit:cover;">
                                </a>

                                <p class="small text-muted mb-2 text-truncate">
                                    {{ $media->caption ?? $media->file_name }}
                                </p>

                                <form action="{{ route('programs.media.destroy', $media->media_id) }}" method="POST"
                                    onsubmit="return confirm('Yakin hapus file ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger w-100">
                                        Hapus
                                    </button>
                                </form>

                            </div>
                        </div>
                    @empty
                        <p class="text-muted">Tidak ada media.</p>
                    @endforelse
                </div>

            </div>

        </div>

    </div>
@endsection
