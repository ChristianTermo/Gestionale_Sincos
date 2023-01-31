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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('matricola');
            $table->string('ruolo');
            $table->string('nome');
            $table->string('cognome');
            $table->string('luogo_nascita');
            $table->date('data_nascita');
            $table->string('incarico');
            $table->string('indirizzo');
            $table->integer('cap');
            $table->string('città');
            $table->string('provincia');
            $table->string('nazionalità');
            $table->string('codice_fiscale')->unique();
            $table->string('telefono')->unique();
            $table->string('email_personale')->unique();
            $table->string('email_aziendale')->unique();
            $table->string('banca');
            $table->string('iban')->unique();
            $table->integer('ore_contratto');
            $table->integer('giorni_ferie_anno');
            $table->integer('ore_permesso_annuali');
            $table->string('password');
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
};
