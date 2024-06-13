<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PasienRawatInap;
use PDF; 

class PasienRawatInapController extends Controller
{
    // Menampilkan semua data pasien rawat inap
    public function index()
    {
        $pasienRawatInap = PasienRawatInap::all();
        return view('pasien_rawat_inap.index', compact('pasienRawatInap'));
    }

    // Menampilkan form untuk menambahkan pasien rawat inap baru
    public function create()
    {
        return view('pasien_rawat_inap.create');
    }

    // Menyimpan data pasien rawat inap baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'No_RM_Inap' => 'required|unique:pasien_rawat_inap,No_RM_Inap',
            'Nama_Pasien' => 'required',
            'Jenis_Kelamin' => 'required',
            'Alamat' => 'required',
            'Telepon' => 'required',
            'Umur' => 'required|numeric',
            'Tgl_Masuk' => 'required|date',
        ]);

        PasienRawatInap::create($validatedData);

        return redirect()->route('pasien_rawat_inap.index')->with('success', 'Data pasien rawat inap berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit data pasien rawat inap
    public function edit($id)
    {
        $pasienRawatInap = PasienRawatInap::findOrFail($id);
        return view('pasien_rawat_inap.edit', compact('pasienRawatInap'));
    }

    // Memperbarui data pasien rawat inap yang ada
    public function update(Request $request, $id)
    {
        $pasienRawatInap = PasienRawatInap::findOrFail($id);

        $validatedData = $request->validate([
            'No_RM_Inap' => 'required|unique:pasien_rawat_inap,No_RM_Inap,'.$pasienRawatInap->id,
            'Nama_Pasien' => 'required',
            'Jenis_Kelamin' => 'required',
            'Alamat' => 'required',
            'Telepon' => 'required',
            'Umur' => 'required|numeric',
            'Tgl_Masuk' => 'required|date',
        ]);

        $pasienRawatInap->update($validatedData);

        return redirect()->route('pasien_rawat_inap.index')->with('success', 'Data pasien rawat inap berhasil diperbarui.');
    }

    // Menghapus data pasien rawat inap
    public function destroy($id)
    {
        $pasienRawatInap = PasienRawatInap::findOrFail($id);
        $pasienRawatInap->delete();

        return redirect()->route('pasien_rawat_inap.index')->with('success', 'Data pasien rawat inap berhasil dihapus.');
    }

    public function print()
    {
    $pasienRawatInap = PasienRawatInap::all();
    $pdf = Pdf::loadView('pasien_rawat_inap.print', compact('pasienRawatInap'));
    return $pdf->stream('laporan_pasien_rawat_inap.pdf');
    }

   

}
