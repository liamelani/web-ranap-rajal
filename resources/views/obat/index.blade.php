@extends('layouts.app')

@section('content')

@if(session('success'))
    <p class="alert alert-success">{{ session('success') }}</p>
@endif

<div id="wrapper">
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <div class="container-fluid">
                <h1 class="h3 mb-2 text-gray-800">Table</h1>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Obat</h6>
                        <!-- Icon print -->
                        <a href="{{ route('obat.print') }}" class="btn btn-primary btn-icon-split btn-sm" style="float: right;">
                            <span class="icon text-white-50">
                                <i class="fas fa-print"></i>
                            </span>
                            <span class="text">Cetak</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <a class="btn btn-primary mb-3" href="{{ route('obat.create') }}">Tambah Data</a>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Obat</th>
                                        <th>Nama Obat</th>
                                        <th>Jenis Obat</th>
                                        <th>Harga Obat</th>
                                        <th>Stok</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($obats as $obat)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $obat->kode_obat }}</td>
                                            <td>{{ $obat->nama_obat }}</td>
                                            <td>{{ $obat->jenis_obat }}</td>
                                            <td>{{ $obat->harga_obat }}</td>
                                            <td>{{ $obat->stok }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="{{ route('obat.edit', $obat->id) }}">Edit</a>
                                                <form action="{{ route('obat.destroy', $obat->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data obat ini?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
