@extends('layouts.admin.app')

@section('content')
    <div class="container py-5">
        <h3 class="mb-4">PENDAFTAR BANTUAN</h3>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('pendaftar.create') }}" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah Pendaftar</a>

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
                        <td>{{ $index + 1 }}</td>
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
    </div>
@endsection
