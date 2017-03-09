<?php

namespace App\Http\Controllers;

use Amranidev\Ajaxis\Ajaxis;
use App\Configuracion;
use App\Http\JSON_retorno;
use App\Http\Requests\ConfiguracionRequestStore;
use App\Http\Requests\ConfiguracionRequestUpdate;
use Request;


class ConfiguracionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $configuraciones = Configuracion::get();
        $configuraciones = $configuraciones->groupBy('tabla');
        //dd($configuraciones);
        return view('configuracion.index',compact('configuraciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = view('configuracion.comp_create')->render();
        return view('modals.modal2',['body'=>$view])->render();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConfiguracionRequestStore $request)
    {

        $input = Request::except('_token');
        $configuracion_true = new Configuracion($input);
        $configuracion_false = new Configuracion($input);

        $configuracion_true->estado = 1;

        $configuracion_false->estado = 0;

        $configuracion_true->save();
        $configuracion_false->save();

        return url('configuracion');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Configuracion $configuracion)
    {
        //
        $body = view('configuracion.comp_edit',compact('configuracion'))->render();
        return view('modals.modal2',compact('body'))->render();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ConfiguracionRequestUpdate $request, Configuracion $configuracion)
    {
        $input = Request::except('_token');
        $configuracion->nombre = $input['nombre'];
        $configuracion->descripcion = $input['descripcion'];
        $configuracion->tabla = $input['tabla'];
        $configuracion->save();
        return \URL::to('configuracion');
    }

    public function DeleteMsg(Configuracion $configuracion)
    {
        $msg = Ajaxis::BtDeleting('Cuidado!!','¿Esta seguro de eliminar éste Configuracion?','/configuracion/'. $configuracion->id . '/delete/');

        if(Request::ajax())
        {
            return $msg;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Configuracion $configuracion)
    {
        $json = new JSON_retorno();
        try{
            $id = $configuracion->id;
            $configuracion->delete();
            $json->setMensaje('Configuracion Eliminado','siccess');
            $json->setFadeOut('#tr_configuracion_'.$id);
        }catch (\Exception $e){
            $json->setMensaje($e->getMessage(),'danger','true');
        }
        return $json->getAllJSON();
    }
}
