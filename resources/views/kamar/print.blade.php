<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Kamar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Data Kamar</h1>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>No. Tempat Tidur</th>
                <th>Ruang</th>
                <th>Status</th>
                <th>Di Isi Oleh</th>
                <th>Harga Kamar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kamars as $kamar)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $kamar->no_tempat_tidur }}</td>
                <td>{{ $kamar->ruang }}</td>
                <td>{{ $kamar->status }}</td>
                <td>{{ $kamar->di_isi_oleh }}</td>
                <td>{{ $kamar->harga_kamar }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
