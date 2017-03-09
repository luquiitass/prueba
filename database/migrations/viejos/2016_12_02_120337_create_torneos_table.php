<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTorneosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('torneos', function (Blueprint $table) {

            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->string('nombre')->nullable();
            $table->text('desscripcion')->nullable();
            $table->integer('campeon')->nullable();

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
        Schema::drop('torneos');
    }
}
