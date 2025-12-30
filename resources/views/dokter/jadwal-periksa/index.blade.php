<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Jadwal Periksa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
</head>
<body class="p-4">

<h1>Jadwal Periksa Dokter</h1>
<p>Halo, {{ auth()->user()->name }}</p>

<table class="table table-bordered mt-4">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Jam</th>
            <th>Pasien</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>2025-01-10</td>
            <td>08:00</td>
            <td>Budi</td>
            <td>Menunggu</td>
        </tr>
    </tbody>
</table>

<a href="{{ route('dokter.dashboard') }}" class="btn btn-secondary mt-3">
    Kembali
</a>

</body>
</html>
