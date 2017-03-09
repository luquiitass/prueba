<?php

namespace App\Http\Controllers\Admin;

use Amranidev\Ajaxis\Ajaxis;
use App\Categoria;
use App\Competencia;
use App\Fecha;
use App\Http\Controllers\Admin\Base;
use App\Http\JSON_retorno;
use App\Http\Requests\LigaRequestStore;
use App\Http\Requests\LigaRequestUpdate;
use App\Liga;
use App\Temporada;
use Dompdf\Exception;
use \Request;

class LigaController extends Base
{
    //

    public function create(){
        if (Request::has('temporada')){
            $temporada = Temporada::findOrFail(Request::get('temporada'));
            $body = view('admin.liga.comp_create',compact('temporada'))->render();
            return view('modals.modal2',compact('body'))->render();
        }
        return 'Falta pasar la temporada';
    }


    public function store(LigaRequestStore $requestStore){
        $input = $requestStore->except('_token');
        $administradores = $input['administradores'];
        $categorias = $input['categorias'];
        //dd($requestStore->all());
        try{
            Liga::validarLiga($input);

            \DB::beginTransaction();

                $liga = new Liga($input);
                $liga->users();
                $liga->save();
                $liga->attach('categorias',$categorias);
                $liga->attach('administradores',$administradores);
                //$liga->generarLiga();
            \DB::commit();
        }catch (\Exception $e){
            \DB::rollBack();
            return JSON_retorno::create()->setMensaje($e->getMessage(),'danger','true')->getAllJSON();
        }
        \Session::flash('sucess','La Ligaa se ha creado correctamente');
        return JSON_retorno::create()->setUrl('admin/liga/'.$liga->id)->getAllJSON();
    }

    public function show(Liga $liga){
        $competencia = $liga->temporada->competencia;
        return view('admin.liga.partes.show',compact('competencia','liga'));
    }


    public function edit(Liga $liga){
        $body = view('admin.liga.comp_edit',compact('liga'))->render();
        return view('modals.modal2',compact('body'))->render();
    }

    public function update(LigaRequestUpdate $requestUpdate,Liga $liga){
        $input = $requestUpdate->except('_token');

        $administradores = $requestUpdate->get('administradores') || [];
        $categorias = $requestUpdate->get('categorias') || [];

        try{
            \DB::beginTransaction();

            $liga->validarUpdate($input);

            $liga->update($input);

            $liga->detach('categorias');
            $liga->detach('administradores');

            $liga->attach('categorias',$categorias);
            $liga->attach('administradores',$administradores);

            \DB::commit();
        }catch (\Exception $e){
            \DB::rollBack();
            return JSON_retorno::create()->setMensaje($e->getMessage(),'danger','true')->getAllJSON();
        }
        \Session::flash('success','Liga modificada correcctamenete');

        return JSON_retorno::create()->setUrl(\URL::previous())->getAllJSON();
    }



    public function portada(Competencia $competencia)
    {
        return view('liga.portada.index',compact('competencia'));
    }

    public function equipos(Liga $liga){
        //$liga = $liga->cast();
        $competencia=$liga->temporada->competencia;
        return view('admin.liga.partes.equipos',compact('liga','competencia'));
    }

    public function fechas( Liga $liga){
        $competencia =$liga->temporada->competencia;
        return view('admin.liga.partes.show',compact('liga','competencia'));
    }

    public function resultados( Liga $liga,Fecha $fecha){
        $competencia =$liga->temporada->competencia;
        return view('admin.liga.partes.resultados',compact('liga','competencia'));
    }

    public function calendario( Liga $liga,Fecha $fecha){
        $competencia =$liga->temporada->competencia;
        return view('admin.liga.partes.calendario',compact('liga','competencia'));
    }
    public function tablaPosiciones( Liga $liga){
        $competencia =$liga->temporada->competencia;
        return view('admin.liga.partes.tabla_posiciones',compact('liga','competencia'));
    }

    public function deleteMsg(Liga $liga)
    {
        $msg = Ajaxis::BtDeleting('Cuidado!!','¿Esta seguro de eliminar la Liga '.$liga->nombre.' ?','/admin/liga/'. $liga->id . '/delete');
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
    public function destroy(Liga $liga)
    {
        $id = $liga->id;
        try {
            $liga->validarDelete();
            $liga->delete();
        }catch(\Exception $e){
            return JSON_retorno::create()->setMensaje($e->getMessage(),'danger','true')->getAllJSON();
        }
        return JSON_retorno::create()->setMensaje('Liga Eliminada Corrrectamente','success')->setFadeOut('#torneo_id_'.$id)->getAllJSON();

    }

    /*********************************************************/
    public function generarLiga(Liga $liga){
        $retorno = 'algo salio mal';
        try{
            $liga->generarLiga();

        }catch (\Exception $e){
            $retorno =  JSON_retorno::create()->setMensaje($e->getMessage(),'danger','true')->getAllJSON();
        }
        \Session::flash('success','Fixture creado correctemente');
        $retorno = JSON_retorno::create()->setUrl(\URL::previous())->getAllJSON();
        return $retorno;
    }











    public function conf_index(Competencia $competencia){
        $id_temporada = Request::get('temporada');
        $id_liga = Request::get('liga');
        if (empty($id_temporada) && !empty($competencia->temporadas)){
            $temporada = $competencia->temporadas->first();
            if (!empty($temporada)){
                $id_temporada = $temporada->id;
            }
        }else{
            $temporada = Temporada::find($id_temporada)->first();
        }

        if (empty($id_liga)){
            if (!empty($temporada) && !empty($temporada->ligas) && ($temporada->ligas->count() > 0)){
                $id_liga = $temporada->ligas->first()->id;
            }
        }

        return view('liga.configuracion.index',compact('competencia','id_temporada','id_liga'));
    }

    public function conf_competencia(Competencia $competencia){
        return view('liga.configuracion.competencia',compact('competencia'));
    }

    public function conf_temporada(Temporada $temporada){
        $competencia = $temporada->competencia;
        return view('liga.configuracion.temporada',compact('competencia','temporada'));
    }

    public function conf_liga(Liga $liga){
        $competencia = $liga->temporada->competencia;
        return view('liga.configuracion.liga',compact('competencia','liga'));
    }


    /*--------------Funcioes de Liga--------------------*/

    public function conf_ligaEquipos(Liga $liga){
        $competencia = $liga->temporada->competencia;
        return view('liga.configuracion.liga.equipos',compact('liga','competencia'));
    }

}
