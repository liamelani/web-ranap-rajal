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
                        <h6 class="m-0 font-weight-bold text-primary">Diagnosa Rawat Inap</h6>
                        <!-- Icon print -->
                        <a href="{{ route('diagnosa_rawat_inap.print') }}" class="btn btn-primary btn-icon-split btn-sm" style="float: right;">
                            <span class="icon text-white-50">
                                <i class="fas fa-print"></i>
                            </span>
                            <span class="text">Cetak</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <a class="btn btn-primary mb-3" href="{{ route('diagnosa_rawat_inap.create') }}">Tambah Data</a>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No. Diagnosa Inap</th>
                                        <th>Tanggal Diagnosis</th>
                                        <th>No. RM Inap</th>
                                        <th>Nama Pasien</th>
                                        <th>Hasil Diagnosis</th>
                                        <th>Kode Obat</th>
                                        <th>Nama Obat</th>
                                        <th>No. Dokter</th>
                                        <th>Nama Dokter</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($diagnosa_rawat_inap as $diagnosa)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $diagnosa->no_diag_inap }}</td>
                                            <td>{{ $diagnosa->tgl_diagnosis }}</td>
                                            <td>{{ $diagnosa->no_rm_inap }}</td>
                                            <td>{{ $diagnosa->nama_pasien }}</td>
                                            <td>{{ $diagnosa->h_diagnosis }}</td>
                                            <td>{{ $diagnosa->kd_obat }}</td>
                                            <td>{{ $diagnosa->nama_obat }}</td>
                                            <td>{{ $diagnosa->no_dokter }}</td>
                                            <td>{{ $diagnosa->nama_dokter }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="{{ route('diagnosa_rawat_inap.edit', $diagnosa->id) }}">Edit</a>
                                                <form action="{{ route('diagnosa_rawat_inap.destroy', $diagnosa->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data diagnosa ini?')">Delete</button>
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
