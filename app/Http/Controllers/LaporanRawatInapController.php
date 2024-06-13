<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanRawatInap;
use App\Models\PasienRawatInap;
use App\Models\Kamar;
use App\Models\Obat;
use App\Models\DiagnosaRawatInap;

use PDF;

class LaporanRawatInapController extends Controller
{
    public function index()
    {
        $laporanRawatInaps = LaporanRawatInap::all();
        return view('laporan_rawat_inap.index', compact('laporanRawatInaps'));
    }

    public function create()
    {
        $pasienRawatInaps = PasienRawatInap::all();
        $kamars = Kamar::all();
        $obats = Obat::all();
        $diagnosaRawatInaps = DiagnosaRawatInap::all();
        return view('laporan_rawat_inap.create', compact('pasienRawatInaps', 'kamars', 'obats', 'diagnosaRawatInaps'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'No_Rawat' => 'required|unique:laporan_rawat_inap',
            'No_RM_Inap' => 'required|exists:pasien_rawat_inap,No_RM_Inap',
            'no_tempat_tidur' => 'required|exists:kamar,no_tempat_tidur',
            'kode_obat' => 'required|exists:obat,kode_obat',
            
            'Biaya_Dokter' => 'required|numeric|min:0',
        ]);

        // Ambil data nama kamar dan harga kamar berdasarkan no_tempat_tidur
        $kamar = Kamar::where('no_tempat_tidur', $request->no_tempat_tidur)->firstOrFail();
        $validatedData['Nama_Kamar'] = $kamar->ruang;
        $validatedData['harga_kamar'] = $kamar->harga_kamar;

        // Ambil data nama obat dan harga obat berdasarkan kode_obat
        $obat = Obat::where('kode_obat', $request->kode_obat)->firstOrFail();
        $validatedData['Nama_Obat'] = $obat->nama_obat;
        $validatedData['Harga_Obat'] = $obat->harga_obat;

        // Mengambil data pasien berdasarkan No_RM_Inap yang diterima
        $patient = PasienRawatInap::where('No_RM_Inap', $request->No_RM_Inap)->firstOrFail();
        $validatedData['Nama_Pasien'] = $patient->Nama_Pasien;
        $validatedData['Jenis_Kelamin'] = $patient->Jenis_Kelamin;
        $validatedData['Umur'] = $patient->Umur;

        // Menghitung total biaya
        $totalBiaya = $validatedData['Harga_Obat'] + $validatedData['harga_kamar'] + $request->Biaya_Dokter;
        $validatedData['Total_Biaya'] = $totalBiaya;

        LaporanRawatInap::create($validatedData);

        return redirect()->route('laporan_rawat_inap.index')->with('success', 'Data laporan rawat inap berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $laporanRawatInap = LaporanRawatInap::findOrFail($id);
        $pasienRawatInaps = PasienRawatInap::all();
        $kamars = Kamar::all();
        $obats = Obat::all();
        $diagnosaRawatInaps = DiagnosaRawatInap::all();
        return view('laporan_rawat_inap.edit', compact('laporanRawatInap', 'pasienRawatInaps', 'kamars', 'obats','diagnosaRawatInaps'));
    }

    public function update(Request $request, $id)
    {
        $laporanRawatInap = LaporanRawatInap::findOrFail($id);

        $validatedData = $request->validate([
            'No_Rawat' => 'required|unique:laporan_rawat_inap,No_Rawat,' . $laporanRawatInap->id,
            'No_RM_Inap' => 'required|exists:pasien_rawat_inap,No_RM_Inap',
            'no_tempat_tidur' => 'required|exists:kamar,no_tempat_tidur',
            'kode_obat' => 'required|exists:obat,kode_obat',
           
            'Biaya_Dokter' => 'required|numeric|min:0',
        ]);

        // Ambil data nama kamar dan harga kamar berdasarkan no_tempat_tidur
        $kamar = Kamar::where('no_tempat_tidur', $request->no_tempat_tidur)->firstOrFail();
        $validatedData['Nama_Kamar'] = $kamar->ruang;
        $validatedData['harga_kamar'] = $kamar->harga_kamar;

        // Ambil data nama obat dan harga obat berdasarkan kode_obat
        $obat = Obat::where('kode_obat', $request->kode_obat)->firstOrFail();
        $validatedData['Nama_Obat'] = $obat->nama_obat;
        $validatedData['Harga_Obat'] = $obat->harga_obat;

        // Mengambil data pasien berdasarkan No_RM_Inap yang diterima
        $patient = PasienRawatInap::where('No_RM_Inap', $request->No_RM_Inap)->firstOrFail();
        $validatedData['Nama_Pasien'] = $patient->Nama_Pasien;
        $validatedData['Jenis_Kelamin'] = $patient->Jenis_Kelamin;
        $validatedData['Umur'] = $patient->Umur;

        // Menghitung total biaya
        $totalBiaya = $validatedData['Harga_Obat'] + $validatedData['harga_kamar'] + $request->Biaya_Dokter;
        $validatedData['Total_Biaya'] = $totalBiaya;

        $laporanRawatInap->update($validatedData);

        return redirect()->route('laporan_rawat_inap.index')->with('success', 'Data laporan rawat inap berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $laporanRawatInap = LaporanRawatInap::findOrFail($id);
        $laporanRawatInap->delete();

        return redirect()->route('laporan_rawat_inap.index')->with('success', 'Data laporan rawat inap berhasil dihapus.');
    }

    public function print()
    {
        $laporanRawatInaps = LaporanRawatInap::all();
        $pdf = PDF::loadView('laporan_rawat_inap.print', compact('laporanRawatInaps'));
        return $pdf->stream('laporan_rawat_inap.pdf');
    }
}
