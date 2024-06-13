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
                            <h6 class="m-0 font-weight-bold text-primary">Data Laporan Perawatan Jalan</h6>
                            <!-- Icon print -->
                            <a href="{{ route('laporan_rawat_jalan.print') }}" class="btn btn-primary btn-icon-split btn-sm" style="float: right;">
                                <span class="icon text-white-50">
                                    <i class="fas fa-print"></i>
                                </span>
                                <span class="text">Cetak</span>
                            </a>
                        </div>
                        <div class="card-body">
                            <a class="btn btn-primary mb-3" href="{{ route('laporan_rawat_jalan.create') }}">Tambah Data</a>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No. Rawat</th>
                                            <th>Nama Pasien</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Umur</th>
                                            <th>Nama Obat</th>
                                            <th>Harga Obat</th>
                                            <th>Biaya Dokter</th>
                                            <th>Total Biaya</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($laporanRawatJalans as $laporan)
                                            <tr>
                                                <td>{{ $laporan->No_Rawat }}</td>
                                                <td>{{ $laporan->Nama_Pasien }}</td>
                                                <td>{{ $laporan->Jenis_Kelamin }}</td>
                                                <td>{{ $laporan->Umur }}</td>
                                                <td>{{ $laporan->Nama_Obat }}</td>
                                                <td>{{ $laporan->Harga_Obat }}</td>
                                                <td>{{ $laporan->Biaya_Dokter }}</td>
                                                <td>{{ $laporan->Total_Biaya }}</td>
                                                <td>
                                                    <a class="btn btn-sm btn-primary" href="{{ route('laporan_rawat_jalan.edit', $laporan->id) }}"> Edit</a>
                                                    <form action="{{ route('laporan_rawat_jalan.destroy', $laporan->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data laporan rawat jalan ini?')">Delete</button>
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
