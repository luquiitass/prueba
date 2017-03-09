<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTorneosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('torneos', function(Blueprint $table)
		{
			$table->foreign('campeon_id')->references('id')->on('equipos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('temporada_id')->references('id')->on('temporadas')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('torneos', function(Blueprint $table)
		{
			$table->dropForeign('torneos_campeon_id_foreign');
			$table->dropForeign('torneos_temporada_id_foreign');
		});
	}

}
