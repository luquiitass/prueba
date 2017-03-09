<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTemporadaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('temporadas', function (Blueprint $table) {
            //
            //$table->string('nombre');

            //$table->date('inicio')->nullable();
            //$table->date('fin')->nullable();

            //$table->integer('competencia_id');

            //$table->foreign('competencia_id')->references('id')->on('competencias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('temporadas', function (Blueprint $table) {
            //
        });
    }
}
