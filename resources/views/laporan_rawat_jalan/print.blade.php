<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Laporan Rawat Jalan</title>
    <style>
        .container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        table {
            width: 48%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Data Laporan Perawatan Rawat Jalan</h2>
    
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>No. Rawat</th>
                    <th>Nama Pasien</th>
                    <th>Jenis Kelamin</th>
                    <th>Umur</th>
                </tr>
            </thead>
            <tbody>
                @foreach($laporanRawatJalans as $laporan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $laporan->No_Rawat }}</td>
                    <td>{{ $laporan->Nama_Pasien }}</td>
                    <td>{{ $laporan->Jenis_Kelamin }}</td>
                    <td>{{ $laporan->Umur }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <table>
            <thead>
                <tr>
                    <th>Nama Obat</th>
                    <th>Harga Obat</th>
                    <th>Biaya Dokter</th>
                    <th>Total Biaya</th>
                </tr>
            </thead>
            <tbody>
                @foreach($laporanRawatJalans as $laporan)
                <tr>
                    <td>{{ $laporan->Nama_Obat }}</td>
                    <td>{{ $laporan->Harga_Obat }}</td>
                    <td>{{ $laporan->Biaya_Dokter }}</td>
                    <td>{{ $laporan->Total_Biaya }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
