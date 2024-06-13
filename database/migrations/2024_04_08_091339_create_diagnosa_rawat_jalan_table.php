<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnosaRawatJalanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosa_rawat_jalan', function (Blueprint $table) {
            $table->id();
            $table->string('no_diag_jalan')->unique();
            $table->date('tgl_diagnosis');
            $table->string('no_rm_jalan');
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
        Schema::dropIfExists('diagnosa_rawat_jalan');
    }
}
