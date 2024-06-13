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
                <div class="card-header">Edit Data Kamar</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('kamar.update', $kamar->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="no_tempat_tidur">No. Tempat Tidur</label>
                            <input id="no_tempat_tidur" type="text" class="form-control" name="no_tempat_tidur" value="{{ $kamar->no_tempat_tidur }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="ruang">Ruang</label>
                            <input id="ruang" type="text" class="form-control" name="ruang" value="{{ $kamar->ruang }}" required>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" class="form-control" name="status" required>
                                <option value="Tersedia" {{ $kamar->status == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                                <option value="Tidak Tersedia" {{ $kamar->status == 'Tidak Tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="di_isi_oleh">Di Isi Oleh</label>
                            <select id="di_isi_oleh" class="form-control" name="di_isi_oleh">
                                <option value="">Pilih Pasien</option>
                                @foreach($pasienRawatInap as $pasien)
                                    <option value="{{ $pasien->Nama_Pasien }}" {{ $kamar->di_isi_oleh == $pasien->Nama_Pasien ? 'selected' : '' }}>{{ $pasien->Nama_Pasien }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="harga_kamar">Harga Kamar</label>
                            <input id="harga_kamar" type="number" class="form-control" name="harga_kamar" value="{{ $kamar->harga_kamar }}" required>
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
