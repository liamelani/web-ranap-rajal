@extends('layouts.app')

@section('content')

@if(session('success'))
    <p class="alert alert-success">{{ session('success') }}</p>
@endif

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Perawat</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Perawat</h6>
            <!-- Icon print -->
            <a href="{{ route('perawat.print') }}" class="btn btn-primary btn-icon-split btn-sm" style="float: right;">
                <span class="icon text-white-50">
                    <i class="fas fa-print"></i>
                </span>
                <span class="text">Cetak</span>
            </a>
        </div>
        <div class="card-body">
            <a class="btn btn-primary mb-3" href="{{ route('perawat.create') }}">Tambah Data</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Perawat</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($perawats as $perawat)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $perawat->kd_perawat }}</td>
                                <td>{{ $perawat->nama }}</td>
                                <td>{{ $perawat->alamat }}</td>
                                <td>{{ $perawat->telepon }}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="{{ route('perawat.edit', $perawat->id) }}"> Edit</a>
                                    <form action="{{ route('perawat.destroy', $perawat->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data perawat ini?')">Delete</button>
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
<!-- /.container-fluid -->

@endsection
