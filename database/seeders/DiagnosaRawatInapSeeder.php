<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DiagnosaRawatInapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Contoh data seeder
        DB::table('diagnosa_rawat_inap')->insert([
            'no_diag_inap' => Str::random(10), // Anda dapat mengganti ini dengan nilai sebenarnya
            'tgl_diagnosis' => now(),
            'no_rm_inap' => 'RM001',
            'nama_pasien' => 'John Doe',
            'h_diagnosis' => 'Flu',
            'kd_obat' => 'OB001',
            'nama_obat' => 'Paracetamol',
            'no_dokter' => 'D004',
            'nama_dokter' => 'Dr. Smith',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tambahkan data lainnya sesuai kebutuhan
    }
}
