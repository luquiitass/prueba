<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactoTelefonoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contacto_telefono', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('telefono_id')->unsigned()->index('contacto_telefono_telefono_id_foreign');
			$table->integer('contacto_id')->unsigned();
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
		Schema::drop('contacto_telefono');
	}

}
