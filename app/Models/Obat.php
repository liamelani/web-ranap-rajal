<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $table = 'obat'; // Menentukan nama tabel yang terkait dengan model

    protected $fillable = [ // Menentukan kolom yang dapat diisi secara massal
        'kode_obat',
        'nama_obat',
        'jenis_obat',
        'harga_obat', // Ubah 'harga' menjadi 'harga_obat'
        'stok',
    ];

    // Tambahan kode model lainnya...
}
