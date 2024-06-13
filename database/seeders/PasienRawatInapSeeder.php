<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PasienRawatInapSeeder extends Seeder
{
    public function run()
    {
        DB::table('pasien_rawat_inap')->insert([
            'No_RM_Inap' => 'RM001',
            'Nama_Pasien' => 'John Doe',
            'Jenis_Kelamin' => 'Laki-laki',
            'Alamat' => 'Jl. Contoh No. 123',
            'Telepon' => '081234567890',
            'Umur' => 30,
            'Tgl_Masuk' => '2022-01-01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tambahkan data lain jika diperlukan
    }
}
