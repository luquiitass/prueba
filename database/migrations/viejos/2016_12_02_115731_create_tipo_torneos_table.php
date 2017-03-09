<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoTorneosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_torneo', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nombre');
            $table->text('descripcion')->nullable();

            $table->timestamps();
            $table->unique(['nombre']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tipos_torneo');
    }
}
