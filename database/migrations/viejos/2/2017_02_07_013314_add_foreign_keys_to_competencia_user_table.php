<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCompetenciaUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('competencia_user', function(Blueprint $table)
		{
			$table->foreign('competencia_id')->references('id')->on('competencias')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('user_id')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('competencia_user', function(Blueprint $table)
		{
			$table->dropForeign('competencia_user_competencia_id_foreign');
			$table->dropForeign('competencia_user_user_id_foreign');
		});
	}

}
