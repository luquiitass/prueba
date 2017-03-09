<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemporadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temporadas', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nombre');

            $table->date('inicio');
            $table->date('fin');

            $table->integer('competencia_id');

            $table->foreign('competencia_id')->references('id')->on('competencias');

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
        Schema::drop('temporadas');
    }
}
