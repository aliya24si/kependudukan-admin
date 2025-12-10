@extends('layouts.admin.app')

@section('content')
    <div class="container py-5 d-flex justify-content-center">

        <div class="card shadow-sm p-4" style="max-width: 420px; border-radius: 16px;">

            {{-- Judul --}}
            <h4 class="text-center fw-bold mb-4">User Profile</h4>

            {{-- Foto Profil --}}
            <div class="d-flex justify-content-center mb-3">
                <img src="{{ $user->profile_picture
                    ? (Str::startsWith($user->profile_picture, 'assets-admin')
                        ? asset($user->profile_picture)
                        : asset('storage/' . $user->profile_picture))
                    : asset('assets-admin/images/layout_img/placeholder.jpeg') }}"
                    alt="Foto Profil"
                    style="width: 160px; height: 160px; border-radius: 50%; object-fit: cover; border: 5px solid #4e73df;">
            </div>

            {{-- Data User --}}
            <div class="text-center">
                <h5 class="fw-bold mb-1">{{ $user->name }}</h5>
                <p class="text-muted mb-1">{{ $user->email }}</p>
                <p class="text-muted">
                    Role: <span class="fw-semibold">{{ ucfirst($user->role) }}</span>
                </p>
            </div>

            {{-- Tombol Aksi --}}
            <div class="d-grid gap-2 mt-4">
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">
                    <i class="fas fa-edit me-1"></i> Edit Profile
                </a>

                <a href="{{ route('users.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>

        </div>

    </div>
@endsection
