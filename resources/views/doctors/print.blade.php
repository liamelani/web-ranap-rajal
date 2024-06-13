<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Dokter</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Laporan Dokter</h2>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nomor Dokter</th>
                <th>Nama</th>
                <th>Spesialisasi</th>
                <th>Tanggal Diterima</th>
                <th>Nomor HP</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($doctors as $index => $doctor)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $doctor->no_dokter }}</td>
                <td>{{ $doctor->nama }}</td>
                <td>{{ $doctor->spesialisasi }}</td>
                <td>{{ $doctor->diterima }}</td>
                <td>{{ $doctor->no_hp }}</td>
                <td>{{ $doctor->alamat }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
