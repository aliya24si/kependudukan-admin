@extends('layouts.admin.app')

@section('content')
<div class="container py-4">

    <h3 class="mb-3">Edit Riwayat Penyaluran</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            {{-- ================= FORM UPDATE ================= --}}
            <form action="{{ route('riwayat.update', $riwayat->penyaluran_id) }}"
                  method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-3">

                    {{-- Penerima --}}
                    <div class="col-12">
                        <label class="form-label">Penerima Bantuan</label>
                        <select name="penerima_id" class="form-select" required>
                            @foreach ($penerima as $pn)
                                <option value="{{ $pn->penerima_id }}"
                                    {{ $riwayat->penerima_id == $pn->penerima_id ? 'selected' : '' }}>
                                    {{ $pn->warga->nama ?? '-' }} —
                                    {{ $pn->program->nama_program ?? '-' }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Tahap --}}
                    <div class="col-12">
                        <label class="form-label">Tahap Ke-</label>
                        <input type="number" name="tahap_ke" class="form-control"
                               value="{{ old('tahap_ke', $riwayat->tahap_ke) }}" required>
                    </div>

                    {{-- Tanggal --}}
                    <div class="col-12">
                        <label class="form-label">Tanggal Penyaluran</label>
                        <input type="date" name="tanggal" class="form-control"
                               value="{{ old('tanggal', $riwayat->tanggal) }}" required>
                    </div>

                    {{-- Nilai --}}
                    <div class="col-12">
                        <label class="form-label">Nilai (Rp)</label>
                        <input type="number" name="nilai" class="form-control"
                               value="{{ old('nilai', $riwayat->nilai) }}" required>
                    </div>

                    {{-- Upload Bukti Baru --}}
                    <div class="col-12">
                        <label class="form-label">Tambah Bukti Baru</label>
                        <input type="file" name="media[]" multiple class="form-control">
                        <small class="text-muted">
                            Boleh upload beberapa file (jpg/png max 4MB)
                        </small>
                    </div>

                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                    <a href="{{ route('riwayat.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>
                </div>
            </form>
            {{-- =============== END FORM UPDATE =============== --}}

            {{-- ================= MEDIA EXISTING ================= --}}
            <hr>
            <h5 class="mt-3">Bukti Penyaluran</h5>

            @if ($riwayat->media->count())
                <div class="row mt-3">
                    @foreach ($riwayat->media as $m)

                        @php
                            // HANDLE DUMMY vs STORAGE
                            $imgUrl = str_starts_with($m->file_path, 'dummy/')
                                ? asset($m->file_path)
                                : asset('storage/'.$m->file_path);
                        @endphp

                        <div class="col-md-3 col-sm-4 col-6 mb-3">
                            <div class="card h-100 shadow-sm">

                                <a href="{{ $imgUrl }}" target="_blank">
                                    <img src="{{ $imgUrl }}"
                                         class="card-img-top"
                                         style="height:150px; object-fit:cover;">
                                </a>

                                <div class="card-body text-center p-2">
                                    <form action="{{ route('riwayat.media.delete', $m->media_id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Hapus foto ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger w-100">
                                            Hapus
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </div>

                    @endforeach
                </div>
            @else
                <p class="text-muted mt-2">Belum ada bukti penyaluran.</p>
            @endif
            {{-- ================= END MEDIA ================= --}}

        </div>
    </div>
</div>
@endsection
