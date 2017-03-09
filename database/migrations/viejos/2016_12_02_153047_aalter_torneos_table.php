<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AalterTorneosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('torneos', function (Blueprint $table) {
//

         /*   $table->integer('campeon_id');
            $table->integer('competencia_id');
            $table->integer('temporada_id');

            $table->foreign('campeon_id')->references('id')->on('equipos');
            $table->foreign('competencia_id')->references('id')->on('competencias');
            $table->foreign('temporada_id')->references('id')->on('temporadas');
*/


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('torneos', function (Blueprint $table) {
            //
        });
    }
}
