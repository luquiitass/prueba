<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToJugadoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('jugadores', function(Blueprint $table)
		{
			$table->foreign('posicion_id', 'posiciones_jugador_fk')->references('id')->on('posiciones')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('user_id', 'user_jugador_fk')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('jugadores', function(Blueprint $table)
		{
			$table->dropForeign('posiciones_jugador_fk');
			$table->dropForeign('user_jugador_fk');
		});
	}

}
