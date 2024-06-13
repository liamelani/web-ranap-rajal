<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Isi data kamar contoh
        DB::table('kamar')->insert([
            'no_tempat_tidur' => 'A101',
            'ruang' => 'Ruang A',
            'status' => 'Tersedia',
            'di_isi_oleh' => 'John',
            'harga_kamar' => 150000.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        
        // Tambahkan data kamar lainnya sesuai kebutuhan
    }
}
