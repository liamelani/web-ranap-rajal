<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perawat;
use PDF;

class PerawatController extends Controller
{
    public function index()
    {
        $perawats = Perawat::all();
        return view('perawat.index', compact('perawats'));
    }

    public function create()
    {
        return view('perawat.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'kd_perawat' => 'required|unique:perawat',
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required|numeric',
        ], [
            'kd_perawat.unique' => 'Kode perawat sudah digunakan. Mohon gunakan kode perawat yang lain.',
        ]);
    
        // Simpan data
        Perawat::create($validatedData);
    
        // Redirect dengan pesan sukses
        return redirect()->route('perawat.index')->with('success', 'Data perawat berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        // Temukan perawat berdasarkan ID
        $perawat = Perawat::findOrFail($id);

        // Hapus perawat
        $perawat->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('perawat.index')->with('success', 'Data perawat berhasil dihapus.');
    }

    public function edit($id)
    {
        // Temukan perawat berdasarkan ID
        $perawat = Perawat::findOrFail($id);

        // Tampilkan form edit dengan data perawat yang ditemukan
        return view('perawat.edit', compact('perawat'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'kd_perawat' => 'required|unique:perawat,kd_perawat,' . $id,
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required|numeric',
        ], [
            'kd_perawat.unique' => 'Kode perawat sudah digunakan. Mohon gunakan kode perawat yang lain.',
        ]);
    
        // Temukan perawat berdasarkan ID
        $perawat = Perawat::findOrFail($id);
    
        // Update data perawat
        $perawat->update($validatedData);
    
        // Redirect dengan pesan sukses
        return redirect()->route('perawat.index')->with('success', 'Data perawat berhasil diperbarui.');
    }

    public function print()
    {
        $perawats = Perawat::all();

        // Load view template untuk pencetakan perawat ke dalam PDF
        $pdf = PDF::loadView('perawat.print', compact('perawats'));

        // Kembalikan tampilan PDF
        return $pdf->stream('laporan_perawat.pdf');
    }
}
