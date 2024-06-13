<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaporanRawatJalanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Isi data contoh laporan rawat jalan
        DB::table('laporan_rawat_jalan')->insert([
            'No_Rawat' => 'RAWAT001',
            'No_RM_Jalan' => 'RM001',
            'Nama_Pasien' => 'Pasien 1',
            'Jenis_Kelamin' => 'Laki-laki',
            'Umur' => 30,
            'kode_obat' => 'OB001',
            'Nama_Obat' => 'Obat 1',
            'Harga_Obat' => 20000.00,
            'Biaya_Dokter' => 500000.00,
            'Total_Biaya' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tambahkan entri data lainnya sesuai kebutuhan
    }
}
