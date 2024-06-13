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
                <div class="card-header">Edit Data Diagnosa Rawat Jalan</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('diagnosa_rawat_jalan.update', $diagnosaRawatJalan->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="no_diag_jalan">No. Diagnosa Jalan</label>
                            <input id="no_diag_jalan" type="text" class="form-control" name="no_diag_jalan" value="{{ $diagnosaRawatJalan->no_diag_jalan }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="tgl_diagnosis">Tanggal Diagnosis</label>
                            <input id="tgl_diagnosis" type="date" class="form-control" name="tgl_diagnosis" value="{{ $diagnosaRawatJalan->tgl_diagnosis }}" required>
                        </div>

                        <!-- Dropdown No. RM Jalan -->
                        <div class="form-group">
                            <label for="no_rm_jalan">No. RM Jalan</label>
                            <select id="no_rm_jalan" class="form-control" name="no_rm_jalan" required>
                                <option value="">Pilih No. RM Jalan</option>
                                @foreach($pasienRawatJalan as $pasien)
                                    <option value="{{ $pasien->No_RM_Jalan }}" {{ $pasien->No_RM_Jalan == $diagnosaRawatJalan->no_rm_jalan ? 'selected' : '' }}>{{ $pasien->No_RM_Jalan }} - {{ $pasien->Nama_Pasien }}</option>
                                @endforeach
                            </select>
                            @error('no_rm_jalan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="h_diagnosis">Hasil Diagnosis</label>
                            <textarea id="h_diagnosis" class="form-control" name="h_diagnosis" required>{{ $diagnosaRawatJalan->h_diagnosis }}</textarea>
                        </div>

                        <!-- Dropdown Kode Obat -->
                        <div class="form-group">
                            <label for="kd_obat">Kode Obat</label>
                            <select id="kd_obat" class="form-control" name="kd_obat" required>
                                <option value="">Pilih Kode Obat</option>
                                @foreach($obats as $obat)
                                    <option value="{{ $obat->kode_obat }}">{{ $obat->kode_obat }} - {{ $obat->nama_obat }}</option>
                                @endforeach
                            </select>
                            @error('kd_obat')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Dropdown No. Dokter -->
                        <div class="form-group">
                            <label for="no_dokter">No. Dokter</label>
                            <select id="no_dokter" class="form-control" name="no_dokter" required>
                                <option value="">Pilih No. Dokter</option>
                                @foreach($doctors as $doctor)
                                    <option value="{{ $doctor->no_dokter }}" {{ $doctor->no_dokter == $diagnosaRawatJalan->no_dokter ? 'selected' : '' }}>{{ $doctor->no_dokter }} - {{ $doctor->nama }}</option>
                                @endforeach
                            </select>
                            @error('no_dokter')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                         <!-- Script untuk melakukan request nama pasien berdasarkan no RM pasien -->
                         <script>
                            document.getElementById('no_rm_jalan').addEventListener('change', function() {
                                var no_rm_jalan = this.value;
                                // Lakukan request ke endpoint untuk mendapatkan nama pasien
                                fetch('/get-patient-name/' + no_rm_jalan)
                                    .then(response => response.json())
                                    .then(data => {
                                        document.getElementById('nama_pasien').value = data.nama_pasien;
                                    })
                                    .catch(error => console.error('Error:', error));
                            });
                        </script>

                        <!-- Script untuk melakukan request nama dokter berdasarkan nomor dokter -->
                        <script>
                            document.getElementById('no_dokter').addEventListener('change', function() {
                                var no_dokter = this.value;
                                // Lakukan request ke endpoint untuk mendapatkan nama dokter
                                fetch('/get-doctor-name/' + no_dokter)
                                    .then(response => response.json())
                                    .then(data => {
                                        document.getElementById('nama_dokter').value = data.nama_dokter;
                                    })
                                    .catch(error => console.error('Error:', error));
                            });
                        </script>

                        <button type="submit" class="btn btn-primary">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
