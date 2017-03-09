<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompetenciaUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('competencia_user', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id')->index('competencia_user_user_id_foreign');
			$table->integer('competencia_id')->index('competencia_user_competencia_id_foreign');
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
		Schema::drop('competencia_user');
	}

}
