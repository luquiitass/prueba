<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEstadiosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('estadios', function(Blueprint $table)
		{
			$table->foreign('direccion_id', 'direcciones_estadios_fk')->references('id')->on('direcciones')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('estadios', function(Blueprint $table)
		{
			$table->dropForeign('direcciones_estadios_fk');
		});
	}

}
