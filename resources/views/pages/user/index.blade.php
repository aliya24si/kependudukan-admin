@extends('layouts.admin.app')

@section('content')
    <div class="container py-5">
        <h3 class="mb-4">Daftar User</h3>

        {{-- Pesan sukses --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form method="GET" action="{{ route('users.index') }}" class="row g-3 mb-3 align-items-end">

            {{-- Filter Role --}}
            <div class="col-md-3">
                <label class="form-label">Role</label>
                <select name="role" class="form-control">
                    <option value="">-- Semua Role --</option>
                    <option value="admin" @selected(request('role') == 'admin')>Admin</option>
                    <option value="staff" @selected(request('role') == 'staff')>Staff</option>
                </select>
            </div>

            {{-- Search --}}
            <div class="col-md-5">
                <label class="form-label">Cari</label>
                <input type="text" name="search" class="form-control" placeholder="Cari nama atau email..."
                    value="{{ request('search') }}">
            </div>

            {{-- Tombol Cari --}}
            <div class="col-md-2">
                <label class="form-label d-block">&nbsp;</label>
                <button class="btn btn-primary w-100">
                    <i class="fa fa-search me-1"></i> Cari
                </button>
            </div>

            {{-- Reset --}}
            <div class="col-md-2">
                <label class="form-label d-block">&nbsp;</label>
                <a href="{{ route('users.index') }}" class="btn btn-secondary w-100">Reset</a>
            </div>

        </form>

        <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">
            <i class="fa fa-plus me-1"></i> Tambah User
        </a>

        {{-- Tabel user --}}
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $index => $user)
                        <tr>
                            <td>{{ $users->firstItem() + $index }}</td>

                            {{-- FOTO PROFIL BULAT --}}
                            <td>
                                <img src="{{ $user->profile_picture
                                    ? (Str::startsWith($user->profile_picture, 'assets-admin')
                                        ? asset($user->profile_picture)
                                        : asset('storage/' . $user->profile_picture))
                                    : asset('assets-admin/images/layout_img/placeholder.jpeg') }}"
                                    style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
                            </td>


                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ ucfirst($user->role ?? '-') }}</td>

                            <td>
                                {{-- Tombol Detail --}}
                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm me-1">
                                    <i class="fa-solid fa-eye"></i>
                                </a>

                                {{-- Tombol Edit --}}
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm me-1">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>

                                {{-- Tombol Hapus --}}
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Yakin hapus user ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fa-solid fa-trash-can"></i> 
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Belum ada data user</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination info --}}
        <div class="d-flex flex-column align-items-center mt-2">
            @if ($users->total())
                <small class="text-muted">
                    Menampilkan {{ $users->firstItem() }} – {{ $users->lastItem() }} dari total {{ $users->total() }}
                    data
                </small>
            @endif
        </div>

        {{-- Pagination --}}
        <div class="mt-2">
            {{ $users->appends(request()->query())->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
