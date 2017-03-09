<?php

namespace App\Http\Controllers;

use App\Funciones;
use App\Pais;
use App\Provincia;
use Laracasts\Flash\Flash;
use Request;
use App\Http\Controllers\Controller;
use App\Localidad;
use Amranidev\Ajaxis\Ajaxis;
use URL;
use App\Http\JSON_retorno;


use App\Http\Requests\LocalidadRequestSrore;

/**
 * Class LocalidadeController
 *
 * @author  The scaffold-interface created at 2016-09-21 07:55:19pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class LocalidadController extends Controller
{
    use Funciones;
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $json = new JSON_retorno();
        $json->setMensaje('Eliminado','success','true');
         return $json->getAllJSON();
        //$localidades = Localidad::all();
        //return view('localidad.index',compact('localidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create($provincia)
    {
        $url = '/'.$provincia.'/localidad/store';
        if (Request::ajax())
        {
            return Ajaxis::BtCreateFormModal(Localidad::AjaxisCreateLocalidad(),$url);
        }

        return view('localidad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Provincia $provincia,LocalidadRequestSrore $request)
    {
        $json = new JSON_retorno();
        $input = Request::except('_token');

        if (! $provincia->hasLocalidad($input['nombre']))
        {
            $localidad = new Localidad();


            $localidad->nombre = $input['nombre'];

            $localidad->belongs($provincia->id);

            $localidad->save();

            $paises = Pais::with('provincias.localidades')->get();
            $paisActivo = $localidad->provincia->pais_id;
            $provinciaActiva = $localidad->provincia_id;
            $localidadActiva = $localidad->id;

            $colLocalidad = true;

            $html = view('pais.html_pais_provincia_localidad',compact('paises','paisActivo','provinciaActiva','localidadActiva','colLocalidad'))->render();

            $json->setMensaje('Localidad Registrada','success');
            $json->setHtml('#content',$html);
        }else{
            $json->setMensaje('Esta localidad ya existe','danger');
        }

        //Flash::success("Localidad registrada")->important();

        return $json->getAllJSON();
    }

    /**
     * Display the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Request::ajax())
        {
            return URL::to('localidad/'.$id);
        }

        $localidad = Localidad::findOrfail($id);
        return view('localidad.show',compact('localidad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit(Localidad $localidad)
    {
        $url= '/localidad/'.$localidad->id.'/update';
        if(Request::ajax())
        {
            return Ajaxis::BtEditFormModal($localidad->AjaxisEditLocalidad(),$url);
        }


        return view('localidad.edit',compact('localidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update(Localidad $localidad)
    {
        $input = Request::except('_token');
    	
        $localidad->nombre = $input['nombre'];

        $localidad->save();

        $html = view('localidad.unaLocalidad',compact('localidad'))->render();

        $json = new JSON_retorno();
        $json->setMensaje('Localidad registrada','success');
        $json->setHtmlRemplace('#li_localidad_id_'.$localidad->id,$html);

        return $json->getAllJSON();
    }

    /**
     * Delete confirmation message by Ajaxis
     *
     * @link  https://github.com/amranidev/ajaxis
     *
     * @return  String
     */
    public function DeleteMsg($id)
    {
        $msg = Ajaxis::BtDeleting('Cuidado!!','¿Esta seguro de eliminar esta Localidad?','/localidad/'. $id . '/delete');

        if(Request::ajax())
        {
            return $msg;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Localidad $localidad)
    {
        //cuando se cree una direccion tendre que validar ante de eliminar si no posee direcciones asociadas
     	$localidad->delete();

        $json = new JSON_retorno();
        $json->setFadeOut('#li_localidad_id_'.$localidad->id);
        $json->setMensaje('Localidad eliminada','success');

        return $json->getAllJSON();
    }


    public function listForSelect(Provincia $provincia){
        return self::getForSelect($provincia->localidades,$provincia->nombre.' no posee Localidades','Selecciones una Localidad');
    }
}
