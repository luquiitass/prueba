<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFechasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fechas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('numero');
			$table->integer('cant_fechas');
			$table->timestamp('inicio')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('fin')->default('0000-00-00 00:00:00');
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
		Schema::drop('fechas');
	}

}
