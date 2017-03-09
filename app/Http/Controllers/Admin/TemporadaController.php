<?php

namespace App\Http\Controllers\Admin;

use App\Competencia;
use App\Http\JSON_retorno;
use App\Http\Requests\TemporadaRequestStore;
use App\Http\Requests\TemporadaRequestUpdate;
use App\Temporada;
use Carbon\Carbon;
use Request;
use Amranidev\Ajaxis\Ajaxis;

use App\Http\Requests;

class TemporadaController extends Base
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Competencia $competencia)
    {
        //
        $temporadas = $competencia->temporadas;
        return view('temporada.index',compact('temporadas'));
    }

    public function index_conf(Competencia $competencia, Temporada $temporada){
        if (!isset($competencia)){
            $competencia = $temporada->competencia;
        }
        if (!isset($temporada)){
            $temporada = $competencia->temporadaActiva();
        }

        return view('temporada.index_configuraciones',compact('competencia','temporada'));
    }

    public function show_configuraciones(Temporada $temporada)
    {
        if (!isset($competencia)){
            $competencia = $temporada->competencia;
        }
        if (!isset($temporada)){
            $temporada = $competencia->temporadaActiva();
        }

        return view('admin.temporada.show',compact('competencia','temporada'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Competencia $competencia)
    {
        $body = view('admin.temporada.comp_create',compact('competencia'))->render();
        return view('modals.modal2',compact('body'))->render();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TemporadaRequestStore $request)
    {
        //
        $input = Request::except('_token');

        $competencia = Competencia::findOrFail($input['competencia_id']);

        $inicio =new  Carbon($input['inicio']);;
        $fin = new Carbon($input['fin']);

        $nombre = $input['nombre'];

        $input['inicio']= $inicio->toDateTimeString();
        $input['fin']= $fin->toDateTimeString();
        $input['nombre']= $nombre;
        try{
            $competencia->validarTempotada($input);
            $temporada = Temporada::create($input);

        }catch (\Exception $e){
             return JSON_retorno::create()->setMensaje($e->getMessage(),'danger','true')->getAllJSON();
        }

        \Session::flash('success','Competencia creada correctamente');

        return JSON_retorno::create()
            ->setUrl(\URL::previous())
            ->getAllJSON();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Temporada $temporada)
    {
        $competencia = $temporada->competencia;
        return view('admin.temporada.show',compact('temporada','competencia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Temporada $temporada)
    {
        //dd($temporada);
        if (Request::ajax()){
            $view = view('temporada.comp_edit',compact('temporada'))->render();
            return view('modals.modal2',['body'=>$view]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TemporadaRequestUpdate $request, Temporada $temporada)
    {
        //
        $input = Request::except('_token');

        $temporada->nombre =$input['nombre'];
        $temporada->inicio =new Carbon($input['inicio']);
        $temporada->fin =  new Carbon($input['fin']);

        try{
            $temporada->save();

        }catch (\Exception $e){
            return JSON_retorno::create()->setMensaje($e->getMessage(),'danger','true')->getAllJSON();
        }

        \Session::flash('success','Temporada modificada correctamente');

        return JSON_retorno::create()->setUrl(\URL::previous())->getAllJSON();
    }

    public function deleteMsg(Temporada $temporada)
    {
        $msg = Ajaxis::BtDeleting('Cuidado!!','¿Esta seguro de eliminar la temporada '.$temporada->name.' ?','/temporada/'. $temporada->id . '/delete');
        if(Request::ajax())
        {
            return $msg;
        }
        return $msg;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Temporada $temporada)
    {
        //
        $temporada->delete();
        return JSON_retorno::create()->setFadeOut('#temporada_'.$temporada->id)->setMensaje('Temporada eliminada','success')->getAllJSON();
    }
}
