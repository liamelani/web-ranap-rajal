@extends('layouts.app')

@section('content')

@if(session('success'))
    <p class="alert alert-success">{{ session('success') }}</p>
@endif

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Table</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pasien Rawat Jalan</h6>
                            <!-- Icon print -->
                            <a href="{{ route('pasien_rawat_jalan.print') }}" class="btn btn-primary btn-icon-split btn-sm" style="float: right;">
                                <span class="icon text-white-50">
                                    <i class="fas fa-print"></i>
                                </span>
                                <span class="text">Cetak</span>
                            </a>
                        </div>
                        <div class="card-body">
                            <a class="btn btn-primary mb-3" href="{{ route('pasien_rawat_jalan.create') }}">Tambah Data</a>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No. RM Jalan</th>
                                            <th>Nama Pasien</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>Telepon</th>
                                            <th>Umur</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pasienRawatJalan as $pasien)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $pasien->No_RM_Jalan }}</td>
                                                <td>{{ $pasien->Nama_Pasien }}</td>
                                                <td>{{ $pasien->Jenis_Kelamin }}</td>
                                                <td>{{ $pasien->Alamat }}</td>
                                                <td>{{ $pasien->Telepon }}</td>
                                                <td>{{ $pasien->Umur }}</td>
                                                <td>{{ $pasien->Tgl_Masuk }}</td>
                                                <td>
                                                    <a class="btn btn-sm btn-primary" href="{{ route('pasien_rawat_jalan.edit', $pasien->id) }}"> Edit</a>
                                                    <form action="{{ route('pasien_rawat_jalan.destroy', $pasien->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data pasien ini?')">Delete</button>
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

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

@endsection
