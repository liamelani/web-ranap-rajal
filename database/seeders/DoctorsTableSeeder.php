<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Isi data contoh
        DB::table('doctors')->insert([
            'no_dokter' => 'D001',
            'nama' => 'Dr. Agus',
            'spesialisasi' => 'Bedah Umum',
            'diterima' => '2022-03-12',
            'no_hp' => '08123456789',
            'alamat' => 'Jl. Pahlawan No. 123, Kota Contoh',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tambahkan data dokter lainnya sesuai kebutuhan
    }
}
