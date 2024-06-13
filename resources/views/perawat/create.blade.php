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
                <div class="card-header">Tambah Data Perawat</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('perawat.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="kd_perawat">Kode Perawat</label>
                            <input id="kd_perawat" type="text" class="form-control" name="kd_perawat" value="{{ old('kd_perawat') }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama Perawat</label>
                            <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea id="alamat" class="form-control" name="alamat" required>{{ old('alamat') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="telepon">Telepon</label>
                            <input id="telepon" type="text" class="form-control" name="telepon" value="{{ old('telepon') }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
