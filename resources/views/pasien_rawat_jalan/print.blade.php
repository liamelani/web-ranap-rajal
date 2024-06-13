<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pasien Rawat Jalan</title>
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
    <h2 class="title">Laporan Pasien Rawat Jalan</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>No. RM Jalan</th>
                <th>Nama Pasien</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Umur</th>
                <th>Tanggal Masuk</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pasienRawatJalan as $pasien)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pasien->No_RM_Jalan }}</td>
                <td>{{ $pasien->Nama_Pasien }}</td>
                <td>{{ $pasien->Jenis_Kelamin }}</td>
                <td>{{ $pasien->Alamat }}</td>
                <td>{{ $pasien->Telepon }}</td>
                <td>{{ $pasien->Umur }}</td>
                <td>{{ $pasien->Tgl_Masuk }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
