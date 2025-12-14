@extends('layouts.admin.app')

@section('content')
<div class="container py-5">

    <h3 class="mb-4">DAFTAR PENERIMA BANTUAN</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- FILTER & SEARCH --}}
    <form method="GET" class="card p-3 mb-3 shadow-sm">
        <div class="row g-2">

            <div class="col-md-4">
                <label class="form-label">Cari Nama Warga</label>
                <input type="text" name="search"
                       class="form-control"
                       value="{{ request('search') }}"
                       placeholder="Masukkan nama warga">
            </div>

            <div class="col-md-4">
                <label class="form-label">Program Bantuan</label>
                <select name="program_id" class="form-select">
                    <option value="">-- Semua Program --</option>
                    @foreach ($program as $pr)
                        <option value="{{ $pr->program_id }}"
                            {{ request('program_id') == $pr->program_id ? 'selected' : '' }}>
                            {{ $pr->nama_program }}
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
                <a href="{{ route('penerima.index') }}" class="btn btn-secondary w-100">
                    Reset
                </a>
            </div>
        </div>
    </form>

    <a href="{{ route('penerima.create') }}" class="btn btn-primary mb-3">
        <i class="fa fa-plus"></i> Tambah Penerima
    </a>

    <div class="card">
        <div class="card-body table-responsive">

            <table class="table table-bordered table-striped align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>Program</th>
                        <th>Warga</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($penerima as $p)
                    <tr>
                        <td>{{ $loop->iteration + ($penerima->currentPage() - 1) * $penerima->perPage() }}</td>
                        <td>{{ $p->program->nama_program ?? '-' }}</td>
                        <td>{{ $p->warga->nama ?? '-' }}</td>
                        <td>{{ $p->keterangan ?? '-' }}</td>

                        <td>
                            <a href="{{ route('penerima.edit', $p->penerima_id) }}"
                               class="btn btn-primary btn-sm mb-1">
                                <i class="fa fa-edit"></i>
                            </a>

                            <form action="{{ route('penerima.destroy', $p->penerima_id) }}"
                                  method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin hapus data ini?')">
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
                        <td colspan="5" class="text-center text-muted">
                            Tidak ada data
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- Pagination --}}
            <div class="d-flex flex-column align-items-center mt-2">
                @if($penerima->total())
                    <small class="text-muted">
                        Menampilkan {{ $penerima->firstItem() }} – {{ $penerima->lastItem() }}
                        dari {{ $penerima->total() }} data
                    </small>
                @endif
            </div>

            {{ $penerima->links('pagination::bootstrap-5') }}

        </div>
    </div>

</div>
@endsection
