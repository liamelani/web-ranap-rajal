<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Isi data contoh obat
        DB::table('obat')->insert([
            'kode_obat' => 'OB001',
            'nama_obat' => 'Paracetamol',
            'jenis_obat' => 'Tablet',
            'harga_obat' => 5000.00,
            'stok' => 100,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tambahkan data obat lainnya sesuai kebutuhan
    }
}
