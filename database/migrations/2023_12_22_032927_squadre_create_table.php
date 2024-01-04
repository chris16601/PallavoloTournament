<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('squadre', function (Blueprint $table) {
            $table->id('id_squadra');
            $table->integer('id_girone')->references('id_girone')->on('gironi')->nullable();
            $table->string('nome');
            $table->string('citta');
            $table->integer('punteggio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
