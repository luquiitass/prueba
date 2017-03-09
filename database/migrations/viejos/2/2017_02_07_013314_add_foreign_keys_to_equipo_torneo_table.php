<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEquipoTorneoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('equipo_torneo', function(Blueprint $table)
		{
			$table->foreign('equipo_id')->references('id')->on('equipos')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('torneo_id')->references('id')->on('torneos')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('equipo_torneo', function(Blueprint $table)
		{
			$table->dropForeign('equipo_torneo_equipo_id_foreign');
			$table->dropForeign('equipo_torneo_torneo_id_foreign');
		});
	}

}
