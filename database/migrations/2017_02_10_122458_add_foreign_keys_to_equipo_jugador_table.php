<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEquipoJugadorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('equipo_jugador', function(Blueprint $table)
		{
			$table->foreign('equipo_id', 'equipos_jugador_equipo_fk')->references('id')->on('equipos')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('jugador_id', 'jugador_jugador_equipo_fk')->references('id')->on('jugadores')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('equipo_jugador', function(Blueprint $table)
		{
			$table->dropForeign('equipos_jugador_equipo_fk');
			$table->dropForeign('jugador_jugador_equipo_fk');
		});
	}

}
