<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEquipoUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('equipo_user', function(Blueprint $table)
		{
			$table->foreign('equipo_id')->references('id')->on('equipos')->onUpdate('NO ACTION')->onDelete('CASCADE');
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
		Schema::table('equipo_user', function(Blueprint $table)
		{
			$table->dropForeign('equipo_user_equipo_id_foreign');
			$table->dropForeign('equipo_user_user_id_foreign');
		});
	}

}
