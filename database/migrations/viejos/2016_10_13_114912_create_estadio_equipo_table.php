<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadioEquipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipo_estadio', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('estadio_id')->unsigned()->index();
            $table->foreign('estadio_id')->references('id')->on('estadios')->onDelete('cascade');

            $table->integer('equipo_id')->unsigned()->index();
            $table->foreign('equipo_id')->references('id')->on('equipos')->onDelete('cascade');

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
        Schema::drop('equipo_estadio');
    }
}
