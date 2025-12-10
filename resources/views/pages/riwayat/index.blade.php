@extends('layouts.admin.app')

@section('content')
<div class="container py-5">

    <h3 class="mb-4">RIWAYAT PENYALURAN BANTUAN</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Filter --}}
    <form method="GET" class="card p-3 mb-3 shadow-sm">
        <div class="row g-2">
            <div class="col-md-4">
                <label class="form-label">Filter Program</label>
                <select class="form-select" name="program_id">
                    <option value="">Semua Program</option>
                    @foreach ($program as $p)
                        <option value="{{ $p->program_id }}"
                            {{ request('program_id') == $p->program_id ? 'selected' : '' }}>
                            {{ $p->nama_program }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2 d-flex align-items-end">
                <button class="btn btn-primary w-100">
                    <i class="fa fa-search"></i> Filter
                </button>
            </div>

            <div class="col-md-2 d-flex align-items-end">
                <a href="{{ route('riwayat.index') }}" class="btn btn-secondary w-100">
                    Reset
                </a>
            </div>
        </div>
    </form>

    <a href="{{ route('riwayat.create') }}" class="btn btn-primary mb-3">
        <i class="fa fa-plus"></i> Tambah Penyaluran
    </a>

    <div class="card shadow-sm">
        <div class="card-body p-0">

            <table class="table table-bordered table-striped align-middle mb-0">
                <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>Program</th>
                        <th>Penerima</th>
                        <th>Tahap</th>
                        <th>Tanggal</th>
                        <th>Nilai</th>
                        <th>Bukti</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($riwayat as $r)
                        <tr>
                            <td>{{ $loop->iteration + ($riwayat->currentPage() - 1) * $riwayat->perPage() }}</td>
                            <td>{{ $r->program->nama_program }}</td>
                            <td>{{ $r->penerima->warga->nama_lengkap ?? '-' }}</td>
                            <td>{{ $r->tahap_ke }}</td>
                            <td>{{ $r->tanggal }}</td>
                            <td>Rp {{ number_format($r->nilai, 0, ',', '.') }}</td>
                            <td>{{ $r->media->count() }} file</td>

                            <td>
                                <a href="{{ route('riwayat.show', $r->penyaluran_id) }}"
                                   class="btn btn-info btn-sm mb-1">
                                    <i class="fa fa-eye"></i> Detail
                                </a>

                                <a href="{{ route('riwayat.edit', $r->penyaluran_id) }}"
                                   class="btn btn-primary btn-sm mb-1">
                                    <i class="fa fa-edit"></i> Edit
                                </a>

                                <form action="{{ route('riwayat.destroy', $r->penyaluran_id) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin hapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Pagination --}}
            <div class="d-flex flex-column align-items-center p-3">
                @if($riwayat->total())
                    <small class="text-muted">
                        Menampilkan {{ $riwayat->firstItem() }} – {{ $riwayat->lastItem() }}
                        dari {{ $riwayat->total() }} data
                    </small>
                @endif
            </div>

            {{ $riwayat->links('pagination::bootstrap-5') }}

        </div>
    </div>

</div>
@endsection
