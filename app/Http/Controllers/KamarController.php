<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\PasienRawatInap;
use PDF;

class KamarController extends Controller
{
    public function index()
    {
        $kamars = Kamar::all();
        return view('kamar.index', compact('kamars'));
    }

    public function create()
    {
        $pasienRawatInap = PasienRawatInap::all();
        return view('kamar.create', compact('pasienRawatInap'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'no_tempat_tidur' => 'required|unique:kamar,no_tempat_tidur',
            'ruang' => 'required',
            'status' => 'required',
            'di_isi_oleh' => 'nullable',
            'harga_kamar' => 'required|numeric',
        ]);

        Kamar::create($validatedData);

        return redirect()->route('kamar.index')->with('success', 'Data kamar berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kamar = Kamar::findOrFail($id);
        $pasienRawatInap = PasienRawatInap::all();
        return view('kamar.edit', compact('kamar', 'pasienRawatInap'));
    }

    public function update(Request $request, $id)
    {
        $kamar = Kamar::findOrFail($id);

        $validatedData = $request->validate([
            'no_tempat_tidur' => 'required|unique:kamar,no_tempat_tidur,' . $kamar->id,
            'ruang' => 'required',
            'status' => 'required',
            'di_isi_oleh' => 'nullable',
            'harga_kamar' => 'required|numeric',
        ]);

        $kamar->update($validatedData);

        return redirect()->route('kamar.index')->with('success', 'Data kamar berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kamar = Kamar::findOrFail($id);
        $kamar->delete();

        return redirect()->route('kamar.index')->with('success', 'Data kamar berhasil dihapus.');
    }
    public function print()
    {
        $kamars = Kamar::all();
        $pdf = PDF::loadView('kamar.print', compact('kamars'));
        return $pdf->stream('laporan_kamar.pdf');
    }
}
