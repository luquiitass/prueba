<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCategoriaTorneoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('categoria_torneo', function(Blueprint $table)
		{
			$table->foreign('torneo_id')->references('id')->on('torneos')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('categoria_id')->references('id')->on('categorias')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('categoria_torneo', function(Blueprint $table)
		{
			$table->dropForeign('categoria_torneo_torneo_id_foreign');
			$table->dropForeign('categoria_torneo_categoria_id_foreign');
		});
	}

}
