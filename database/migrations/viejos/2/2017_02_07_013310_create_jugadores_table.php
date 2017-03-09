<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJugadoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jugadores', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nombre', 100);
			$table->string('apellido', 50);
			$table->string('alias')->nullable();
			$table->decimal('altura', 10, 0)->nullable();
			$table->decimal('peso', 10, 0)->nullable();
			$table->integer('numero');
			$table->integer('posicion_id')->index('posiciones_jugador_fk');
			$table->date('fecha_nacimiento')->nullable();
			$table->integer('user_id')->nullable()->index('user_id');
			$table->string('foto_perfil')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('jugadores');
	}

}
