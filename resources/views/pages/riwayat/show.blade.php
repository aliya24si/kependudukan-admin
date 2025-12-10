@extends('layouts.admin.app')

@section('content')
<div class="container py-4">

    <h3 class="mb-3">Detail Penyaluran Bantuan</h3>

    <a href="{{ route('riwayat.index') }}" class="btn btn-secondary mb-3">
        <i class="fa fa-arrow-left"></i> Kembali
    </a>

    <div class="card shadow-sm mb-4">
        <div class="card-body">

            <div class="row g-3">
                <div class="col-md-6">
                    <strong>Program:</strong><br>
                    {{ $riwayat->program->nama_program }}
                </div>

                <div class="col-md-6">
                    <strong>Penerima:</strong><br>
                    {{ $riwayat->penerima->warga->nama_lengkap ?? '-' }}
                </div>

                <div class="col-md-3">
                    <strong>Tahap:</strong><br>
                    {{ $riwayat->tahap_ke }}
                </div>

                <div class="col-md-4">
                    <strong>Tanggal:</strong><br>
                    {{ $riwayat->tanggal }}
                </div>

                <div class="col-md-5">
                    <strong>Nilai:</strong><br>
                    Rp {{ number_format($riwayat->nilai, 0, ',', '.') }}
                </div>
            </div>

        </div>
    </div>

    <h4>Bukti Penyaluran</h4>

    <div class="row mt-2">
        @forelse ($riwayat->media as $m)
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm">
                    <a href="{{ asset('storage/'.$m->file_path) }}" target="_blank">
                        <img src="{{ asset('storage/'.$m->file_path) }}" class="card-img-top">
                    </a>
                </div>
            </div>
        @empty
            <p class="text-muted">Tidak ada bukti penyaluran.</p>
        @endforelse
    </div>

</div>
@endsection
