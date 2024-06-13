<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnosaRawatInapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosa_rawat_inap', function (Blueprint $table) {
            $table->id(); // Kolom id sebagai primary key
            $table->string('no_diag_inap')->unique(); // Membuat no_diag_inap menjadi unik
            $table->date('tgl_diagnosis');
            $table->string('no_rm_inap');
            $table->string('nama_pasien');
            $table->text('h_diagnosis');
            $table->string('kd_obat');
            $table->string('nama_obat');
            $table->string('no_dokter');
            $table->string('nama_dokter');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diagnosa_rawat_inap');
    }
}
