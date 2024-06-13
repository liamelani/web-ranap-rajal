<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanRawatJalan;
use App\Models\PasienRawatJalan;
use App\Models\Obat;
use App\Models\DiagnosaRawatJalan;
use PDF;

class LaporanRawatJalanController extends Controller
{
    public function index()
    {
        $laporanRawatJalans = LaporanRawatJalan::all();
        return view('laporan_rawat_jalan.index', compact('laporanRawatJalans'));
    }

    public function create()
    {
        $pasienRawatJalans = PasienRawatJalan::all();
        $obats = Obat::all();
        $diagnosaRawatJalans = DiagnosaRawatJalan::all();
        return view('laporan_rawat_jalan.create', compact('pasienRawatJalans', 'obats', 'diagnosaRawatJalans'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'No_Rawat' => 'required|unique:laporan_rawat_jalan',
            'No_RM_Jalan' => 'required|exists:pasien_rawat_jalan,No_RM_Jalan',
            'kode_obat' => 'required|exists:obat,kode_obat',
            'Biaya_Dokter' => 'required|numeric|min:0',
        ]);

        // Ambil data nama pasien berdasarkan No_RM_Jalan
        $patient = PasienRawatJalan::where('No_RM_Jalan', $request->No_RM_Jalan)->firstOrFail();
        $validatedData['Nama_Pasien'] = $patient->Nama_Pasien;
        $validatedData['Jenis_Kelamin'] = $patient->Jenis_Kelamin;
        $validatedData['Umur'] = $patient->Umur;

        // Ambil data nama obat dan harga obat berdasarkan kode_obat
        $obat = Obat::where('kode_obat', $request->kode_obat)->firstOrFail();
        $validatedData['Nama_Obat'] = $obat->nama_obat;
        $validatedData['Harga_Obat'] = $obat->harga_obat;

        // Menghitung total biaya
        $totalBiaya = $validatedData['Harga_Obat'] + $request->Biaya_Dokter;
        $validatedData['Total_Biaya'] = $totalBiaya;

        LaporanRawatJalan::create($validatedData);

        return redirect()->route('laporan_rawat_jalan.index')->with('success', 'Data laporan rawat jalan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $laporanRawatJalan = LaporanRawatJalan::findOrFail($id);
        $pasienRawatJalans = PasienRawatJalan::all();
        $obats = Obat::all();
        $diagnosaRawatJalans = DiagnosaRawatJalan::all();
        return view('laporan_rawat_jalan.edit', compact('laporanRawatJalan', 'pasienRawatJalans', 'obats', 'diagnosaRawatJalans'));
    }

    public function update(Request $request, $id)
    {
        $laporanRawatJalan = LaporanRawatJalan::findOrFail($id);

        $validatedData = $request->validate([
            'No_Rawat' => 'required|unique:laporan_rawat_jalan,No_Rawat,' . $laporanRawatJalan->id,
            'No_RM_Jalan' => 'required|exists:pasien_rawat_jalan,No_RM_Jalan',
            'kode_obat' => 'required|exists:obat,kode_obat',
            'Biaya_Dokter' => 'required|numeric|min:0',
        ]);

        // Ambil data nama pasien berdasarkan No_RM_Jalan
        $patient = PasienRawatJalan::where('No_RM_Jalan', $request->No_RM_Jalan)->firstOrFail();
        $validatedData['Nama_Pasien'] = $patient->Nama_Pasien;
        $validatedData['Jenis_Kelamin'] = $patient->Jenis_Kelamin;
        $validatedData['Umur'] = $patient->Umur;

        // Ambil data nama obat dan harga obat berdasarkan kode_obat
        $obat = Obat::where('kode_obat', $request->kode_obat)->firstOrFail();
        $validatedData['Nama_Obat'] = $obat->nama_obat;
        $validatedData['Harga_Obat'] = $obat->harga_obat;

        // Menghitung total biaya
        $totalBiaya = $validatedData['Harga_Obat'] + $request->Biaya_Dokter;
        $validatedData['Total_Biaya'] = $totalBiaya;

        $laporanRawatJalan->update($validatedData);

        return redirect()->route('laporan_rawat_jalan.index')->with('success', 'Data laporan rawat jalan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $laporanRawatJalan = LaporanRawatJalan::findOrFail($id);
        $laporanRawatJalan->delete();

        return redirect()->route('laporan_rawat_jalan.index')->with('success', 'Data laporan rawat jalan berhasil dihapus.');
    }

    public function print()
    {
        $laporanRawatJalans = LaporanRawatJalan::all();
        $pdf = PDF::loadView('laporan_rawat_jalan.print', compact('laporanRawatJalans'));
        return $pdf->stream('laporan_rawat_jalan.pdf');
    }
}
