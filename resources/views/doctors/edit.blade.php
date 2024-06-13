@extends('layouts.app')
@section('content')

@if($errors->any())
    @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{$err}}</p>
    @endforeach
@endif

<form action="{{ route('doctors.update', $doctor->id) }}" method="post">
    @csrf
    @method('PUT') 
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Formulir Edit Dokter</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="no_dokter">Nomor Dokter</label>
                        <input type="text" class="form-control" name="no_dokter" value="{{ $doctor->no_dokter }}">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Dokter</label>
                        <input type="text" class="form-control" name="nama" value="{{ $doctor->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="spesialisasi">Spesialisasi</label>
                        <input type="text" class="form-control" name="spesialisasi" value="{{ $doctor->spesialisasi }}">
                    </div>
                    <div class="form-group">
                        <label for="diterima">Tanggal Diterima</label>
                        <input type="date" class="form-control" name="diterima" value="{{ $doctor->diterima }}">
                    </div>
                    <div class="form-group">
                        <label for="no_hp">Nomor Telepon</label>
                        <input type="text" class="form-control" name="no_hp" value="{{ $doctor->no_hp }}">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" name="alamat">{{ $doctor->alamat }}</textarea>
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