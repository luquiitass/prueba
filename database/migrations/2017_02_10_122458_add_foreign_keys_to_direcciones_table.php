<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDireccionesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('direcciones', function(Blueprint $table)
		{
			$table->foreign('localidad_id')->references('id')->on('localidades')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('pais_id')->references('id')->on('paises')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('provincia_id')->references('id')->on('provincias')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('direcciones', function(Blueprint $table)
		{
			$table->dropForeign('direcciones_localidad_id_foreign');
			$table->dropForeign('direcciones_pais_id_foreign');
			$table->dropForeign('direcciones_provincia_id_foreign');
		});
	}

}
