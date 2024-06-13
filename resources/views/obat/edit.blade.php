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
                <div class="card-header">Edit Data Obat</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('obat.update', $obat->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="kode_obat">Kode Obat</label>
                            <input id="kode_obat" type="text" class="form-control" name="kode_obat" value="{{ $obat->kode_obat }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="nama_obat">Nama Obat</label>
                            <input id="nama_obat" type="text" class="form-control" name="nama_obat" value="{{ $obat->nama_obat }}" required>
                        </div>

                        <div class="form-group">
                            <label for="jenis_obat">Jenis Obat</label>
                            <input id="jenis_obat" type="text" class="form-control" name="jenis_obat" value="{{ $obat->jenis_obat }}" required>
                        </div>

                        <div class="form-group">
                            <label for="harga_obat">Harga Obat</label>
                            <input id="harga_obat" type="text" class="form-control" name="harga_obat" value="{{ $obat->harga_obat }}" required>
                        </div>

                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input id="stok" type="text" class="form-control" name="stok" value="{{ $obat->stok }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
