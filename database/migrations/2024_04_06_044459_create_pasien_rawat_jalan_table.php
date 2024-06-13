<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasienRawatJalanTable extends Migration
{
    public function up()
    {
        Schema::create('pasien_rawat_jalan', function (Blueprint $table) {
            $table->id(); // Kolom id dengan auto-increment
            $table->string('No_RM_Jalan')->unique(); // Menggunakan No_RM_Jalan sebagai kolom unik
            $table->string('Nama_Pasien');
            $table->enum('Jenis_Kelamin', ['Laki-laki', 'Perempuan']);
            $table->text('Alamat');
            $table->string('Telepon');
            $table->integer('Umur');
            $table->date('Tgl_Masuk'); // Mengganti nama kolom menjadi 'Tgl_Masuk'
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pasien_rawat_jalan');
    }
}
