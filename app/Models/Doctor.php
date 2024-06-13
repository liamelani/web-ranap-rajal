<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $table = 'doctors';
    protected $fillable = [
        'no_dokter',
        'nama',
        'spesialisasi',
        'diterima',
        'no_hp',
        'alamat',
    ];
}

