<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use PDF;

class ObatController extends Controller
{
    // Menampilkan semua data obat
    public function index()
    {
        $obats = Obat::all();
        return view('obat.index', compact('obats'));
    }

    // Menampilkan form untuk menambahkan obat baru
    public function create()
    {
        return view('obat.create');
    }

    // Menyimpan data obat baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_obat' => 'required|unique:obat,kode_obat',
            'nama_obat' => 'required',
            'jenis_obat' => 'required',
            'harga_obat' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);

        Obat::create($validatedData);

        return redirect()->route('obat.index')->with('success', 'Data obat berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit data obat
    public function edit($id)
    {
        $obat = Obat::findOrFail($id);
        return view('obat.edit', compact('obat'));
    }

    // Memperbarui data obat yang ada
    public function update(Request $request, $id)
    {
        $obat = Obat::findOrFail($id);

        $validatedData = $request->validate([
            'kode_obat' => 'required|unique:obat,kode_obat,'.$obat->id,
            'nama_obat' => 'required',
            'jenis_obat' => 'required',
            'harga_obat' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);

        $obat->update($validatedData);

        return redirect()->route('obat.index')->with('success', 'Data obat berhasil diperbarui.');
    }

    // Menghapus data obat
    public function destroy($id)
    {
        $obat = Obat::findOrFail($id);
        $obat->delete();

        return redirect()->route('obat.index')->with('success', 'Data obat berhasil dihapus.');
    }

    // Mencetak data obat
    public function print()
    {
        $obats = Obat::all();
        $pdf = PDF::loadView('obat.print', compact('obats'));
        return $pdf->stream('obat.pdf');
    }
}
