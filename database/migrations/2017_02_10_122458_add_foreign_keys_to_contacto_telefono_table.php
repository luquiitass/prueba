<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToContactoTelefonoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contacto_telefono', function(Blueprint $table)
		{
			$table->foreign('telefono_id')->references('id')->on('telefonos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('contacto_telefono', function(Blueprint $table)
		{
			$table->dropForeign('contacto_telefono_telefono_id_foreign');
		});
	}

}
