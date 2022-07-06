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
        Schema::create('show_seat', function (Blueprint $table) {
            $table->id();
            $table->enum('status', [1, 0]);
            $table->foreignId('id_seat_audi')->constrained('audi_seat');
            $table->foreignId('id_show')->constrained('show');

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
        Schema::dropIfExists('show_seat');
    }
};
