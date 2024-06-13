<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientsTableSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patients')->insert([
            'name' => 'John Doe',
            'gender' => 'Male',
            'dob' => '1990-01-01',
            'address' => '123 Main Street',
        ]);

        //
    }
}
