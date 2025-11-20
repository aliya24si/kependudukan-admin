@extends('layouts.admin.app')

@section('content')
    <div class="container py-5">
        <h3 class="mb-4">Daftar User</h3>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="GET" action="{{ route('users.index') }}" class="row g-2 mb-3">

            <!-- Search -->
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Cari nama atau email..."
                    value="{{ request('search') }}">
            </div>

            <!-- Tombol Cari -->
            <div class="col-md-2">
                <button class="btn btn-primary w-100"><i class="fa fa-search"></i> Cari</button>
            </div>

            <!-- Reset -->
            <div class="col-md-2">
                <a href="{{ route('users.index') }}" class="btn btn-secondary w-100">Reset</a>
            </div>

        </form>

        <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">+ Tambah User</a>

        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $index => $user)
                    <tr>
                        <td>{{ $users->firstItem() + $index }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                            </a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus user ini?')">
                                    <i class="fa-solid fa-trash-can"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Belum ada data user</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex flex-column align-items-center mt-1">
            <small class="mt-2 text-muted">
                Menampilkan {{ $users->firstItem() }} – {{ $users->lastItem() }}
                dari total {{ $users->total() }} data
            </small>
        </div>
        {{ $users->appends(request()->query())->links() }}
    </div>
@endsection
