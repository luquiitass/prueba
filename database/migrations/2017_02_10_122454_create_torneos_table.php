<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTorneosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('torneos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre')->nullable();
			$table->text('descripcion')->nullable();
			$table->timestamps();
			$table->integer('campeon_id')->nullable()->index('torneos_campeon_id_foreign');
			$table->integer('temporada_id')->unsigned()->index('torneos_temporada_id_foreign');
			$table->date('inicio');
			$table->date('fin');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('torneos');
	}

}
