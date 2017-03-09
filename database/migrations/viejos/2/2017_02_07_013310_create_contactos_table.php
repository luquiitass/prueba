<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contactos', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('email1', 45);
			$table->string('email2', 40)->nullable();
			$table->string('telefono1', 20);
			$table->string('telefono2', 20)->nullable();
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
		Schema::drop('contactos');
	}

}
