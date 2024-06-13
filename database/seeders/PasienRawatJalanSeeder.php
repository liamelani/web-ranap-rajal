<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\PasienRawatJalan;

class PasienRawatJalanSeeder extends Seeder
{
    public function run()
    {
        DB::table('pasien_rawat_jalan')->insert([
            'No_RM_Jalan' => 'RJ001',
            'Nama_Pasien' => 'Jane Doe',
            'Jenis_Kelamin' => 'Perempuan',
            'Alamat' => 'Jl. Contoh No. 456',
            'Telepon' => '081234567891',
            'Umur' => 25,
            'Tgl_Masuk' => '2022-01-15',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tambahkan data lain jika diperlukan
    }
}

