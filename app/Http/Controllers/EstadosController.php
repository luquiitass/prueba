<?php

namespace App\Http\Controllers;

use Amranidev\Ajaxis\Ajaxis;
use App\Estado;
use App\Http\JSON_retorno;
use App\Http\Requests\EstadioRequestUpdate;
use App\Http\Requests\EstadoRequestStore;
use App\Http\Requests\EstadoRequestUpdate;
use Request;

class EstadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados = Estado::get();
        $estados = $estados->groupBy('tabla');
        //dd($estados);
        return view('estado.index',compact('estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = view('estado.comp_create')->render();
        return view('modals.modal2',['body'=>$view])->render();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstadoRequestStore $request)
    {

        $input = Request::except('_token');
        $estado = new Estado($input);
        $estado->save();

        return url('estado');
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
    public function edit(Estado $estado)
    {
        //
        $body = view('estado.comp_edit',compact('estado'))->render();
        return view('modals.modal2',compact('body'))->render();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EstadoRequestUpdate $request, Estado $estado)
    {
        $input = Request::except('_token');
        $estado->nombre = $input['nombre'];
        $estado->descripcion = $input['descripcion'];
        $estado->tabla = $input['tabla'];
        $estado->save();
        return \URL::to('estado');
    }

    public function DeleteMsg(Estado $estado)
    {
        $msg = Ajaxis::BtDeleting('Cuidado!!','¿Esta seguro de eliminar éste Estado?','/estado/'. $estado->id . '/delete/');

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
    public function destroy(Estado $estado)
    {
        $json = new JSON_retorno();
        try{
            $id = $estado->id;
            $estado->delete();
            $json->setMensaje('Estado Eliminado','siccess');
            $json->setFadeOut('#tr_estado_'.$id);
        }catch (\Exception $e){
            $json->setMensaje($e->getMessage(),'danger','true');
        }
        return $json->getAllJSON();
    }
}
