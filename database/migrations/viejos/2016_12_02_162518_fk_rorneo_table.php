<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FkRorneoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('torneos', function (Blueprint $table) {
            //
//            $table->unsignedInteger('campeon_id');
//            $table->unsignedInteger('competencia_id');
//            $table->unsignedInteger('temporada_id');
//
//            $table->foreign('campeon_id')->references('id')->on('equipos');
//            $table->foreign('competencia_id')->references('id')->on('competencias');
//            $table->foreign('temporada_id')->references('id')->on('temporadas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('torneos', function (Blueprint $table) {
            //
        });
    }
}
