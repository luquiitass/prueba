<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaseeTeble extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fases', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nombre');
            $table->string('descripcion');
            $table->text('comentario')->nullable();
            $table->string('estado');


            $table->unsignedInteger('torneo_id');
            $table->foreign('torneo_id')->references('id')->on('torneos');

            $table->unsignedInteger('fase_id')->unique()->nullable();
            $table->foreign('fase_id')->references('id')->on('fases');

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
        Schema::drop('fases');
    }
}
