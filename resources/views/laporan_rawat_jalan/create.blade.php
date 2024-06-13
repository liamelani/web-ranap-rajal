@extends('layouts.app')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Data Laporan Rawat Jalan</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('laporan_rawat_jalan.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="No_Rawat">No. Rawat</label>
                            <input id="No_Rawat" type="text" class="form-control" name="No_Rawat" value="{{ old('No_Rawat') }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="No_RM_Jalan">No. RM Jalan</label>
                            <select id="No_RM_Jalan" class="form-control" name="No_RM_Jalan" required>
                                <option value="">Pilih No. RM Jalan</option>
                                @foreach($pasienRawatJalans as $pasienRawatJalan)
                                    <option value="{{ $pasienRawatJalan->No_RM_Jalan }}">{{ $pasienRawatJalan->No_RM_Jalan }}- {{$pasienRawatJalan->Nama_Pasien }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="kode_obat">Nama Pasien - Nama Obat</label>
                            <select id="kode_obat" class="form-control" name="kode_obat" required>
                                <option value="">Pilih Pasien dan Obat</option>
                                @foreach($diagnosaRawatJalans as $diagnosaRawatJalan)
                                    <option value="{{$diagnosaRawatJalan->kd_obat }}">{{ $diagnosaRawatJalan->kd_obat }} - {{$diagnosaRawatJalan->nama_pasien }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="Biaya_Dokter">Biaya Dokter</label>
                            <input id="Biaya_Dokter" type="text" class="form-control" name="Biaya_Dokter" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('No_RM_Jalan').addEventListener('change', function() {
    var no_rm_jalan = this.value;
    fetch('/get-patient-details/' + no_rm_jalan)
        .then(response => response.json())
        .then(data => {
            document.getElementById('Nama_Pasien').value = data.nama_pasien;
            document.getElementById('Jenis_Kelamin').value = data.jenis_kelamin;
            document.getElementById('Umur').value = data.umur;
        })
        .catch(error => console.error('Error:', error));

    // Mengambil data nama obat dan harga obat berdasarkan kode obat
    var kode_obat = document.getElementById('kode_obat').value;
    fetch('/get-drug-details/' + kode_obat)
        .then(response => response.json())
        .then(data => {
            document.getElementById('Nama_Obat').value = data.nama_obat;
            document.getElementById('Harga_Obat').value = data.harga_obat;
        })
        .catch(error => console.error('Error:', error));
});
</script>

@endsection
