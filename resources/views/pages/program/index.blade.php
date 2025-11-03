@extends('layouts.admin.app')

@section('content')
<div class="container py-5">
    <h3 class="mb-4">Daftar Program Bantuan</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('programs.create') }}" class="btn btn-primary mb-3">+ Tambah Program</a>

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
          @forelse ($programs as $index )
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $program->kode }}</td>
                    <td>{{ $program->nama_program }}</td>
                    <td>{{ $program->tahun }}</td>
                    <td>Rp {{ number_format($program->anggaran, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('program.edit', $program->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('program.destroy', $program->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus program ini?')">
                                Hapus
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
</div>
@endsection
