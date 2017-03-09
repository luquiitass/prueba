<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableContactoTelefono extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacto_telefono', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('telefono_id');
            $table->foreign('telefono_id')->references('id')->on('telefonos');

            $table->unsignedInteger('contacto_id');
            $table->foreign('contacto_id')->references('id')->on('contactos')->onDelete('cascade');

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
        Schema::drop('contacto_telefono');
    }
}
