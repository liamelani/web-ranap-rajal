<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Perawat</title>
    <style>
        /* Tambahkan gaya CSS sesuai kebutuhan untuk tampilan cetak */
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .title {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h2 class="title">Laporan Perawat</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Perawat</th>
                <th>Nama Perawat</th>
                <th>Alamat</th>
                <th>Telepon</th>
            </tr>
        </thead>
        <tbody>
            @foreach($perawats as $perawat)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $perawat->kd_perawat }}</td>
                <td>{{ $perawat->nama }}</td>
                <td>{{ $perawat->alamat }}</td>
                <td>{{ $perawat->telepon }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
