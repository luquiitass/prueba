<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePartidosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('partidos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('numero');
			$table->integer('eq_local')->nullable();
			$table->integer('equipo_vicitante')->nullable();
			$table->time('hora')->nullable();
			$table->date('fecha')->nullable();
			$table->integer('goles_local');
			$table->integer('goles_vicitante');
			$table->timestamps();
			$table->unique(['eq_local','equipo_vicitante','hora','fecha']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('partidos');
	}

}
