@extends('layouts.app')

@section('content')
    <div class="container">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tambah Data Diagnosa Rawat Jalan</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('diagnosa_rawat_jalan.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="no_diag_jalan">No. Diagnosa Jalan</label>
                                <input id="no_diag_jalan" type="text" class="form-control" name="no_diag_jalan" value="{{ old('no_diag_jalan') }}" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="tgl_diagnosis">Tanggal Diagnosis</label>
                                <input id="tgl_diagnosis" type="date" class="form-control" name="tgl_diagnosis" value="{{ old('tgl_diagnosis') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="no_rm_jalan">No. RM Jalan</label>
                                <select id="no_rm_jalan" class="form-control" name="no_rm_jalan" required>
                                    <option value="">Pilih No. RM Jalan</option>
                                    @foreach($pasienRawatJalan as $pasien)
                                        <option value="{{ $pasien->No_RM_Jalan }}">{{ $pasien->No_RM_Jalan }} - {{ $pasien->Nama_Pasien}}</option>
                                    @endforeach
                                </select>
                                @error('no_rm_jalan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="h_diagnosis">Hasil Diagnosis</label>
                                <textarea id="h_diagnosis" class="form-control" name="h_diagnosis" required>{{ old('h_diagnosis') }}</textarea>
                            </div>

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

                            <div class="form-group">
                                <label for="no_dokter">No. Dokter</label>
                                <select id="no_dokter" class="form-control" name="no_dokter" required>
                                    <option value="">Pilih No. Dokter</option>
                                    @foreach($doctors as $doctor)
                                        <option value="{{ $doctor->no_dokter }}">{{ $doctor->no_dokter}} - {{ $doctor->nama}}</option>
                                    @endforeach
                                </select>
                                @error('no_dokter')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('kd_obat').addEventListener('change', function() {
            var kode_obat = this.value;
            fetch('/get-obat-name/' + kode_obat)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('nama_obat').value = data.nama_obat;
                })
                .catch(error => console.error('Error:', error));
        });

        document.getElementById('no_rm_jalan').addEventListener('change', function() {
            var no_rm_jalan = this.value;
            fetch('/get-patient-name/' + no_rm_jalan)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('nama_pasien').value = data.nama_pasien;
                })
                .catch(error => console.error('Error:', error));
        });

        document.getElementById('no_dokter').addEventListener('change', function() {
            var no_dokter = this.value;
            fetch('/get-doctor-name/' + no_dokter)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('nama_dokter').value = data.nama_dokter;
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
@endsection
