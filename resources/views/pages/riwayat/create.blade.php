{{-- create --}}
@extends('layouts.admin.app')

@section('content')
    <div class="container py-4">

        <h3 class="mb-3">Tambah Riwayat Penyaluran</h3>

        <div class="card shadow-sm">
            <div class="card-body">

                <form action="{{ route('riwayat.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">

                        {{-- Penerima --}}
                        <div class="col-12">
                            <label class="form-label">Penerima Bantuan</label>
                            <select name="penerima_id" class="form-select">
                                <option value="">-- Pilih Penerima --</option>
                                @foreach ($penerima as $pn)
                                    <option value="{{ $pn->penerima_id }}"
                                        {{ old('penerima_id') == $pn->penerima_id ? 'selected' : '' }}>
                                        {{ $pn->warga->nama ?? '-' }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Tahap --}}
                        <div class="col-12">
                            <label class="form-label">Tahap Ke-</label>
                            <input type="number" name="tahap_ke" class="form-control"
                                   value="{{ old('tahap_ke') }}">
                        </div>

                        {{-- Tanggal --}}
                        <div class="col-12">
                            <label class="form-label">Tanggal Penyaluran</label>
                            <input type="date" name="tanggal" class="form-control"
                                   value="{{ old('tanggal') }}">
                        </div>

                        {{-- Nilai --}}
                        <div class="col-12">
                            <label class="form-label">Nilai (Rp)</label>
                            <input type="number" name="nilai" class="form-control"
                                   value="{{ old('nilai') }}">
                        </div>

                        {{-- Upload --}}
                        <div class="col-12">
                            <label class="form-label">Upload Bukti Penyaluran</label>
                            <input type="file" name="media[]" multiple class="form-control">
                            <small class="text-muted">Boleh upload lebih dari 1 file (jpg/png, max 4MB)</small>
                        </div>

                    </div>

                    <div class="mt-3">
                        <button class="btn btn-primary">Simpan</button>
                        <a href="{{ route('riwayat.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>

                </form>
            </div>
        </div>

    </div>
@endsection
