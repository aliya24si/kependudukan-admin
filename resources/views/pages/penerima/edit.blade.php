@extends('layouts.admin.app')

@section('content')
<div class="container py-4">

    <h3 class="mb-4">Edit Penerima Bantuan</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('penerima.update', $penerima->penerima_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Program</label>
            <select name="program_id" class="form-control">
                @foreach($program as $p)
                    <option value="{{ $p->program_id }}"
                        {{ $penerima->program_id == $p->program_id ? 'selected' : '' }}>
                        {{ $p->nama_program }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Warga</label>
            <select name="warga_id" class="form-control">
                @foreach($warga as $w)
                    <option value="{{ $w->warga_id }}"
                        {{ $penerima->warga_id == $w->warga_id ? 'selected' : '' }}>
                        {{ $w->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control">{{ $penerima->keterangan }}</textarea>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('penerima.index') }}" class="btn btn-secondary">Kembali</a>

    </form>
</div>
@endsection
