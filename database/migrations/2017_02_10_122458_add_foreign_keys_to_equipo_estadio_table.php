<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEquipoEstadioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('equipo_estadio', function(Blueprint $table)
		{
			$table->foreign('equipo_id')->references('id')->on('equipos')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('estadio_id')->references('id')->on('estadios')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('equipo_estadio', function(Blueprint $table)
		{
			$table->dropForeign('equipo_estadio_equipo_id_foreign');
			$table->dropForeign('equipo_estadio_estadio_id_foreign');
		});
	}

}
