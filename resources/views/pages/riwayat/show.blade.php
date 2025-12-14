@extends('layouts.admin.app')

@section('content')
<div class="container py-4">
    <h3 class="mb-3">Detail Penyaluran Bantuan</h3>

    <a href="{{ route('riwayat.index') }}" class="btn btn-secondary mb-3">
        <i class="fa fa-arrow-left"></i> Kembali
    </a>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td style="width: 25%; vertical-align: top;">
                            <strong>Penerima:</strong>
                        </td>
                        <td style="width: 25%; vertical-align: top;">
                            {{ $riwayat->penerima->warga->nama ?? '-' }}
                        </td>
                        <td style="width: 25%; vertical-align: top;">
                            <strong>Tanggal:</strong>
                        </td>
                        <td style="width: 25%; vertical-align: top;">
                            {{ $riwayat->tanggal }}
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top;">
                            <strong>Nilai:</strong>
                        </td>
                        <td style="vertical-align: top;">
                            Rp {{ number_format($riwayat->nilai, 0, ',', '.') }}
                        </td>
                        <td style="vertical-align: top;">
                            <strong>Tahap:</strong>
                        </td>
                        <td style="vertical-align: top;">
                            {{ $riwayat->tahap_ke }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <h4>Bukti Penyaluran</h4>

    @if($riwayat->media->count() > 0)
        <div class="row mt-2">
            @foreach ($riwayat->media as $m)
                <div class="col-md-3 col-sm-4 col-6 mb-3">
                    <div class="card">
                        <a href="{{ asset('storage/'.$m->file_path) }}" target="_blank">
                            <img src="{{ asset('storage/'.$m->file_path) }}"
                                 class="card-img-top"
                                 style="height: 150px; object-fit: cover;">
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-muted">Tidak ada bukti penyaluran.</p>
    @endif
</div>
@endsection
