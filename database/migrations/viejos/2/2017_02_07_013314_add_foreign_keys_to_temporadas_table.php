<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTemporadasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('temporadas', function(Blueprint $table)
		{
			$table->foreign('competencia_id')->references('id')->on('competencias')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('temporadas', function(Blueprint $table)
		{
			$table->dropForeign('temporadas_competencia_id_foreign');
		});
	}

}
