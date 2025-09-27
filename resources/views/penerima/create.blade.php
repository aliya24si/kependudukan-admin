<!DOCTYPE html>
<html>
<head>
    <title>Input Penerima Bantuan</title>
</head>
<body>
    <h1>Form Input Penerima Bantuan</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('penerima.store') }}" method="POST">
        @csrf
        <label>Program ID:</label><br>
        <input type="text" name="program_id" required><br><br>

        <label>Warga ID:</label><br>
        <input type="text" name="warga_id" required><br><br>

        <button type="submit">Simpan</button>
    </form>
    <br>
    <a href="{{ route('penerima.index') }}">Lihat Data</a>
</body>
</html>
