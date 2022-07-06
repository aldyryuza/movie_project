<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie', function (Blueprint $table) {
            $table->id();
            $table->string('nama_film');
            $table->string('bahasa_film');
            $table->string('durasi_film');
            $table->string('tipe_film');
            $table->date('tanggal_rilis');
            $table->text('sinopsis');
            $table->date('tanggal_tayang');
            $table->date('tanggal_akhir');
            $table->string('gambar_film');
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
        Schema::dropIfExists('movie');
    }
};
