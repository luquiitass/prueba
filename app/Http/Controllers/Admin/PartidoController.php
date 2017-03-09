<?php

namespace App\Http\Controllers\Admin;

use App\Http\JSON_retorno;
use App\Partido;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class PartidoController extends Base
{
    public function edit(Partido $partido){
        $body = view('partido.comp_edit',compact('partido'))->render();
        $title = 'Modificar partido';
        $modal = view('modals.modal2',compact('body','title'))->render();
        return $modal;
    }

    public function editFechaHora(Partido $partido){
        $body = view('partido.comp_edit_fecha-hora',compact('partido'))->render();
        return view('modals.modal2',compact('body'))->render();
    }

    public function fechaHora(Request $request,Partido $partido){
        $input = $request->except('_token');
        $fecha_hora =new Carbon($input['date']);
        $fecha_hora->hour= $input['hour'];
        $fecha_hora->minute =$input['minute'];
        $fecha_hora->second = $input['second'];
        try {
            $partido->fecha_hora = $fecha_hora;
            $partido->update();
        }catch (\Exception $e){
            return JSON_retorno::create()->setMensaje($e->getMessage(),'danger','true')->getAllJSON();
        }
        \Session::flash('success','Fecha y hora modificado correctamente');
        return JSON_retorno::create()->setUrl(\URL::previous())->getAllJSON();

    }

    public function editEquipoLocal(Partido $partido){
        $body = view('partido.comp_edit_equipo-local',compact('partido'))->render();
        return view('modals.modal2',compact('body'))->render();
    }

    public function equipoLocal(Request $request,Partido $partido){
        $input = $request->except('_token');
        try {
            $partido->eq_local_id = $input['eq_local_id'];
            $partido->save();
        }catch (\Exception $e){
            return JSON_retorno::create()->setMensaje($e->getMessage(),'danger','true')->getAllJSON();
        }
        \Session::flash('success','Equipo local modificado correctamente');
        return JSON_retorno::create()->setUrl(\URL::previous())->getAllJSON();

    }
}
