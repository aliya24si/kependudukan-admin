<!DOCTYPE html>
<html>
<head>
    <title>Daftar Penerima Bantuan</title>
</head>
<body>
    <h1>Daftar Penerima Bantuan </h1>

    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    @if(count($data) > 0)
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Penerima ID</th>
            <th>Program ID</th>
            <th>Warga ID</th>
        </tr>
        @foreach($data as $row)
        <tr>
            <td>{{ $row['penerima_id'] }}</td>
            <td>{{ $row['program_id'] }}</td>
            <td>{{ $row['warga_id'] }}</td>
        </tr>
        @endforeach
    </table>
    @else
        <p>Belum ada data.</p>
    @endif

    <br>
    <a href="{{ route('penerima.create') }}">Tambah Data</a>
</body>
</html>
