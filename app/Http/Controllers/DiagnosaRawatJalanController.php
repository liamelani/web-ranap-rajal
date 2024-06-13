<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiagnosaRawatJalan;
use App\Models\PasienRawatJalan;
use App\Models\Doctor;
use App\Models\Obat;
use PDF;

class DiagnosaRawatJalanController extends Controller
{
    // Fungsi untuk menampilkan halaman index
    public function index()
    {
        $diagnosa_rawat_jalan = DiagnosaRawatJalan::all();
        return view('diagnosa_rawat_jalan.index', compact('diagnosa_rawat_jalan'));
    }

    // Fungsi untuk menampilkan halaman create
    public function create()
    {
        $pasienRawatJalan = PasienRawatJalan::all();
        $doctors = Doctor::all();
        $obats = Obat::all(); // Mengambil semua data obat
        return view('diagnosa_rawat_jalan.create', compact('pasienRawatJalan', 'doctors', 'obats'));
    }

    // Fungsi untuk menyimpan data baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'no_diag_jalan' => 'required|unique:diagnosa_rawat_jalan,no_diag_jalan',
            'tgl_diagnosis' => 'required|date',
            'no_rm_jalan' => 'required',
            'h_diagnosis' => 'required',
            'kd_obat' => 'required|exists:obat,kode_obat',
            'no_dokter' => 'required|exists:doctors,no_dokter',
        ]);

        $patient = PasienRawatJalan::where('No_RM_Jalan', $request->no_rm_jalan)->firstOrFail();
        $doctor = Doctor::where('no_dokter', $request->no_dokter)->firstOrFail();
        $obat = Obat::where('kode_obat', $request->kd_obat)->firstOrFail();

        $validatedData['nama_pasien'] = $patient->Nama_Pasien;
        $validatedData['nama_dokter'] = $doctor->nama;
        $validatedData['nama_obat'] = $obat->nama_obat; // Mengambil nama obat berdasarkan kode obat

        DiagnosaRawatJalan::create($validatedData);

        return redirect()->route('diagnosa_rawat_jalan.index')->with('success', 'Data diagnosa rawat jalan berhasil ditambahkan.');
    }

    // Fungsi untuk menampilkan halaman edit
    public function edit($id)
    {
        $diagnosaRawatJalan = DiagnosaRawatJalan::findOrFail($id);
        $pasienRawatJalan = PasienRawatJalan::all();
        $doctors = Doctor::all();
        $obats = Obat::all(); // Mengambil semua data obat
        return view('diagnosa_rawat_jalan.edit', compact('diagnosaRawatJalan', 'pasienRawatJalan', 'doctors', 'obats'));
    }

    // Fungsi untuk menyimpan perubahan dari halaman edit
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'no_diag_jalan' => 'required|unique:diagnosa_rawat_jalan,no_diag_jalan,' . $id,
            'tgl_diagnosis' => 'required|date',
            'no_rm_jalan' => 'required',
            'h_diagnosis' => 'required',
            'kd_obat' => 'required|exists:obat,kode_obat',
            'no_dokter' => 'required|exists:doctors,no_dokter',
        ]);

        // Ambil data diagnosa rawat jalan berdasarkan ID
        $diagnosaRawatJalan = DiagnosaRawatJalan::findOrFail($id);

        // Ambil data pasien, dokter, dan obat
        $patient = PasienRawatJalan::where('No_RM_Jalan', $request->no_rm_jalan)->firstOrFail();
        $doctor = Doctor::where('no_dokter', $request->no_dokter)->firstOrFail();
        $obat = Obat::where('kode_obat', $request->kd_obat)->firstOrFail();

        // Set nilai nama_pasien, nama_dokter, dan nama_obat pada validatedData
        $validatedData['nama_pasien'] = $patient->Nama_Pasien;
        $validatedData['nama_dokter'] = $doctor->nama;
        $validatedData['nama_obat'] = $obat->nama_obat;

        // Perbarui data dengan data yang baru
        $diagnosaRawatJalan->update($validatedData);

        return redirect()->route('diagnosa_rawat_jalan.index')->with('success', 'Data diagnosa rawat jalan berhasil diperbarui.');
    }

    // Fungsi untuk menghapus data
    public function destroy($id)
    {
        // Temukan data diagnosa rawat jalan berdasarkan ID dan hapus
        $diagnosaRawatJalan = DiagnosaRawatJalan::findOrFail($id);
        $diagnosaRawatJalan->delete();

        return redirect()->route('diagnosa_rawat_jalan.index')->with('success', 'Data diagnosa rawat jalan berhasil dihapus.');
    }

    public function getPatientName($no_rm_jalan)
    {
        $patient = PasienRawatJalan::where('No_RM_Jalan', $no_rm_jalan)->first();
        if ($patient) {
            return response()->json(['nama_pasien' => $patient->Nama_Pasien]);
        } else {
            return response()->json(['error' => 'Patient not found'], 404);
        }
    }

    public function print()
    {
        $diagnosaRawatJalan = DiagnosaRawatJalan::all();
        $pdf = PDF::loadView('diagnosa_rawat_jalan.print', compact('diagnosaRawatJalan'));
        return $pdf->stream('laporan_diagnosa_rawat_jalan.pdf');
    }
}
