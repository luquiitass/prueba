<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEstadiosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('estadios', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->string('nombre')->unique();
			$table->string('alias');
			$table->integer('capasidad');
			$table->boolean('iluminado');
			$table->string('arquitectos');
			$table->string('dueos');
			$table->date('inauguracion');
			$table->timestamps();
			$table->integer('direccion_id')->index('direcciones_estadios_fk');
			$table->char('tipo', 8)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('estadios');
	}

}
