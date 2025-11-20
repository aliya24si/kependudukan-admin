@extends('layouts.admin.app')

@section('content')
    <div class="container py-5">
        <h3 class="mb-4">PENDAFTAR BANTUAN</h3>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="GET" action="{{ route('pendaftar.index') }}" class="row g-2 mb-3">

            <!-- Search -->
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Cari nama warga atau program..."
                    value="{{ request('search') }}">
            </div>

            <!-- Filter Status -->
            <div class="col-md-3">
                <select name="status" class="form-control">
                    <option value="">-- Filter Status --</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="diterima" {{ request('status') == 'diterima' ? 'selected' : '' }}>Diterima</option>
                    <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>
            </div>

            <!-- Filter Program -->
            <div class="col-md-3">
                <select name="program_id" class="form-control">
                    <option value="">-- Filter Program --</option>
                    @foreach ($program as $p)
                        <option value="{{ $p->program_id }}"
                            {{ request('program_id') == $p->program_id ? 'selected' : '' }}>
                            {{ $p->nama_program }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Tombol Cari -->
            <div class="col-md-2">
                <button class="btn btn-primary w-100"><i class="fa fa-search"></i> Cari</button>
            </div>

            <!-- Reset -->
            <div class="col-md-2 mt-2">
                <a href="{{ route('pendaftar.index') }}" class="btn btn-secondary w-100">Reset</a>
            </div>
        </form>

        <a href="{{ route('pendaftar.create') }}" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah
            Pendaftar</a>

        <table class="table" style="border: 1px solid #ddd;">
            <thead style="background: #b3d7ff;">
                <tr>
                    <th>No</th>
                    <th>Nama Warga</th>
                    <th>Program Bantuan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($pendaftar as $index => $item)
                    <tr>
                        <td>{{ $pendaftar->firstItem() + $index }}</td>
                        <td>{{ $item->warga->nama }}</td>
                        <td>{{ $item->program->nama_program }}</td>
                        <td>
                            @if ($item->status == 'pending')
                                <span class="badge"
                                    style="background-color:#ffc107; color:rgb(149, 141, 141); padding:6px 10px; border-radius:10px;">
                                    Pending
                                </span>
                            @elseif($item->status == 'diterima')
                                <span class="badge"
                                    style="background-color:#28a745; color:white; padding:6px 10px; border-radius:10px;">
                                    Diterima
                                </span>
                            @elseif($item->status == 'ditolak')
                                <span class="badge"
                                    style="background-color:#dc3545; color:white; padding:6px 10px; border-radius:10px;">
                                    Ditolak
                                </span>
                            @else
                                <span class="badge bg-secondary">{{ $item->status }}</span>
                            @endif
                        </td>

                        <td>
                            <a href="{{ route('pendaftar.edit', $item->pendaftar_id) }}" class="btn btn-primary btn-sm">
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                            </a>

                            <form action="{{ route('pendaftar.destroy', $item->pendaftar_id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin hapus pendaftar ini?')">
                                    <i class="fa-solid fa-trash-can"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center" style="background:#eee;">Belum ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex flex-column align-items-center mt-1">
            <small class="mt-2 text-muted">
                Menampilkan {{ $pendaftar->firstItem() }} – {{ $pendaftar->lastItem() }}
                dari total {{ $pendaftar->total() }} data
            </small>
        </div>
        {{ $pendaftar->appends(request()->query())->links() }}
    </div>
@endsection
