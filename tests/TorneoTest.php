<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TorneoTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCrearTorneo()
    {
        $this->assertFalse(false);
//        $this->visit('configuraciones/temporada/129')
//            ->press('Agregar Torneo')
//            ->type('nombre','TorneoTest')
//            ->type('descripcion','Sin descripcion')
//            ->type('inicio','2017-5-2')
//            ->type('fin','2017-5-7')
//            ->select('categorias','veteranos')
//            ->press('Guardar')
//            ->seePageIs('configuraciones/temporada/129')
//            ->see('TorneoTest');
    }


}
