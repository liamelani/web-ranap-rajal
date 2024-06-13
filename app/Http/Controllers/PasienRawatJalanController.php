<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PasienRawatJalan;
use PDF;

class PasienRawatJalanController extends Controller
{
    // Menampilkan semua data pasien rawat jalan
    public function index()
    {
        $pasienRawatJalan = PasienRawatJalan::all();
        return view('pasien_rawat_jalan.index', compact('pasienRawatJalan'));
    }

    // Menampilkan form untuk menambahkan pasien rawat jalan baru
    public function create()
    {
        return view('pasien_rawat_jalan.create');
    }

    // Menyimpan data pasien rawat jalan baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'No_RM_Jalan' => 'required|unique:pasien_rawat_jalan,No_RM_Jalan',
            'Nama_Pasien' => 'required',
            'Jenis_Kelamin' => 'required',
            'Alamat' => 'required',
            'Telepon' => 'required',
            'Umur' => 'required|numeric',
            'Tgl_Masuk' => 'required|date',
        ]);

        PasienRawatJalan::create($validatedData);

        return redirect()->route('pasien_rawat_jalan.index')->with('success', 'Data pasien rawat jalan berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit data pasien rawat jalan
    public function edit($id)
    {
        $pasienRawatJalan = PasienRawatJalan::findOrFail($id);
        return view('pasien_rawat_jalan.edit', compact('pasienRawatJalan'));
    }

    // Memperbarui data pasien rawat jalan yang ada
    public function update(Request $request, $id)
    {
        $pasienRawatJalan = PasienRawatJalan::findOrFail($id);

        $validatedData = $request->validate([
            'No_RM_Jalan' => 'required|unique:pasien_rawat_jalan,No_RM_Jalan,'.$pasienRawatJalan->id,
            'Nama_Pasien' => 'required',
            'Jenis_Kelamin' => 'required',
            'Alamat' => 'required',
            'Telepon' => 'required',
            'Umur' => 'required|numeric',
            'Tgl_Masuk' => 'required|date',
        ]);

        $pasienRawatJalan->update($validatedData);

        return redirect()->route('pasien_rawat_jalan.index')->with('success', 'Data pasien rawat jalan berhasil diperbarui.');
    }

    // Menghapus data pasien rawat jalan
    public function destroy($id)
    {
        $pasienRawatJalan = PasienRawatJalan::findOrFail($id);
        $pasienRawatJalan->delete();

        return redirect()->route('pasien_rawat_jalan.index')->with('success', 'Data pasien rawat jalan berhasil dihapus.');
    }

    public function print()
    {
    $pasienRawatJalan = PasienRawatJalan::all();
    $pdf = PDF::loadView('pasien_rawat_jalan.print', compact('pasienRawatJalan'));
    return $pdf->stream('laporan_pasien_rawat_jalan.pdf');
    }

}
