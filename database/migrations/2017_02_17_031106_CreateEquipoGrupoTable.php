<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipoGrupoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipo_grupo', function (Blueprint $table) {

            $table->increments('id');

            $table->unsignedInteger('grupo_id');
            $table->integer('equipo_id');

            $table->boolean('activo')->default(1);

            $table->foreign('grupo_id')->references('id')->on('grupos')->onDelete('CASCADE');
            $table->foreign('equipo_id')->references('id')->on('equipos')->onDelete('CASCADE');

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
        Schema::drop('equipo_grupo');
    }
}
