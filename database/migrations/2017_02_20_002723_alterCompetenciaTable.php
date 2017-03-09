<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCompetenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('competencias', function (Blueprint $table) {
            //
            $table->string('estado');

            //$table->unsignedInteger('tipo_organizacion_competencia_id');

            //$table->foreign('tipo_organizacion_competencia_id')->references('id')->on('topos_organizacion_competencia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('competencias', function (Blueprint $table) {
            //
        });
    }
}
