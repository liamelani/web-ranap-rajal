@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Cari Data Diagnosa Rawat Inap dan Jalan berdasarkan Nomor Dokter
                </div>

                <div class="card-body">
                    <form id="searchForm">
                        @csrf
                        <div class="form-group">
                            <label for="nomorDokter">Nomor Dokter:</label>
                            <input type="text" class="form-control" id="nomorDokter" name="nomorDokter" required>
                        </div>
                        <div class="form-group">
                            <label for="jenisDiagnosa">Jenis Diagnosa:</label>
                            <select class="form-control" id="jenisDiagnosa" name="jenisDiagnosa" required>
                                <option value="rawat_inap">Diagnosa Rawat Inap</option>
                                <option value="rawat_jalan">Diagnosa Rawat Jalan</option>
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
        var nomorDokter = $('#nomorDokter').val();
        var jenisDiagnosa = $('#jenisDiagnosa').val();

        $.ajax({
            type: 'GET',
            url: '{{ route("searchDiagnosa") }}',
            data: {
                nomor_dokter: nomorDokter,
                jenis_diagnosa: jenisDiagnosa
            },
            success: function(response) {
                if (response.error) {
                    $('#searchResults').html('<div class="alert alert-danger" role="alert">' + response.error + '</div>');
                } else {
                    var html = '<div class="table-responsive">';
                    html += '<table class="table table-bordered">';
                    html += '<thead>';
                    html += '<tr>';
                    
                    html += '<th>Tanggal Diagnosis</th>';
                    html += '<th>Nomor RM</th>';
                    html += '<th>Nama Pasien</th>';
                    html += '<th>Harga Diagnosis</th>';
                    html += '<th>Kode Obat</th>';
                    html += '<th>Nama Obat</th>';
                    s
                    html += '<th>Nama Dokter</th>';
                    html += '</tr>';
                    html += '</thead>';
                    html += '<tbody>';
                    $.each(response, function(index, diagnosa) {
                        html += '<tr>';
                        
                        html += '<td>' + diagnosa.tgl_diagnosis + '</td>';
                        html += '<td>' + (jenisDiagnosa == 'rawat_inap' ? diagnosa.no_rm_inap : diagnosa.no_rm_jalan) + '</td>'; // Menyesuaikan data nomor RM berdasarkan jenis diagnosa
                        html += '<td>' + diagnosa.nama_pasien + '</td>';
                        html += '<td>' + diagnosa.h_diagnosis + '</td>';
                        html += '<td>' + diagnosa.kd_obat + '</td>';
                        html += '<td>' + diagnosa.nama_obat + '</td>';
                        html += '<td>' + diagnosa.nama_dokter + '</td>';
                        html += '</tr>';
                    });
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
</script>


@endsection
