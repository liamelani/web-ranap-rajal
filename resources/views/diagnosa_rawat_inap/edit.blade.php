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
                <div class="card-header">Edit Data Diagnosa Rawat Inap</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('diagnosa_rawat_inap.update', $diagnosaRawatInap->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="no_diag_inap">No. Diagnosa Inap</label>
                            <input id="no_diag_inap" type="text" class="form-control" name="no_diag_inap" value="{{ $diagnosaRawatInap->no_diag_inap }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="tgl_diagnosis">Tanggal Diagnosis</label>
                            <input id="tgl_diagnosis" type="date" class="form-control" name="tgl_diagnosis" value="{{ $diagnosaRawatInap->tgl_diagnosis }}" required>
                        </div>

                        <!-- Dropdown No. RM Inap -->
                        <div class="form-group">
                            <label for="no_rm_inap">No. RM Inap</label>
                            <select id="no_rm_inap" class="form-control" name="no_rm_inap" required>
                                <option value="">Pilih No. RM Inap</option>
                                @foreach($pasienRawatInap as $pasien)
                                    <option value="{{ $pasien->No_RM_Inap }}" {{ $pasien->No_RM_Inap == $diagnosaRawatInap->no_rm_inap ? 'selected' : '' }}>{{ $pasien->No_RM_Inap }} - {{ $pasien->Nama_Pasien }}</option>
                                @endforeach
                            </select>
                            @error('no_rm_inap')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        

                        <div class="form-group">
                            <label for="h_diagnosis">Hasil Diagnosis</label>
                            <textarea id="h_diagnosis" class="form-control" name="h_diagnosis" required>{{ $diagnosaRawatInap->h_diagnosis }}</textarea>
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

                        

                        <!-- Dropdown No. Dokter -->
                        <div class="form-group">
                            <label for="no_dokter">No. Dokter</label>
                            <select id="no_dokter" class="form-control" name="no_dokter" required>
                                <option value="">Pilih No. Dokter</option>
                                @foreach($doctors as $doctor)
                                    <option value="{{ $doctor->no_dokter }}" {{ $doctor->no_dokter == $diagnosaRawatInap->no_dokter ? 'selected' : '' }}>{{ $doctor->no_dokter }} - {{ $doctor->nama}}</option>
                                @endforeach
                            </select>
                            @error('no_dokter')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                         <!-- Script untuk melakukan request nama pasien berdasarkan no RM pasien -->
                         <script>
                            document.getElementById('no_rm_inap').addEventListener('change', function() {
                                var no_rm_inap = this.value;
                                // Lakukan request ke endpoint untuk mendapatkan nama pasien
                                fetch('/get-patient-name/' + no_rm_inap)
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
