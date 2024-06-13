<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiagnosaRawatInap;
use App\Models\PasienRawatInap;
use App\Models\Doctor;
use App\Models\Obat;
use PDF;


class DiagnosaRawatInapController extends Controller
{
    public function index()
    {
        $diagnosa_rawat_inap = DiagnosaRawatInap::all();
        return view('diagnosa_rawat_inap.index', compact('diagnosa_rawat_inap'));
    }

    public function create()
    {
        $pasienRawatInap = PasienRawatInap::all();
        $doctors = Doctor::all();
        $obats = Obat::all(); // Mengambil semua data obat
        return view('diagnosa_rawat_inap.create', compact('pasienRawatInap', 'doctors', 'obats'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'no_diag_inap' => 'required|unique:diagnosa_rawat_inap,no_diag_inap',
            'tgl_diagnosis' => 'required|date',
            'no_rm_inap' => 'required',
            'h_diagnosis' => 'required',
            'kd_obat' => 'required|exists:obat,kode_obat',
            'no_dokter' => 'required|exists:doctors,no_dokter',
        ]);

        $patient = PasienRawatInap::where('No_RM_Inap', $request->no_rm_inap)->firstOrFail();
        $doctor = Doctor::where('no_dokter', $request->no_dokter)->firstOrFail();
        $obat = Obat::where('kode_obat', $request->kd_obat)->firstOrFail();

        $validatedData['nama_pasien'] = $patient->Nama_Pasien;
        $validatedData['nama_dokter'] = $doctor->nama;
        $validatedData['nama_obat'] = $obat->nama_obat; // Mengambil nama obat berdasarkan kode obat

        DiagnosaRawatInap::create($validatedData);

        return redirect()->route('diagnosa_rawat_inap.index')->with('success', 'Data diagnosa rawat inap berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $diagnosaRawatInap = DiagnosaRawatInap::findOrFail($id);
        $diagnosaRawatInap->delete();
        return redirect()->route('diagnosa_rawat_inap.index')->with('success', 'Data diagnosa rawat inap berhasil dihapus.');
    }

    public function edit($id)
    {
        $diagnosaRawatInap = DiagnosaRawatInap::findOrFail($id);
        $pasienRawatInap = PasienRawatInap::all();
        $doctors = Doctor::all();
        $obats = Obat::all(); // Mengambil semua data obat
        return view('diagnosa_rawat_inap.edit', compact('diagnosaRawatInap', 'pasienRawatInap', 'doctors', 'obats'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'no_diag_inap' => 'required|unique:diagnosa_rawat_inap,no_diag_inap,' . $id,
            'tgl_diagnosis' => 'required|date',
            'no_rm_inap' => 'required',
            'h_diagnosis' => 'required',
            'kd_obat' => 'required|exists:obat,kode_obat',
            'no_dokter' => 'required|exists:doctors,no_dokter',
        ]);

        $patient = PasienRawatInap::where('No_RM_Inap', $request->no_rm_inap)->firstOrFail();
        $doctor = Doctor::where('no_dokter', $request->no_dokter)->firstOrFail();
        $obat = Obat::where('kode_obat', $request->kd_obat)->firstOrFail();

        $validatedData['nama_pasien'] = $patient->Nama_Pasien;
        $validatedData['nama_dokter'] = $doctor->nama;
        $validatedData['nama_obat'] = $obat->nama_obat; // Mengambil nama obat berdasarkan kode obat

        $diagnosaRawatInap = DiagnosaRawatInap::findOrFail($id);
        $diagnosaRawatInap->update($validatedData);

        return redirect()->route('diagnosa_rawat_inap.index')->with('success', 'Data diagnosa rawat inap berhasil diperbarui.');
    }

    public function getPatientName($no_rm_inap)
    {
        $patient = PasienRawatInap::where('No_RM_Inap', $no_rm_inap)->first();
        if ($patient) {
            return response()->json(['nama_pasien' => $patient->Nama_Pasien]);
        } else {
            return response()->json(['error' => 'Patient not found'], 404);
        }
    }


    public function print()
    {
    $diagnosa_rawat_inap = DiagnosaRawatInap::all();
    $pdf = PDF::loadView('diagnosa_rawat_inap.print', compact('diagnosa_rawat_inap'));
    return $pdf->stream('laporan_diagnosa_rawat_inap.pdf');
    }

}
