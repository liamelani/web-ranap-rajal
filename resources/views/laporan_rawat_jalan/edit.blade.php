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
                <div class="card-header">Edit Data Laporan Rawat Jalan</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('laporan_rawat_jalan.update', $laporanRawatJalan->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="No_Rawat">No. Rawat</label>
                            <input id="No_Rawat" type="text" class="form-control" name="No_Rawat" value="{{ $laporanRawatJalan->No_Rawat }}" required autofocus>
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
                            <label for="kode_obat">Kode Obat</label>
                            <select id="kode_obat" class="form-control" name="kode_obat" required>
                                <option value="">Kode Obat</option>
                                @foreach($diagnosaRawatJalans as $diagnosaRawatJalan)
                                    <option value="{{ $diagnosaRawatJalan->kd_obat }}" {{ $laporanRawatJalan->kode_obat == $diagnosaRawatJalan->kd_obat ? 'selected' : '' }}>{{ $diagnosaRawatJalan->kd_obat }} - {{ $diagnosaRawatJalan->nama_pasien }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="Biaya_Dokter">Biaya Dokter</label>
                            <input id="Biaya_Dokter" type="text" class="form-control" name="Biaya_Dokter" value="{{ $laporanRawatJalan->Biaya_Dokter }}" required>
                        </div>

                        <!-- Script untuk mengambil detail pasien saat memilih No. RM Jalan -->
                        <script>
                            document.getElementById('No_RM_Jalan').addEventListener('change', function() {
                                var no_rm_jalan = this.value;
                                fetch('/get-patient-details/' + no_rm_jalan)
                                    .then(response => response.json())
                                    .then(data => {
                                        document.getElementById('Nama_Pasien').value = data.Nama_Pasien;
                                        document.getElementById('Jenis_Kelamin').value = data.Jenis_Kelamin;
                                        document.getElementById('Umur').value = data.Umur;
                                    })
                                    .catch(error => console.error('Error:', error));
                            });

                            // Mengambil data nama obat dan harga obat berdasarkan kode obat
                            document.getElementById('kode_obat').addEventListener('change', function() {
                                var kode_obat = this.value;
                                fetch('/get-drug-details/' + kode_obat)
                                    .then(response => response.json())
                                    .then(data => {
                                        document.getElementById('Nama_Obat').value = data.nama_obat;
                                        document.getElementById('Harga_Obat').value = data.harga_obat;
                                    })
                                    .catch(error => console.error('Error:', error));
                            });
                        </script>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
