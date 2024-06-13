<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanRawatJalan extends Model
{
    use HasFactory;

    protected $table = 'laporan_rawat_jalan';

    protected $fillable = [
        'No_Rawat',
        'No_RM_Jalan', // Mengubah No_RM menjadi No_RM_Jalan
        'Nama_Pasien',
        'Jenis_Kelamin',
        'Umur',
        'kode_obat',
        'Nama_Obat',
        'Harga_Obat',
        'Biaya_Dokter',
        'Total_Biaya',
    ];
}
