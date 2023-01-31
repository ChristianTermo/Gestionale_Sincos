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
        Schema::create('timesheets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_utente')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('malattia');
            $table->year('anno');
            $table->integer('mese');
            $table->integer('giorno');
            $table->time('orario_ingresso_mattina');
            $table->time('orario_uscita_mattina');
            $table->time('orario_ingresso_pomeriggio');
            $table->time('orario_uscita_pomeriggio');
            $table->integer('straordinario')->nullable();
            $table->time('permesso_da')->nullable();;
            $table->time('permesso_a')->nullable();
            $table->date('ferie_da')->nullable();
            $table->date('ferie_a')->nullable();
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
        Schema::dropIfExists('timesheets');
    }
};
