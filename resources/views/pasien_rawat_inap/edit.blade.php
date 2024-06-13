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
                <div class="card-header">Edit Data Pasien Rawat Inap</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('pasien_rawat_inap.update', $pasienRawatInap->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="No_RM_Inap">No. RM Inap</label>
                            <input id="No_RM_Inap" type="text" class="form-control" name="No_RM_Inap" value="{{ $pasienRawatInap->No_RM_Inap }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="Nama_Pasien">Nama Pasien</label>
                            <input id="Nama_Pasien" type="text" class="form-control" name="Nama_Pasien" value="{{ $pasienRawatInap->Nama_Pasien }}" required>
                        </div>

                        <div class="form-group">
                            <label for="Jenis_Kelamin">Jenis Kelamin</label>
                            <select id="Jenis_Kelamin" class="form-control" name="Jenis_Kelamin" required>
                                <option value="Laki-laki" {{ $pasienRawatInap->Jenis_Kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ $pasienRawatInap->Jenis_Kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="Alamat">Alamat</label>
                            <textarea id="Alamat" class="form-control" name="Alamat" required>{{ $pasienRawatInap->Alamat }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="Telepon">Telepon</label>
                            <input id="Telepon" type="text" class="form-control" name="Telepon" value="{{ $pasienRawatInap->Telepon }}" required>
                        </div>

                        <div class="form-group">
                            <label for="Umur">Umur</label>
                            <input id="Umur" type="number" class="form-control" name="Umur" value="{{ $pasienRawatInap->Umur }}" required>
                        </div>

                        <div class="form-group">
                            <label for="Tgl_Masuk">Tanggal Masuk</label>
                            <input id="Tgl_Masuk" type="date" class="form-control" name="Tgl_Masuk" value="{{ $pasienRawatInap->Tgl_Masuk }}" required>
                        </div>

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
