<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEquipoTorneoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('equipo_torneo', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('torneo_id')->unsigned()->index('equipo_torneo_torneo_id_foreign');
			$table->integer('equipo_id')->index('equipo_torneo_equipo_id_foreign');
			$table->boolean('actual')->default(1);
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
		Schema::drop('equipo_torneo');
	}

}
