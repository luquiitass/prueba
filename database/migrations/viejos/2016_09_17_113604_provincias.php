<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Provincias
 *
 * @author  The scaffold-interface created at 2016-09-17 11:36:04am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Provincias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('provincias',function (Blueprint $table){

            $table->increments('id');
        
            $table->String('nombre');

            $table->integer('pais_id')->unsigned();

            $table->foreign('pais_id')->references('id')->on('paises');
        
        /**
         * Foreignkeys section
         */
        
        // type your addition here

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('provincias');
    }
}
