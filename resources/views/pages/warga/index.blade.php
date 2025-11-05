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
                            @if($row->jenis_kelamin == 'Perempuan')
                                <span class="badge" style="background-color:#ff69b4; color:white; padding:6px 10px; border-radius:10px;">
                                    {{ $row->jenis_kelamin }}
                                </span>
                            @elseif($row->jenis_kelamin == 'Laki-laki')
                                <span class="badge" style="background-color:#1e90ff; color:white; padding:6px 10px; border-radius:10px;">
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
                            <a href="{{ route('warga.edit', $row->warga_id) }}" class="btn btn-warning btn-sm text-dark">
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                            </a>
                            <form action="{{ route('warga.destroy', $row->warga_id) }}" method="POST" style="display:inline">
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
    </div>

    {{-- Efek hover lembut --}}
    <style>
        table.table tbody tr:hover {
            background-color: #f1f1f1;
            transition: 0.3s ease;
        }
    </style>
@endsection
