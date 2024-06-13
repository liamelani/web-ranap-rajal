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
                <div class="card-header">Tambah Data Laporan Rawat Inap</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('laporan_rawat_inap.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="No_Rawat">No. Rawat</label>
                            <input id="No_Rawat" type="text" class="form-control" name="No_Rawat" value="{{ old('No_Rawat') }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="No_RM_Inap">No. RM Inap</label>
                            <select id="No_RM_Inap" class="form-control" name="No_RM_Inap" required>
                                <option value="">Pilih No. RM Inap</option>
                                @foreach($pasienRawatInaps as $pasienRawatInap)
                                    <option value="{{ $pasienRawatInap->No_RM_Inap }}">{{ $pasienRawatInap->No_RM_Inap }}- {{$pasienRawatInap->Nama_Pasien }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="no_tempat_tidur">No. Tempat Tidur</label>
                            <select id="no_tempat_tidur" class="form-control" name="no_tempat_tidur" required>
                                <option value="">Pilih No. Tempat Tidur</option>
                                @foreach($kamars as $kamar)
                                    <option value="{{ $kamar->no_tempat_tidur }}">{{ $kamar->no_tempat_tidur }} - {{ $kamar->di_isi_oleh }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="kode_obat">Nama Pasien - Nama Obat</label>
                            <select id="kode_obat" class="form-control" name="kode_obat" required>
                                <option value="">Pilih Pasien dan Obat</option>
                                 @foreach($diagnosaRawatInaps as $DiagnosaRawatInap)
                                    <option value="{{$DiagnosaRawatInap->kd_obat }}">{{ $DiagnosaRawatInap->kd_obat }} - {{$DiagnosaRawatInap->nama_pasien }}</option>
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
document.getElementById('No_RM_Inap').addEventListener('change', function() {
    var no_rm_inap = this.value;
    fetch('/get-patient-details/' + no_rm_inap)
        .then(response => response.json())
        .then(data => {
            document.getElementById('Nama_Pasien').value = data.nama_pasien;
            document.getElementById('Jenis_Kelamin').value = data.jenis_kelamin;
            document.getElementById('Umur').value = data.umur;
        })
        .catch(error => console.error('Error:', error));

    // Mengambil data nama kamar dan harga kamar berdasarkan nomor tempat tidur
    var no_tempat_tidur = document.getElementById('no_tempat_tidur').value;
    fetch('/get-room-details/' + no_tempat_tidur)
        .then(response => response.json())
        .then(data => {
            document.getElementById('Nama_Kamar').value = data.nama_kamar;
            document.getElementById('harga_kamar').value = data.harga_kamar;
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
