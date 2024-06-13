<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email')->unique(); // Menambahkan batasan panjang dan keunikan
            $table->string('password');
            $table->enum('level', ['admin', 'petugas_pendaftaran', 'dokter', 'apotek', 'perawat'])->default('petugas_pendaftaran'); // Menambahkan opsi 'dokter' dan memperbarui panjang kolom
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
        Schema::dropIfExists('users');
    }
}
