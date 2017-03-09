    <?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTorneoEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipo_torneo', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('torneo_id')->unsigned();
            $table->foreign('torneo_id')->references('id')->on('torneos')->onDelete('cascade');

            $table->integer('equipo_id');
            $table->foreign('equipo_id')->references('id')->on('equipos')->onDelete('cascade');

            $table->boolean('actual')->default('1');


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
        Schema::drop('equipo_torneo');
    }
}
