<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartidossTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partidos', function (Blueprint $table) {
            $table->increments('id');

            $table->date('fecha')->nullable();
            $table->time('hora')->nullable();

            $table->integer('eq1_id')->nullable();
            $table->integer('eq2_id')->nullable();
            $table->integer('eq_local_id')->nullable();

            $table->integer('gol_eq1')->nullable();
            $table->integer('gol_eq2')->nullable();

            $table->unsignedInteger('fecha_id');
            $table->integer('estadio_id')->nullable();

            $table->string('estado');

            $table->text('comentario')->nullable();


            $table->foreign('eq1_id')->references('id')->on('equipos');
            $table->foreign('eq2_id')->references('id')->on('equipos');

            $table->foreign('eq_local_id')->references('id')->on('equipos');

            $table->foreign('fecha_id')->references('id')->on('fechas');
            $table->foreign('estadio_id')->references('id')->on('estadios');

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
        Schema::drop('partidos');
    }
}
