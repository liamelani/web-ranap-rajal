<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DiagnosaRawatJalanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Contoh data seeder
        DB::table('diagnosa_rawat_jalan')->insert([
            'no_diag_jalan' => Str::random(10), // Anda dapat mengganti ini dengan nilai sebenarnya
            'tgl_diagnosis' => now(),
            'no_rm_jalan' => 'RM002',
            'nama_pasien' => 'Jane Doe',
            'h_diagnosis' => 'Demam',
            'kd_obat' => 'OB002',
            'nama_obat' => 'Amoxicillin',
            'no_dokter' => 'D005',
            'nama_dokter' => 'Dr. Johnson',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tambahkan data lainnya sesuai kebutuhan
    }
}
