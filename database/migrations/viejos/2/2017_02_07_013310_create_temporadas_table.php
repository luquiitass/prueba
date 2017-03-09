<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTemporadasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('temporadas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('inicio');
			$table->date('fin');
			$table->timestamps();
			$table->string('nombre');
			$table->integer('competencia_id')->index('temporadas_competencia_id_foreign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('temporadas');
	}

}
