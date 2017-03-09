<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriaTorneoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categoria_torneo', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('categoria_id')->unsigned()->index('categoria_torneo_categoria_id_foreign');
			$table->integer('torneo_id')->unsigned()->index('categoria_torneo_torneo_id_foreign');
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
		Schema::drop('categoria_torneo');
	}

}
