<?php

namespace App\Http\Controllers;

use Amranidev\Ajaxis\Ajaxis;
use App\Http\JSON_retorno;
use App\Http\Requests\TipoFaseRequestStore;
use App\Http\Requests\TipoFaseRequestUpdate;
use App\TipoFase;
use App\TipoTorneo;
use Dompdf\Exception;
use Request;

class TipoFaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tipos = TipoFase::get();

        return view('parametros.tiposFase.index',compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (Request::has('tipoTorneo')){
            $tipoTorneo = TipoTorneo::findOrFail(Request::get('tipoTorneo'));
            $body = view('parametros.tiposFase.comp_create',compact('tipoTorneo'))->render();
        }else{
            $body = view('parametros.tiposFase.comp_create')->render();
        }
        $modal = view('modals.modal2',compact('body'))->render();
        return $modal;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoFaseRequestStore $request)
    {
        $input = \Request::except('_token');
        //dd($input);
        try{
            $tipoFase = new  TipoFase($input);
            $tipoFase->save();
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
    public function show(TipoFase $tipoFase)
    {
        //
        return view('parametros.tiposFase.show',['tipo'=>$tipoFase]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoFase $tipoFase)
    {
        //
        if (Request::has('tipoTorneo')){
            $body = view('parametros.tiposFase.comp_edit',['tipo'=>$tipoFase,'tipoTorneo'=>Request::get('tipoTorneo')])->render();
        }else{
            $body = view('parametros.tiposFase.comp_edit',['tipo'=>$tipoFase])->render();
        }
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
    public function update(TipoFaseRequestUpdate $request, TipoFase $tipoFase)
    {
        $input = \Request::except('_token');
        //dd($input);
        try{
            $tipoFase->update($input);
        }catch (Exception $e){
            return JSON_retorno::create()->setMensaje($e->getMessage(),'danger','true')->getAllJSON();
        }

        return JSON_retorno::create()->setUrl(\URL::previous())->getAllJSON();

    }

    public function deleteMsg(TipoFase $tipoFase)
    {
        $msg = Ajaxis::BtDeleting('Cuidado!!','¿Esta seguro de eliminar el tipo '.$tipoFase->nombre.'?','/tipoFase/'. $tipoFase->id . '/delete/');

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
    public function destroy(TipoFase $tipoFase)
    {
        try{
            $tipoFase->delete();
        }catch (\Exception $e){
            return JSON_retorno::create()->setMensaje($e->getMessage(),'danger','true')->getAllJSON();
        }
        return JSON_retorno::create()->setUrl(\URL::previous())->getAllJSON();

    }
}
