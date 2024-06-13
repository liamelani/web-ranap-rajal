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
                <div class="card-header">Edit Data Perawat</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('perawat.update', $perawat->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="kd_perawat">Kode Perawat</label>
                            <input id="kd_perawat" type="text" class="form-control" name="kd_perawat" value="{{ $perawat->kd_perawat }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama Perawat</label>
                            <input id="nama" type="text" class="form-control" name="nama" value="{{ $perawat->nama }}" required>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input id="alamat" type="text" class="form-control" name="alamat" value="{{ $perawat->alamat }}" required>
                        </div>

                        <div class="form-group">
                            <label for="telepon">Telepon</label>
                            <input id="telepon" type="text" class="form-control" name="telepon" value="{{ $perawat->telepon }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
