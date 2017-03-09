<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CompetenciaTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
   public function testCrearCompetencia(){
       $this->visit('competencia')
           ->see('Nueva Competencia')
           ->click('Nueva Competencia')
           ->seePageIs('competencia/create')
           ->type('Competencia Test','nombre')
           ->type('una descripcio bastante larga por que esta validada para q sea mayor a 10 caracteres','descripcion')
           //->type('lucas','administradores')
           //->select('administradores','(Liquiitass@gmail.com)     Lucas Larrea)')
           ->select('admin_equipo','org_partidos')
           ->press('Guardar')
           ->seePageIs('competencia/');
           //->see('Competencia Test');
   }
}
