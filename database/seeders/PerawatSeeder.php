<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerawatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Masukkan satu data perawat ke dalam tabel menggunakan operasi database
        DB::table('perawat')->insert([
            'kd_perawat' => 'PER001', // Kode perawat manual
            'nama' => 'Nama Perawat 1',
            'alamat' => 'Alamat Perawat 1',
            'telepon' => '081234567890',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
