<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEquiposTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('equipos', function(Blueprint $table)
		{
			$table->foreign('contacto_id', 'contactos_equipos_fk')->references('id')->on('contactos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('equipos', function(Blueprint $table)
		{
			$table->dropForeign('contactos_equipos_fk');
		});
	}

}
