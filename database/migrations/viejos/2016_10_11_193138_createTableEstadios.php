<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEstadios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estadios', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nombre')->unique();
            $table->string('alias');
            $table->integer('capasidad');
            $table->boolean('iluminado');
            $table->string('arquitectos');
            $table->string('dueños');
            $table->date('inauguracion');

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
        Schema::drop('estadios');
    }
}
