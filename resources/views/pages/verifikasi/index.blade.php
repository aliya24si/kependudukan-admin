@extends('layouts.admin.app')

@section('content')
<div class="container py-5">

    <h3 class="mb-4">VERIFIKASI LAPANGAN</h3>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Search --}}
    <form method="GET" action="{{ route('verifikasi.index') }}" class="row g-2 mb-3">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control"
                placeholder="Cari nama pendaftar..."
                value="{{ request('search') }}">
        </div>

        <div class="col-md-3">
            <button class="btn btn-primary w-100">
                <i class="fa fa-search"></i> Cari
            </button>
        </div>

        <div class="col-md-2 mt-2 mt-md-0">
            <a href="{{ route('verifikasi.index') }}" class="btn btn-secondary w-100">
                Reset
            </a>
        </div>

        <div class="col-md-3 text-md-end mt-2 mt-md-0">
            <a href="{{ route('verifikasi.create') }}" class="btn btn-primary w-100">
                <i class="fa fa-plus"></i> Tambah Verifikasi
            </a>
        </div>
    </form>

    {{-- Table --}}
    <table class="table table-bordered table-striped align-middle">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Pendaftar</th>
                <th>Petugas</th>
                <th>Tanggal</th>
                <th>Skor</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($data as $i => $ver)
                <tr>
                    <td>{{ $data->firstItem() + $i }}</td>

                    <td>
                        @if($ver->pendaftar && $ver->pendaftar->warga)
                            {{ $ver->pendaftar->warga->nama }}
                        @else
                            -
                        @endif
                    </td>

                    <td>{{ $ver->petugas }}</td>

                    <td>{{ \Carbon\Carbon::parse($ver->tanggal)->format('d M Y') }}</td>

                    <td>{{ $ver->skor ?? '-' }} %</td>

                    <td>
                        <a href="{{ route('verifikasi.show', $ver->verifikasi_id) }}"
                           class="btn btn-info btn-sm mb-1">
                            <i class="fa fa-eye"></i>
                        </a>

                        <a href="{{ route('verifikasi.edit', $ver->verifikasi_id) }}"
                           class="btn btn-primary btn-sm mb-1">
                            <i class="fa fa-edit"></i>
                        </a>

                        <form action="{{ route('verifikasi.destroy', $ver->verifikasi_id) }}"
                              method="POST" class="d-inline"
                              onsubmit="return confirm('Yakin ingin menghapus verifikasi ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center text-muted">
                    Belum ada data verifikasi
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="d-flex flex-column align-items-center mt-1">
        @if($data->total())
            <small class="text-muted">
                Menampilkan {{ $data->firstItem() }} – {{ $data->lastItem() }} dari {{ $data->total() }} data
            </small>
        @endif
    </div>

    {{ $data->appends(request()->query())->links('pagination::bootstrap-5') }}

</div>
@endsection
