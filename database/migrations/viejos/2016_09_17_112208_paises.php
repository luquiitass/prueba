<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Paises
 *
 * @author  The scaffold-interface created at 2016-09-17 11:22:08am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Paises extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('paises',function (Blueprint $table){

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
        Schema::drop('paises');
    }
}
