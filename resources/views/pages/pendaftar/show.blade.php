@extends('layouts.admin.app')

@section('content')
<div class="container py-5">

    <h3 class="mb-4">Detail Pendaftar Bantuan</h3>

    <a href="{{ route('pendaftar.index') }}" class="mb-3 d-inline-block">
        <i class="fas fa-chevron-left"></i> Kembali
    </a>

    <div class="card">
        <div class="card-body">

            <h5 class="fw-bold">Informasi Pendaftar</h5>
            <table class="table">
                <tr>
                    <th width="200">Nama Warga</th>
                    <td>{{ $pendaftar->warga->nama }}</td>
                </tr>
                <tr>
                    <th>Program Bantuan</th>
                    <td>{{ $pendaftar->program->nama_program }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        @if ($pendaftar->status == 'pending')
                            <span class="badge" style="background-color:#f1e024;">Pending</span>
                        @elseif ($pendaftar->status == 'diterima')
                            <span class="badge" style="background-color:#61db7e;">Diterima</span>
                        @else
                            <span class="badge" style="background-color:#f25d6c;">Ditolak</span>
                        @endif
                    </td>
                </tr>
            </table>

            <hr>

            <h5 class="fw-bold">Berkas Upload</h5>

            <div class="row">
                @forelse($pendaftar->media as $m)
                    <div class="col-md-3 mb-3">
                        <div class="p-3 border rounded text-center">

                            @if(Str::contains($m->file_type, 'image'))

                                @php
                                    $src = Str::startsWith($m->file_path, 'dummy/')
                                        ? asset($m->file_path)
                                        : asset('storage/' . $m->file_path);
                                @endphp

                                <img src="{{ $src }}"
                                     style="width:100%; height:150px; object-fit:cover;">

                            @else
                                <i class="fa-solid fa-file-pdf fa-3x text-danger"></i>
                            @endif

                            <p class="small mt-2">{{ $m->file_name }}</p>

                        </div>
                    </div>
                @empty
                    <p class="text-muted">Tidak ada berkas</p>
                @endforelse
            </div>

        </div>
    </div>

</div>
@endsection
