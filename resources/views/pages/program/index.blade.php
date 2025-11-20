@extends('layouts.admin.app')

@section('content')
    <div class="container py-5">
        <h3 class="mb-4">Daftar Program</h3>

        {{-- Flash Message --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="GET" action="{{ route('programs.index') }}" class="row mb-3 g-2">

            <!-- Search -->
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Cari kode / nama program / tahun..."
                    value="{{ request('search') }}">
            </div>

            <!-- Filter Tahun -->
            <div class="col-md-3">
                <select name="tahun" class="form-control">
                    <option value="">-- Filter Tahun --</option>
                    @foreach ($tahun_list as $t)
                        <option value="{{ $t->tahun }}" {{ request('tahun') == $t->tahun ? 'selected' : '' }}>
                            {{ $t->tahun }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Tombol Cari -->
            <div class="col-md-2">
                <button class="btn btn-primary w-100">
                    <i class="fa fa-search"></i> Cari
                </button>
            </div>

            <!-- Reset -->
            <div class="col-md-2">
                <a href="{{ route('programs.index') }}" class="btn btn-secondary w-100">Reset</a>
            </div>
        </form>

        {{-- Tombol Tambah --}}
        <a href="{{ route('programs.create') }}" class="btn btn-primary mb-3">
            <i class="fa fa-plus"></i> Tambah Program
        </a>

        {{-- Tabel --}}
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Program</th>
                    <th>Tahun</th>
                    <th>Anggaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($programs as $index => $program)
                    <tr>
                        <td>{{ $programs->firstItem() + $index }}</td>
                        <td>{{ $program->kode }}</td>
                        <td>{{ $program->nama_program }}</td>
                        <td>{{ $program->tahun }}</td>
                        <td>Rp {{ number_format($program->anggaran, 0, ',', '.') }}</td>
                        <td>
                            <!-- Edit -->
                            <a href="{{ route('programs.edit', $program->program_id) }}" class="btn btn-primary btn-sm">
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                            </a>


                            <!-- Delete -->
                            <form action="{{ route('programs.destroy', $program->program_id) }}" method="POST"
                                style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus program ini?')">
                                    <i class="fa-solid fa-trash-can"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data program</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex flex-column align-items-center mt-1">
            <small class="mt-2 text-muted">
                Menampilkan {{ $programs->firstItem() }} – {{ $programs->lastItem() }}
                dari total {{ $programs->total() }} data
            </small>
        </div>
        {{ $programs->appends(request()->query())->links() }}
    </div>
@endsection
