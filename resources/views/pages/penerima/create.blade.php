@extends('layouts.admin.app')

@section('content')
<div class="container py-4">

    <h3 class="mb-4">Tambah Penerima Bantuan</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('penerima.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Program</label>
            <select name="program_id" class="form-control">
                <option value="">-- Pilih --</option>
                @foreach($program as $p)
                    <option value="{{ $p->program_id }}"
                        {{ old('program_id') == $p->program_id ? 'selected' : '' }}>
                        {{ $p->nama_program }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Warga</label>
            <select name="warga_id" class="form-control">
                <option value="">-- Pilih --</option>
                @foreach($warga as $w)
                    <option value="{{ $w->warga_id }}"
                        {{ old('warga_id') == $w->warga_id ? 'selected' : '' }}>
                        {{ $w->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control">{{ old('keterangan') }}</textarea>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('penerima.index') }}" class="btn btn-secondary">Kembali</a>

    </form>
</div>
@endsection
