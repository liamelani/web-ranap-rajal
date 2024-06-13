<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanRawatInap;
use App\Models\LaporanRawatJalan;

class AdministrasiController extends Controller
{
    public function index()
    {
        return view('administrasi.index');
    }

    public function searchLaporan(Request $request)
    {
        $nomorRawat = $request->nomor_rawat;
        $jenisLaporan = $request->jenis_laporan;

        if ($jenisLaporan == 'rawat_inap') {
            $laporan = LaporanRawatInap::where('No_Rawat', $nomorRawat)->first();
        } elseif ($jenisLaporan == 'rawat_jalan') {
            $laporan = LaporanRawatJalan::where('No_Rawat', $nomorRawat)->first();
        }

        if (!$laporan) {
            return response()->json(['error' => 'Data laporan ' . ucfirst($jenisLaporan) . ' tidak ditemukan']);
        }

        return response()->json([
            'Nama_Pasien'=> $laporan->Nama_Pasien,
            'Harga_Obat' => $laporan->Harga_Obat,
            'harga_kamar' => $laporan->harga_kamar ?? null, // Menambahkan null coalescing untuk menghindari kesalahan jika tidak ada data
            'Biaya_Dokter' => $laporan->Biaya_Dokter ?? null, // Menambahkan null coalescing untuk menghindari kesalahan jika tidak ada data
            'Total_Biaya' => $laporan->Total_Biaya,
        ]);
    }
}
