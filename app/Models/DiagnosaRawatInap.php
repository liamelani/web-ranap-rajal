<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiagnosaRawatInap extends Model
{
    use HasFactory;

    protected $table = 'diagnosa_rawat_inap'; // Sesuaikan dengan nama tabel yang sesuai

    protected $fillable = [
        'no_diag_inap',
        'tgl_diagnosis',
        'no_rm_inap',
        'nama_pasien',
        'h_diagnosis',
        'kd_obat',
        'nama_obat',
        'no_dokter',
        'nama_dokter',
    ];

    // Jika Anda membutuhkan metode atau relasi tambahan, tambahkan di sini

}
