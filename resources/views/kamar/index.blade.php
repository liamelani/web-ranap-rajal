@extends('layouts.app')

@section('content')

@if(session('success'))
    <p class="alert alert-success">{{ session('success') }}</p>
@endif

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
                        <h6 class="m-0 font-weight-bold text-primary">Data Kamar</h6>
                        <!-- Icon print -->
                        <a href="{{ route('kamar.print') }}" class="btn btn-primary btn-icon-split btn-sm" style="float: right;">
                            <span class="icon text-white-50">
                                <i class="fas fa-print"></i>
                            </span>
                            <span class="text">Cetak</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <a class="btn btn-primary mb-3" href="{{ route('kamar.create') }}">Tambah Data</a>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>No. Tempat Tidur</th>
                                        <th>Ruang</th>
                                        <th>Status</th>
                                        <th>Di Isi Oleh</th>
                                        <th>Harga Kamar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kamars as $kamar)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $kamar->no_tempat_tidur }}</td>
                                            <td>{{ $kamar->ruang }}</td>
                                            <td>{{ $kamar->status }}</td>
                                            <td>{{ $kamar->di_isi_oleh }}</td>
                                            <td>{{ $kamar->harga_kamar }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="{{ route('kamar.edit', $kamar->id) }}">Edit</a>
                                                <form action="{{ route('kamar.destroy', $kamar->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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
