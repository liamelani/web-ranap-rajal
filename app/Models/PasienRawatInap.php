<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasienRawatInap extends Model
{
    use HasFactory;

    // Nama tabel database yang akan digunakan oleh model
    protected $table = 'pasien_rawat_inap';

    // Daftar kolom yang dapat diisi secara massal (fillable)
    protected $fillable = [
        'No_RM_Inap', 'Nama_Pasien', 'Jenis_Kelamin', 'Alamat', 'Telepon', 'Umur', 'Tgl_Masuk'
    ];

    // Jika primary key bukan 'id', Anda dapat menentukannya di sini
    // protected $primaryKey = 'nama_primary_key';

    // Jika Anda tidak menggunakan timestamp, atur ke false
    public $timestamps = true;

    // Nama kolom timestamp yang dapat diatur
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    // Jika Anda memiliki kolom Tgl_Keluar dalam migrasi, Anda dapat menambahkannya di sini
    // protected $fillable = [..., 'Tgl_Keluar'];

    // Tambahan properti atau metode lainnya sesuai kebutuhan
}