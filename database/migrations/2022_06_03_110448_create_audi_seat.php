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
        Schema::create('audi_seat', function (Blueprint $table) {
            $table->id();
            $table->integer('kursi');
            // $table->enum('tipe', [1, 0]);
            $table->foreignId('id_audi')->constrained('audi');
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
        Schema::dropIfExists('audi_seat');
    }
};
