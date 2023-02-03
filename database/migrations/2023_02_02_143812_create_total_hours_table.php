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
        Schema::create('total_hours', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->integer('ore_ingresso_mattina');
            $table->integer('ore_uscita_mattina');
            $table->integer('ore_ingresso_pomeriggio');
            $table->integer('ore_uscita_pomeriggio');
            $table->integer('minuti_ingresso_mattina');
            $table->integer('minuti_uscita_mattina');
            $table->integer('minuti_ingresso_pomeriggio');
            $table->integer('minuti_uscita_pomeriggio');
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
        Schema::dropIfExists('total_hours');
    }
};
