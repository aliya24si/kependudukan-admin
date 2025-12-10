@extends('layouts.admin.app')

@section('content')
<div class="container py-4">

    <h3 class="mb-4">Detail Penerima Bantuan</h3>

    <div class="card">
        <div class="card-body">

            <p><strong>Program:</strong> {{ $penerima->program->nama_program }}</p>
            <p><strong>Warga:</strong> {{ $penerima->warga->nama }}</p>
            <p><strong>Keterangan:</strong> {{ $penerima->keterangan ?? '-' }}</p>

            <a href="{{ route('penerima.index') }}" class="btn btn-secondary mt-3">Kembali</a>

        </div>
    </div>

</div>
@endsection
