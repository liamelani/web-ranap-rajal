<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        return response()->json([
            'status' => true,
            'message' => 'Data ditemukan',
            'data' => $doctors
        ], 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'no_dokter' => 'required',
            'nama' => 'required',
            'spesialisasi' => 'required',
            'diterima' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        try {
            $doctor = Doctor::create($validatedData);
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil disimpan',
                'data' => $doctor
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Data gagal disimpan',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show(int $id)
    {
        $doctor = Doctor::find($id);
        if ($doctor) {
            return response()->json([
                'status' => true,
                'message' => 'Data ditemukan',
                'data' => $doctor
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
            'no_dokter' => 'required',
            'nama' => 'required',
            'spesialisasi' => 'required',
            'diterima' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        $doctor = Doctor::findOrFail($id);
        try {
            $doctor->update($validatedData);
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil diperbarui',
                'data' => $doctor
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
        $doctor = Doctor::find($id);

        if ($doctor) {
            $doctor->delete();
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

