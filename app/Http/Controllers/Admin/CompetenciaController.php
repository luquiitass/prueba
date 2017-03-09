<?php

namespace App\Http\Controllers\Admin;

use App\Competencia;
use App\Http\Controllers\Admin\Base;
use App\Http\JSON_retorno;
use Illuminate\Support\Facades\Session;
use Request;
use Amranidev\Ajaxis\Ajaxis;

use App\Http\Requests\CompetenciaRequestStore;
use App\Http\Requests\CompetenciaRequestUpdate;
class CompetenciaController extends Base
{

//    public function portada(Competencia $competencia)
//    {
//        return view('competencia.unaCompetencia.portada',compact('competencia'));
//
//    }
//
//    public function index_configuraciones(Competencia $competencia)
//    {
//        $id_temporada = Request::get('temporadas');
//        $id_torneo = Request::get('torneo');
//        if (empty($id_temporada)){
//            $temporada = $competencia->temporadas->first();
//            if (!empty($temporada)){
//                $id_temporada = $temporada->id;
//            }
//        }
//        if (empty($id_torneo)){
//            if (!empty($temporada)){
//                if ($temporada->t_has('torneos')){
//                    //dd($temporadas->torneos->first()->id);
//                    $id_torneo = $temporada->torneos->first()->id;
//                }
//            }
//        }
//        return view('competencia.unaCompetencia.index_configuraciones',compact('competencia','id_temporada','id_torneo'));
//
//    }
//
//    public function show_configuraciones(Competencia $competencia){
//        return view('admin.liga.competencia.conf_competencia',compact('competencia'));
//        //return view('competencia.unaCompetencia.show_configuraciones',compact('competencia'));
//    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $competencias = Competencia::with('users')->get();
        return view('admin.competencia.index',compact('competencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $body = view('admin.competencia.comp_create')->render();
        if (Request::ajax()){
            return view('modals.modal2',compact('body'))->render();
        }
        return view('admin.competencia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompetenciaRequestStore $request)
    {
        //
        $input = Request::except('_token');

        $administradores = $input['administradores'];


        $competencia = new Competencia($input);
        $competencia->save();

        $competencia->t_addAdministradores($administradores);

        \Session::flash('success','Competencia creada correctamente');

        return redirect()->to('admin/competencia');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Competencia $competencia)
    {
        return view('admin.competencia.show',compact('competencia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Competencia $competencia)
    {
        $body = view('admin.competencia.edit',compact('competencia'))->render();
        $modal = view('modals.modal2',compact('body'))->render();
        if (Request::ajax()){
            return $modal;
        }
        return view('admin.competencia.edit',compact('competencia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompetenciaRequestUpdate $request, Competencia $competencia)
    {
        try {

        $input = Request::except('_token');

        $administradores = $input['administradores'];

        $competencia->update($input);

        $competencia->removeAdministradores();

        $competencia->t_addAdministradores($administradores);

        $competencia->update();

        }catch(\Exception $e) {
            return JSON_retorno::create()->setMensaje($e->getMessage(),'danger','true')->getAllJSON();
        }

        \Session::flash('success','Competencia modificada exitosamnete');

        if (Request::ajax()){
            return JSON_retorno::create()->setUrl(\URL::previous())->getAllJSON();
        }

        return  redirect()->back();


    }

    public function deleteMsg(Competencia $competencia)
    {
        $msg = Ajaxis::BtDeleting('Cuidado!!','¿Esta seguro de eliminar la competencias '.$competencia->name.' ?','/admin/competencia/'. $competencia->id . '/delete');
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
    public function destroy(Competencia $competencia)
    {
        //
        $competencia->delete();

        \Session::flash('success','Competencia eliminada correctamente');
        return \URL::to('admin/competencia');
    }
}
