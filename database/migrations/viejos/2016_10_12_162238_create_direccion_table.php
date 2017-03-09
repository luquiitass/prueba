<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDireccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->increments('id');

            $table->string('calle');
            $table->string('altura');
            $table->integer('piso')->nullable();
            $table->string('dpto')->nullable();

            $table->unsignedInteger('estadio_id');
            $table->foreign('estadio_id')->references('id')->on('estadios')->onDelete('cascade');

            $table->unsignedInteger('pais_id')->nullable();
            $table->foreign('pais_id')->references('id')->on('paises');

            $table->unsignedInteger('provincia_id')->nullable();
            $table->foreign('provincia_id')->references('id')->on('provincias');

            $table->unsignedInteger('localidad_id')->nullable();
            $table->foreign('localidad_id')->references('id')->on('localidades');

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
        Schema::drop('direcciones');
    }
}
