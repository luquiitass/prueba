<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeingKeyToFechasOfGrupo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fechas', function (Blueprint $table) {
            //

//            $table->integer('equipo_libre_id')->nullable();
//            $table->foreign('equipo_libre_id')->references('id')->on('equipos');
//
//            $table->unsignedInteger('fecha_id')->nullable();
//            $table->foreign('fecha_id')->references('id')->on('fechas');
//
//            $table->unsignedInteger('grupo_id');
//            $table->foreign('grupo_id')->references('id')->on('grupos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fechas', function (Blueprint $table) {
            //
        });
    }
}
