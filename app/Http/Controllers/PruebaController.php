<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Competencia;
use App\Equipo;
use App\Fecha;
use App\Funciones;
use App\Liga;
use App\Partido;
use App\Temporada;
use App\Torneo;
use Bican\Roles\Models\Role;
use Illuminate\Http\Request;

use App\Http\Requests;
use Mockery\Exception;

class PruebaController extends Controller
{
    //
    public function index(){

        $torneo = Torneo::find(27);

        $categoriasDeEquipos = $torneo->equipos->groupBy('categoria_id','nombre');


        $categorias = collect([4]);


        //dd($categoriasDeEquipos);

        foreach ($categoriasDeEquipos as $key => $value) {
            if ($categorias->contains($key)){
                echo 'posee categoria ',Categoria::find($key)->first()->nombre.'<br>';
            }else{
                echo 'falta categoria',$key.'<br>';

            }
        }



    }
}
