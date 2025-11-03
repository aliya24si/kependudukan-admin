@extends('layouts.admin.app')

@section('content')

    <div class="container mt-4">

        {{-- Flash Messages --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Terjadi kesalahan:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container mt-4">
            {{-- Tombol ke halaman create --}}
            <div class="mb-3">
                <a href="{{ route('warga.create') }}" class="btn btn-success">
                    <i class="fa fa-plus"></i>Tambah Data Warga
                </a>
            </div>

            {{-- Tabel Data --}}
            <div class="card">
                <div class="card-header bg-secondary text-white">Daftar Warga</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No KTP</th>
                                <th>Nama</th>
                                <th>JK</th>
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
                                    <td>{{ $row->jenis_kelamin }}</td>
                                    <td>{{ $row->agama }}</td>
                                    <td>{{ $row->pekerjaan }}</td>
                                    <td>{{ $row->telp }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>
                                        <a href="{{ route('warga.edit', $row->warga_id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('warga.destroy', $row->warga_id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Hapus data ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">Belum ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    @endsection
