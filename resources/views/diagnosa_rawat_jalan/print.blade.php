<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Diagnosa Rawat Jalan</title>
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
    <h2>Laporan Diagnosa Rawat Jalan</h2>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>No. Diagnosa Jalan</th>
                <th>Tanggal Diagnosis</th>
                <th>No. RM Jalan</th>
                <th>Nama Pasien</th>
                <th>Hasil Diagnosis</th>
                <th>Kode Obat</th>
                <th>Nama Obat</th>
                <th>No. Dokter</th>
                <th>Nama Dokter</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($diagnosaRawatJalan as $index => $diagnosa)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $diagnosa->no_diag_jalan }}</td>
                <td>{{ $diagnosa->tgl_diagnosis }}</td>
                <td>{{ $diagnosa->no_rm_jalan }}</td>
                <td>{{ $diagnosa->nama_pasien }}</td>
                <td>{{ $diagnosa->h_diagnosis }}</td>
                <td>{{ $diagnosa->kd_obat }}</td>
                <td>{{ $diagnosa->nama_obat }}</td>
                <td>{{ $diagnosa->no_dokter }}</td>
                <td>{{ $diagnosa->nama_dokter }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
