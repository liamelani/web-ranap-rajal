<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use PDF;


class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        return view('doctors.index', compact('doctors'));
    }

    public function create()
    {
        return view('doctors.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'no_dokter' => 'required|unique:doctors,no_dokter',
            'nama' => 'required',
            'spesialisasi' => 'required',
            'diterima' => 'required|date',
            'no_hp' => 'nullable|numeric',
            'alamat' => 'nullable',
        ], [
            'no_dokter.unique' => 'Nomor dokter sudah digunakan. Mohon gunakan nomor dokter yang lain.',
        ]);
    
        // Simpan data
        Doctor::create($validatedData);
    
        // Redirect dengan pesan sukses
        return redirect()->route('doctors.index')->with('success', 'Data dokter berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        // Temukan dokter berdasarkan ID
        $doctor = Doctor::findOrFail($id);

        // Hapus dokter
        $doctor->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('doctors.index')->with('success', 'Data dokter berhasil dihapus.');
    }

    public function edit($id)
    {
        // Temukan dokter berdasarkan ID
        $doctor = Doctor::findOrFail($id);

        // Tampilkan form edit dengan data dokter yang ditemukan
        return view('doctors.edit', compact('doctor'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'no_dokter' => 'required|unique:doctors,no_dokter,' . $id,
            'nama' => 'required',
            'spesialisasi' => 'required',
            'diterima' => 'required|date',
            'no_hp' => 'nullable|numeric',
            'alamat' => 'nullable',
        ], [
            'no_dokter.unique' => 'Nomor dokter sudah digunakan. Mohon gunakan nomor dokter yang lain.',
        ]);
    
        // Temukan dokter berdasarkan ID
        $doctor = Doctor::findOrFail($id);
    
        // Update data dokter
        $doctor->update($validatedData);
    
        // Redirect dengan pesan sukses
        return redirect()->route('doctors.index')->with('success', 'Data dokter berhasil diperbarui.');
    }

    public function print()
    {
        $doctors = Doctor::all();

        // Load view template untuk pencetakan dokter ke dalam PDF
        $pdf = DomPDFPDF::loadView('doctors.print', compact('doctors'));

        // Kembalikan tampilan PDF
        return $pdf->stream('laporan_dokter.pdf');
    }

    
}
