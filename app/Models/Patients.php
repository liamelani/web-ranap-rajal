<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    use HasFactory;
    protected $table = 'patients'; // Specify the table name

    protected $fillable = ['name', 'gender', 'dob', 'address']; // Define mass assignable fields
    protected $dates = ['dob']; 

    // Other model code...

}
