<?php

namespace App\Http\Controllers;

use Amranidev\Ajaxis\Ajaxis;
use App\Http\JSON_retorno;
use App\Http\Requests\TipoOrganizacionCompetenciaRequestStore;
use App\Http\Requests\TipoOrganizacionCompetenciaRequestUpdate;
use App\TipoOrganizacionCompetencia;
use Dompdf\Exception;

class TipoOrganizacionCompetenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tipos = TipoOrganizacionCompetencia::get();

        return view('parametros.tiposOrganizacionCompetencia.index',compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $body = view('parametros.tiposOrganizacionCompetencia.comp_create')->render();
        $modal = view('modals.modal2',compact('body'))->render();
        return $modal;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoOrganizacionCompetenciaRequestStore $request)
    {
        $input = \Request::except('_token');
        //dd($input);
        try{
            $tipoOrganizacionCompetencia = new  TipoOrganizacionCompetencia($input);
            $tipoOrganizacionCompetencia->save();
        }catch (Exception $e){
            return JSON_retorno::create()->setMensaje($e->getMessage(),'danger','true')->getAllJSON();
        }

        return JSON_retorno::create()->setUrl(\URL::previous())->getAllJSON();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TipoOrganizacionCompetencia $tipoOrganizacionCompetencia)
    {
        //
        return view('parametros.tiposOrganizacionCompetencia.show',['tipo'=>$tipoOrganizacionCompetencia]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoOrganizacionCompetencia $tipoOrganizacionCompetencia)
    {
        //
        $body = view('parametros.tiposOrganizacionCompetencia.comp_edit',['tipo'=>$tipoOrganizacionCompetencia])->render();
        $modal = view('modals.modal2',compact('body'))->render();
        return $modal;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TipoOrganizacionCompetenciaRequestUpdate $request, TipoOrganizacionCompetencia $tipoOrganizacionCompetencia)
    {
        $input = \Request::except('_token');
        //dd($input);
        try{
            $tipoOrganizacionCompetencia->update($input);
        }catch (Exception $e){
            return JSON_retorno::create()->setMensaje($e->getMessage(),'danger','true')->getAllJSON();
        }

        return JSON_retorno::create()->setUrl(\URL::previous())->getAllJSON();

    }

    public function deleteMsg(TipoOrganizacionCompetencia $tipoOrganizacionCompetencia)
    {
        $msg = Ajaxis::BtDeleting('Cuidado!!','¿Esta seguro de eliminar el tipo '.$tipoOrganizacionCompetencia->nombre.'?','/tipoOrganizacionCompetencia/'. $tipoOrganizacionCompetencia->id . '/delete/');

        if(\Request::ajax())
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
    public function destroy(TipoOrganizacionCompetencia $tipoOrganizacionCompetencia)
    {
        try{
            $tipoOrganizacionCompetencia->delete();
        }catch (\Exception $e){
            return JSON_retorno::create()->setMensaje($e->getMessage(),'danger','true')->getAllJSON();
        }
        return JSON_retorno::create()->setUrl(\URL::previous())->getAllJSON();

    }
}
