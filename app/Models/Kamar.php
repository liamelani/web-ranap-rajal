<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $table = 'kamar';

    protected $fillable = [
        'no_tempat_tidur',
        'ruang',
        'status',
        'di_isi_oleh',
        'harga_kamar',
    ];
}

