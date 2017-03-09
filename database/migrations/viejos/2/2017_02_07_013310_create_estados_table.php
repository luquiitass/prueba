<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEstadosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('estados', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre');
			$table->text('descripcion')->nullable();
			$table->string('tabla');
			$table->timestamps();
			$table->unique(['nombre','tabla']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('estados');
	}

}
