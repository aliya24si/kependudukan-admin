@extends('layouts.admin.app')

@section('content')
    <div class="container py-5">
        <h3 class="mb-4">Daftar Warga</h3>

        {{-- Flash Messages --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Terjadi kesalahan:</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="GET" action="{{ route('warga.index') }}" class="row mb-3 g-2">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Cari nama / KTP / email..."
                    value="{{ request('search') }}">
            </div>

            <div class="col-md-3">
                <select name="jenis_kelamin" class="form-control">
                    <option value="">-- Filter Jenis Kelamin --</option>
                    <option value="Laki-laki" {{ request('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                    </option>
                    <option value="Perempuan" {{ request('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan
                    </option>
                </select>
            </div>

            <div class="col-md-2">
                <button class="btn btn-primary w-100">
                    <i class="fa fa-search"></i> Cari
                </button>
            </div>

            <div class="col-md-2">
                <a href="{{ route('warga.index') }}" class="btn btn-secondary w-100">
                    Reset
                </a>
            </div>
        </form>

        {{-- Tombol Tambah --}}
        <a href="{{ route('warga.create') }}" class="btn btn-primary mb-3">
            <i class="fa fa-plus"></i> Tambah Data Warga
        </a>

        {{-- Tabel Data --}}
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>No KTP</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Pekerjaan</th>
                    <th>Telp</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($warga as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->no_ktp }}</td>
                        <td>{{ $row->nama }}</td>
                        <td>
                            @if ($row->jenis_kelamin == 'Perempuan')
                                <span class="badge"
                                    style="background-color:#ed7bc2; color:white; padding:6px 10px; border-radius:10px;">
                                    {{ $row->jenis_kelamin }}
                                </span>
                            @elseif($row->jenis_kelamin == 'Laki-laki')
                                <span class="badge"
                                    style="background-color:#6eadec; color:white; padding:6px 10px; border-radius:10px;">
                                    {{ $row->jenis_kelamin }}
                                </span>
                            @else
                                <span class="badge bg-secondary">{{ $row->jenis_kelamin }}</span>
                            @endif
                        </td>
                        <td>{{ $row->agama }}</td>
                        <td>{{ $row->pekerjaan }}</td>
                        <td>{{ $row->telp }}</td>
                        <td>{{ $row->email }}</td>
                        <td>
                            <a href="{{ route('warga.edit', $row->warga_id) }}" class="btn btn-primary btn-sm">
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                            </a>
                            <form action="{{ route('warga.destroy', $row->warga_id) }}" method="POST"
                                style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">
                                    <i class="fa-solid fa-trash-can"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">Belum ada data warga</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex flex-column align-items-center mt-1">
            <small class="mt-2 text-muted">
                Menampilkan {{ $warga->firstItem() }} – {{ $warga->lastItem() }}
                dari total {{ $warga->total() }} data
            </small>
        </div>
        {{ $warga->appends(request()->query())->links() }}
    </div>

    {{-- Efek hover lembut --}}
    <style>
        table.table tbody tr:hover {
            background-color: #f1f1f1;
            transition: 0.3s ease;
        }
    </style>
@endsection
