<?php

namespace App\Http\Controllers;

use App\Competencia;
use App\Fecha;
use App\Liga;
use App\Temporada;
use App\Torneo;
use \Request;

class LigaController extends Controller
{
    //

    public function create(Temporada $temporada){
        $body = view('admin.liga.comp_create',compact('temporada'))->render();
        return view('modals.modal2',compact('body'))->render();
    }



    public function portada(Competencia $competencia)
    {
        return view('liga.portada.index',compact('competencia'));
    }

    public function equipos(Liga $torneo){
        //$torneo = $torneo->cast();
        $competencia=$torneo->temporada->competencia;
        return view('torneo.admin.liga.torneo_equipos',compact('torneo','competencia'));
    }

    public function fechas( Liga $torneo){
        $competencia =$torneo->temporada->competencia;
        return view('torneo.admin.liga.torneo_fechas',compact('torneo','competencia'));
    }

    public function resultados( Liga $torneo,Fecha $fecha){
        $competencia =$torneo->temporada->competencia;
        return view('torneo.admin.liga.torneo_resultados',compact('torneo','competencia'));
    }

    public function calendario( Liga $torneo,Fecha $fecha){
        $competencia =$torneo->temporada->competencia;
        return view('torneo.admin.liga.torneo_calendario',compact('torneo','competencia'));
    }


    public function conf_index(Competencia $competencia){
        $id_temporada = Request::get('temporada');
        $id_torneo = Request::get('torneo');
        if (empty($id_temporada) && !empty($competencia->temporadas)){
            $temporada = $competencia->temporadas->first();
            if (!empty($temporada)){
                $id_temporada = $temporada->id;
            }
        }else{
            $temporada = Temporada::find($id_temporada)->first();
        }

        if (empty($id_torneo)){
            if (!empty($temporada) && !empty($temporada->torneos) && ($temporada->torneos->count() > 0)){
                $id_torneo = $temporada->torneos->first()->id;
            }
        }

        return view('liga.configuracion.index',compact('competencia','id_temporada','id_torneo'));
    }

    public function conf_competencia(Competencia $competencia){
        return view('liga.configuracion.competencia',compact('competencia'));
    }

    public function conf_temporada(Temporada $temporada){
        $competencia = $temporada->competencia;
        return view('liga.configuracion.temporada',compact('competencia','temporada'));
    }

    public function conf_torneo(Liga $torneo){
        $competencia = $torneo->temporada->competencia;
        return view('liga.configuracion.torneo',compact('competencia','torneo'));
    }


    /*--------------Funcioes de Torneo--------------------*/

    public function conf_torneoEquipos(Liga $torneo){
        $competencia = $torneo->temporada->competencia;
        return view('liga.configuracion.torneo.equipos',compact('torneo','competencia'));
    }

}
