@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Cari Data Laporan Rawat
                        <a href="#" id="printButton" class="btn btn-sm btn-secondary float-right"><i class="fas fa-print"></i> Print</a>
                    </div>

                    <div class="card-body">
                        <form id="searchForm">
                            @csrf
                            <div class="form-group">
                                <label for="nomorRawat">Nomor Rawat:</label>
                                <input type="text" class="form-control" id="nomorRawat" name="nomorRawat" required>
                            </div>
                            <div class="form-group">
                                <label for="jenisLaporan">Jenis Laporan:</label>
                                <select class="form-control" id="jenisLaporan" name="jenisLaporan" required>
                                    <option value="rawat_inap">Rawat Inap</option>
                                    <option value="rawat_jalan">Rawat Jalan</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </form>
                    </div>
                </div>

                <div id="searchResults" class="mt-4"></div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#searchForm').submit(function(event) {
            event.preventDefault();
            var nomorRawat = $('#nomorRawat').val();
            var jenisLaporan = $('#jenisLaporan').val();
            $.ajax({
                type: 'GET',
                url: '{{ route("searchLaporan") }}', // Rute untuk menangani permintaan pencarian
                data: { nomor_rawat: nomorRawat, jenis_laporan: jenisLaporan },
                success: function(response) {
                    // Tanggapan dari server
                    // Tampilkan data yang diterima kepada pengguna
                    if (response.error) {
                        $('#searchResults').html('<div class="alert alert-danger" role="alert">' + response.error + '</div>');
                    } else {
                        var html = '<div class="table-responsive">';
                        html += '<table class="table table-bordered">';
                        html += '<thead>';
                        html += '<tr>';
                        html += '<th>Nama Pasien</th>';
                        html += '<th>Harga Obat</th>';
                        html += '<th>Biaya Kamar</th>';
                        html += '<th>Biaya Dokter</th>';
                        html += '<th>Total Biaya</th>';
                        html += '</tr>';
                        html += '</thead>';
                        html += '<tbody>';
                        html += '<tr>';
                        html += '<td>' + response.Nama_Pasien + '</td>';
                        html += '<td>' + response.Harga_Obat + '</td>';
                        html += '<td>' + response.harga_kamar + '</td>';
                        html += '<td>' + response.Biaya_Dokter + '</td>';
                        html += '<td>' + response.Total_Biaya + '</td>';
                        html += '</tr>';
                        html += '</tbody>';
                        html += '</table>';
                        html += '</div>';
                        $('#searchResults').html(html);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        // Function untuk mencetak hasil pencarian
        $('#printButton').click(function() {
            var printContents = $('#searchResults').html();
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = '<h1 style="text-align:center;">Laporan Pembayaran</h1><h2 style="text-align:center;">RS. Medical Health</h2>' + printContents;
            window.print();
            document.body.innerHTML = originalContents;
        });
    </script>

    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            #searchResults, #searchResults * {
                visibility: visible;
            }
            #searchResults {
                position: absolute;
                left: 0;
                top: 0;
            }
        }
    </style>
@endsection
