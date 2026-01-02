@extends('layouts.admin.app')

@section('content')
    <div class="container py-5">

        <h3 class="mb-4">Detail Verifikasi</h3>

        <div class="row g-4">

            {{-- ================= KIRI : DETAIL VERIFIKASI ================= --}}
            <div class="col-md-4">

                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">
                            @if ($ver->pendaftar && $ver->pendaftar->warga)
                                {{ $ver->pendaftar->warga->nama }}
                            @else
                                Pendaftar #{{ $ver->pendaftar_id }}
                            @endif
                        </h5>

                        <p class="mb-1">
                            <strong>Petugas:</strong> {{ $ver->petugas }}
                        </p>

                        <p class="mb-1">
                            <strong>Tanggal:</strong>
                            {{ \Carbon\Carbon::parse($ver->tanggal)->format('d M Y') }}
                        </p>

                        <p class="mb-1">
                            <strong>Skor:</strong> {{ $ver->skor ?? '-' }} %
                        </p>

                        <p class="mb-1">
                            <strong>Catatan:</strong><br>
                            {!! nl2br(e($ver->catatan ?: '-')) !!}
                        </p>

                    </div>
                </div>

            </div>

            {{-- ================= KANAN : FOTO VERIFIKASI ================= --}}
            <div class="col-md-8">

                <h5 class="mb-3">Foto Verifikasi</h5>

                <div class="d-flex flex-wrap gap-3 mb-4">
                    @forelse($ver->media as $m)
                        <div style="width:220px;">
                            <a href="{{ asset('storage/' . $m->file_path) }}" target="_blank">
                                <img src="{{ asset('storage/' . $m->file_path) }}" class="img-fluid rounded"
                                    style="width:220px; height:160px; object-fit:cover;">
                            </a>
                            <div class="mt-2 small text-muted">
                                {{ $m->file_name }}
                            </div>
                        </div>
                    @empty
                        <div class="text-muted">
                            Belum ada foto verifikasi.
                        </div>
                    @endforelse
                </div>

            </div>

        </div>

        <p></p>
        <a href="{{ route('verifikasi.edit', $ver->verifikasi_id) }}" class="btn btn-warning ">
            <i class="fa fa-edit me-1"></i> Edit
        </a>

        <a href="{{ route('verifikasi.index') }}" class="btn btn-secondary">
            <i class="fas fa-chevron-left"></i> Kembali
        </a>

    </div>
@endsection
