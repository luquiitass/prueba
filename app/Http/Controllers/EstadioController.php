<?php

namespace App\Http\Controllers;

use Amranidev\Ajaxis\Ajaxis;
use App\Direccion;
use App\Equipo;
use App\Estadio;
use App\Http\JSON_retorno;
use Dompdf\Exception;
use Request;
use App\Http\Requests\EstadioRequestStore;
use App\Http\Requests\EstadioRequestUpdate;


class EstadioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $estadios = Estadio::get();
        return view('estadio.index',compact('estadios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('estadio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $json = new JSON_retorno();
        $input = Request::except('_token');
        $equipo = Equipo::find(Request::get('equipo_id'));
        $direccion = new Direccion($input);

        try
        {
            $estadio =  $equipo->addEstadio($input);

            $estadio->direccion()->save($direccion);

        }catch (Exception $e){
            $json->setMensaje($e->getMessage(),'danger','true');
            return $json->getAllJSON();
        }


        $json->setMensaje('Se ha creado exitosamente el Estadio','success');
        $json->setHtml('#tabs',view('equipo.tabs.tabs',compact('equipo'))->render());

        return $json->getAllJSON();
        //dd($estadio);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Estadio $estadio)
    {
        return view('estadio.show',compact('estadio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Estadio $estadio)
    {
        $view =  view('estadio.comp_edit',compact('estadio'));
        if (Request::ajax())
        {
            $json = new JSON_retorno();

        }
        return $view;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Estadio $estadio)
    {
        dd(Request::all());
        $json = new JSON_retorno();
        $json->setMensaje('Medio anda','success','true');
        return $json->getAllJSON();
        //
    }



    public function DeleteMsg(Estadio $estadio)
    {
        $msg = Ajaxis::BtDeleting('Cuidado!!','¿Esta seguro de eliminar este Estadio?','/estadio/'. $estadio->id . '/delete/');

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
    public function destroy(Estadio $estadio)
    {
        $estadio->direccion()->delete();
        $estadio->delete();
        if (Request::ajax()){
            $json = new JSON_retorno();
            $json->setMensaje('Estadio Eliminado','success');
            return $json->getAllJSON();
        }
        return \URL::to('estadio');
    }
}
