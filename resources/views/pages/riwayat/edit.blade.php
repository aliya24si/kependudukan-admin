{{-- edit --}}
@extends('layouts.admin.app')

@section('content')
<div class="container py-4">

    <h3 class="mb-3">Edit Riwayat Penyaluran</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('riwayat.update', $riwayat->penyaluran_id) }}"
                  method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="row g-3">

                    {{-- Penerima --}}
                    <div class="col-12">
                        <label class="form-label">Penerima Bantuan</label>
                        <select name="penerima_id" class="form-select">
                            @foreach ($penerima as $pn)
                                <option value="{{ $pn->penerima_id }}"
                                    {{ $riwayat->penerima_id == $pn->penerima_id ? 'selected' : '' }}>
                                    {{ $pn->warga->nama ?? '-' }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Tahap --}}
                    <div class="col-12">
                        <label class="form-label">Tahap Ke-</label>
                        <input type="number" name="tahap_ke" class="form-control"
                               value="{{ $riwayat->tahap_ke }}">
                    </div>

                    {{-- Tanggal --}}
                    <div class="col-12">
                        <label class="form-label">Tanggal Penyaluran</label>
                        <input type="date" name="tanggal" class="form-control"
                               value="{{ $riwayat->tanggal }}">
                    </div>

                    {{-- Nilai --}}
                    <div class="col-12">
                        <label class="form-label">Nilai (Rp)</label>
                        <input type="number" name="nilai" class="form-control"
                               value="{{ $riwayat->nilai }}">
                    </div>

                    {{-- Upload Bukti Baru --}}
                    <div class="col-12">
                        <label class="form-label">Tambah Bukti Baru</label>
                        <input type="file" name="media[]" multiple class="form-control">
                        <small class="text-muted">Boleh upload beberapa file (jpg/png max 4MB)</small>
                    </div>

                </div>

                {{-- FOTO YANG SUDAH ADA --}}
                <h5 class="mt-4">Bukti Penyaluran</h5>
                <div class="row">
                    @foreach ($riwayat->media as $m)
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <img src="{{ asset('storage/'.$m->file_path) }}" class="card-img-top">

                                <div class="card-body text-center p-2">
                                    <form action="{{ route('riwayat.media.delete', $m->media_id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Hapus foto ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger w-100">Hapus</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-3">
                    <button class="btn btn-primary">Update</button>
                    <a href="{{ route('riwayat.index') }}" class="btn btn-secondary">Kembali</a>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
