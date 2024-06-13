<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PasienRawatInap;

class PasienRawatInapController extends Controller
{
    public function index()
    {
        $patients = PasienRawatInap::all();
        return response()->json([
            'status' => true,
            'message' => 'Data ditemukan',
            'data' => $patients
        ], 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'No_RM_Inap' => 'required',
            'Nama_Pasien' => 'required',
            'Jenis_Kelamin' => 'required',
            'Alamat' => 'required',
            'Telepon' => 'required',
            'Umur' => 'required',
            'Tgl_Masuk' => 'required',
        ]);

        try {
            $patient = PasienRawatInap::create($validatedData);
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil disimpan',
                'data' => $patient
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Data gagal disimpan',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        $patient = PasienRawatInap::find($id);
        if ($patient) {
            return response()->json([
                'status' => true,
                'message' => 'Data ditemukan',
                'data' => $patient
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'No_RM_Inap' => 'required',
            'Nama_Pasien' => 'required',
            'Jenis_Kelamin' => 'required',
            'Alamat' => 'required',
            'Telepon' => 'required',
            'Umur' => 'required',
            'Tgl_Masuk' => 'required',
        ]);

        $patient = PasienRawatInap::findOrFail($id);
        try {
            $patient->update($validatedData);
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil diperbarui',
                'data' => $patient
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Data gagal diperbarui',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        $patient = PasienRawatInap::find($id);

        if ($patient) {
            $patient->delete();
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil dihapus'
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
    }
}
