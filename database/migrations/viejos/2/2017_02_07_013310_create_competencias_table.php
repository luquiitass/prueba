<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompetenciasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('competencias', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nombre')->unique();
			$table->text('descripcion');
			$table->char('org_partidos', 18);
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
		Schema::drop('competencias');
	}

}
