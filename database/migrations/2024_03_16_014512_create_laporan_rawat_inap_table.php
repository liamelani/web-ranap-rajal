<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanRawatInapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_rawat_inap', function (Blueprint $table) {
            $table->id();
            $table->string('No_Rawat')->unique(); // Mengatur kolom No_Rawat menjadi unik
            $table->string('No_RM_Inap'); 
            $table->string('Nama_Pasien');
            $table->enum('Jenis_Kelamin', ['Laki-laki', 'Perempuan']);
            $table->unsignedTinyInteger('Umur'); // Menggunakan unsignedTinyInteger untuk umur
            $table->string('no_tempat_tidur');
            $table->string('Nama_Kamar'); // Kolom untuk nama kamar
            $table->string('kode_obat');
            $table->string('Nama_Obat');
            $table->decimal('Harga_Obat', 10, 2); // Decimal dengan 10 digit, 2 digit di belakang koma
            $table->decimal('harga_kamar', 10, 2); // Kolom untuk biaya kamar
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
        Schema::dropIfExists('laporan_rawat_inap');
    }
}
