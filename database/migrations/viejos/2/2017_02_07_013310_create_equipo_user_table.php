<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEquipoUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('equipo_user', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id')->index('equipo_user_user_id_foreign');
			$table->integer('equipo_id')->index('equipo_user_equipo_id_foreign');
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
		Schema::drop('equipo_user');
	}

}
