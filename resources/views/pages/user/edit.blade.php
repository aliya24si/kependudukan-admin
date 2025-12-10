@extends('layouts.admin.app')

@section('content')
<div class="container py-5">
    <h3 class="mb-4">Edit User</h3>

    <a href="{{ route('users.index') }}" class="mb-3 d-inline-block">
        <i class="fas fa-chevron-left"></i> Kembali
    </a>

    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @if($user->profile_picture)
            <img src="{{ asset('storage/' . $user->profile_picture) }}" style="width:100px; height:100px; object-fit:cover;" class="mb-3 rounded">
        @endif

        <div class="mb-3">
            <label>Ubah Foto Profil</label>
            <input type="file" name="profile_picture" class="form-control">
        </div>

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Role</label>
            <select name="role" class="form-select" required>
                <option value="admin" @selected($user->role == 'admin')>Admin</option>
                <option value="staff" @selected($user->role == 'staff')>Staff</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Password (kosongkan jika tidak diubah)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
