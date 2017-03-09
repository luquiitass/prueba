<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeingKeyToTorneoTableOfTipoTorneo extends Migration
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
            //$table->unsignedInteger('tipo_torneo_id')->nullable();
            //$table->foreign('tipo_torneo_id')->references('id')->on('tipos_torneo');
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
