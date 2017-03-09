<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProvinciasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('provincias', function(Blueprint $table)
		{
			$table->foreign('pais_id')->references('id')->on('paises')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('provincias', function(Blueprint $table)
		{
			$table->dropForeign('provincias_pais_id_foreign');
		});
	}

}
