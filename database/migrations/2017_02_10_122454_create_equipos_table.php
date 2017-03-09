<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEquiposTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('equipos', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nombre');
			$table->string('alias')->nullable();
			$table->date('fundado')->nullable();
			$table->string('fundadores')->nullable();
			$table->text('descripcion')->nullable();
			$table->timestamps();
			$table->integer('contacto_id')->nullable()->index('contactos_equipos_fk');
			$table->integer('categoria_id')->unsigned()->index('equipos_categoria_id_foreign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('equipos');
	}

}
