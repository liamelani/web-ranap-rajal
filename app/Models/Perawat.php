<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perawat extends Model
{
    use HasFactory;

    protected $table = 'perawat'; // Menentukan nama tabel yang terkait dengan model

    protected $fillable = [ // Menentukan kolom yang dapat diisi secara massal
        'kd_perawat',
        'nama',
        'alamat',
        'telepon',
    ];

    
}

