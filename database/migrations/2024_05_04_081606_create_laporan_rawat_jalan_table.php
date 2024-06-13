<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanRawatJalanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_rawat_jalan', function (Blueprint $table) {
            $table->id();
            $table->string('No_Rawat')->unique(); // Mengatur kolom No_Rawat menjadi unik
            $table->string('No_RM_Jalan'); 
            $table->string('Nama_Pasien');
            $table->enum('Jenis_Kelamin', ['Laki-laki', 'Perempuan']);
            $table->unsignedTinyInteger('Umur'); // Menggunakan unsignedTinyInteger untuk umur
            $table->string('kode_obat');
            $table->string('Nama_Obat');
            $table->decimal('Harga_Obat', 10, 2); // Decimal dengan 10 digit, 2 digit di belakang koma
            $table->decimal('Biaya_Dokter', 10, 2);
            $table->decimal('Total_Biaya', 10, 2);
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
        Schema::dropIfExists('laporan_rawat_jalan');
    }
}
