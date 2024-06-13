@extends('layouts.app')
@section('content')
<form action="{{ route('doctors.store') }}" method="post">
    @csrf 
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Formulir Tambah Dokter</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="no_dokter">Nomor Dokter</label>
                        <input type="text" class="form-control" name="no_dokter" value="{{ old('no_dokter') }}">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Dokter</label>
                        <input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
                    </div>
                    <div class="form-group">
                        <label for="spesialisasi">Spesialisasi</label>
                        <input type="text" class="form-control" name="spesialisasi" value="{{ old('spesialisasi') }}">
                    </div>
                    <div class="form-group">
                        <label for="diterima">Tanggal Diterima</label>
                        <input type="date" class="form-control" name="diterima" value="{{ old('diterima') }}">
                    </div>
                    <div class="form-group">
                        <label for="no_hp">Nomor Telepon</label>
                        <input type="text" class="form-control" name="no_hp" value="{{ old('no_hp') }}">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" name="alamat">{{ old('alamat') }}</textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
