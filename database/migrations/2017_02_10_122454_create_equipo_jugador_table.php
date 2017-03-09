<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEquipoJugadorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('equipo_jugador', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('jugador_id')->index('jugador_jugador_equipo_fk');
			$table->integer('equipo_id')->index('equipos_jugador_equipo_fk');
			$table->boolean('actual')->default(1);
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
		Schema::drop('equipo_jugador');
	}

}
