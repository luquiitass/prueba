<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConfiguracionesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('configuraciones', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre');
			$table->string('tabla');
			$table->boolean('estado');
			$table->timestamps();
			$table->unique(['nombre','tabla','estado']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('configuraciones');
	}

}
