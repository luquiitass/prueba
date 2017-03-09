<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Localidades
 *
 * @author  The scaffold-interface created at 2016-09-21 07:55:19pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Localidades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('localidades',function (Blueprint $table){

        $table->increments('id');
        
        $table->String('nombre');
        
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
        Schema::drop('localidades');
    }
}
