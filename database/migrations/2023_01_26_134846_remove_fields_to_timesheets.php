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
        Schema::table('timesheets', function (Blueprint $table) {
            $table->dropColumn('permesso_da')->nullable();;
            $table->dropColumn('permesso_a')->nullable();
            $table->dropColumn('ferie_da')->nullable();
            $table->dropColumn('ferie_a')->nullable();
            $table->dropColumn('malattia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('timesheets', function (Blueprint $table) {
            $table->time('permesso_da')->nullable();;
            $table->time('permesso_a')->nullable();
            $table->date('ferie_da')->nullable();
            $table->date('ferie_a')->nullable();
            $table->boolean('malattia');
        });
    }
};
