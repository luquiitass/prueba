<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDireccionesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('direcciones', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('calle');
			$table->string('altura');
			$table->integer('piso')->nullable();
			$table->string('dpto')->nullable();
			$table->integer('pais_id')->index('direcciones_pais_id_foreign');
			$table->integer('provincia_id')->index('direcciones_provincia_id_foreign');
			$table->integer('localidad_id')->index('direcciones_localidad_id_foreign');
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
		Schema::drop('direcciones');
	}

}
