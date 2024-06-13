<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanRawatInap extends Model
{
    use HasFactory;

    protected $table = 'laporan_rawat_inap';

    protected $fillable = [
        'No_Rawat',
        'No_RM_Inap',
        'Nama_Pasien',
        'Jenis_Kelamin',
        'Umur',
        'no_tempat_tidur',
        'Nama_Kamar',
        'kode_obat',
        'Nama_Obat',
        'Harga_Obat',
        'harga_kamar',
        'Biaya_Dokter',
        'Total_Biaya',
    ];
}
