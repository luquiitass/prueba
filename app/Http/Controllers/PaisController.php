<?php

namespace App\Http\Controllers;

use App\Tabla_dataTable;
use Laracasts\Flash\Flash;
use Request;
use App\Http\Requests\StorePais;
use App\Http\Controllers\Controller;
use App\Pais;
use App\Provincia;
use App\Localidad;
use Amranidev\Ajaxis\Ajaxis;
use URL;
use Datatables;
use App\Http\JSON_retorno;

/**
 * Class PaisController
 *
 * @author  The scaffold-interface created at 2016-09-17 11:22:08am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    /**
     * @return string
     */
    public function pais(){
        $paises = Pais::with('provincias.localidades')->get();

        $columnas =[
            ['Pais','pais',true,true],
            ['Provincia','provincia',true,true],
            ['Localidad','localidad',true,true]
        ];

        $tabla = Tabla_dataTable::create('/dt_ppl',rand(0,100),$columnas);
        //$provincias = Provincia::with('localidades')->get();

        //dd($paises);
        return view('pais.pais',compact('paises','tabla'));
    }

    public function index()
    {
        $pais = Pais::all();
        //return view('pais.index',compact('pais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $url = '/pais';
        return Ajaxis::BtCreateFormModal(Pais::AjaxisCreatePAis(),$url);
        //return view('pais.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(StorePais $request)
    {
        $input = Request::except('_token');

        $pais = new Pais();

        $pais->nombre = $input['nombre'];

        $pais->save();

        $paises = Pais::with('provincias.localidades')->get();

        $paisActivo = $pais->id;

        $colPais= 'true';

        $html = view('pais.html_pais_provincia_localidad',compact('paises','paisActivo','colPais'))->render();

        $json = new JSON_retorno();

        $json->setMensaje('Pais registrado','success');

        $json->setHtml('#content',$html);


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
            return URL::to('pais/'.$id);
        }

        //$pais = Pais::findOrfail($id);
        //return view('pais.show',compact('pais'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit(Pais $pais)
    {
        $url= '/pais/'.$pais->id.'/update';
        //dd($id);
        if(Request::ajax())
        {
            return Ajaxis::BtEditFormModal($pais->AjaxisEditPais(),$url);
            //return URL::to('pais/'. $id . '/edit');
        }

        
        //$pais = Pais::findOrfail($id);
        //return view('pais.edit',compact('pais'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update($id)
    {
        $input = Request::except('_token');

        $pais = Pais::findOrfail($id);
    	
        $pais->nombre = $input['nombre'];
        
        
        $pais->save();

        $html = view('pais.unPais',compact('pais'))->render();

        $json = new JSON_retorno();

        $json->setHtmlRemplace('#li_pais_id_'.$id,$html);

        $json->setMensaje('Pais Modificado','success');


        return  $json->getAllJSON();//URL::to('/pais');
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
        $msg = Ajaxis::BtDeleting('Cuidado!!','¿Esta seguro de Eliminar este pais ?','/pais/'. $id . '/delete/');

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
    public function destroy(Pais $pais)
    {
        $json = new JSON_retorno();

        if ($pais->provincias()->count() == 0){
            $pais->delete();
            $json->setFadeOut('#li_pais_id_'.$pais->id);
            $json->setMensaje('Pais Eliminado','info');
        }else{
            $json->setMensaje('No se puede eliminar el pais '.$pais->nombre.' por que posee provincias relacionadas a él','danger','true');
        }



        return $json->getAllJSON();//URL::to('pais');
    }

    public function DT_paises()
    {
        $paises = Pais::query();

        return Datatables::of($paises)
            ->addColumn('action', function ($pais) {
                return "<button data-toggle='modal' data-target='#myModal' class ='edit btn btn-success btn-xs'  data-link = '/pais/$pais->id/edit'>Editar</i></button>";
            })->make(true);
    }

    public function autoCompletePais()
    {
        $busq = Request::get('term');

        $paises = Pais::where('nombre','LIkE',"%$busq%")->select('nombre as value','id')->get();

        if ($paises->count() == 0 )
        {
            return $paises = array('value'=> 'No existe el Pais');
        }
        return response()->json($paises);
    }

    public function buscar()
    {
        $busq = Request::get('busqueda');
        if (!empty($busq)) {
            $paises = Pais::select('id', 'nombre')->like(['nombre'], $busq)->get();
            $provincias = Provincia::select('id', 'nombre')->like(['nombre'], $busq)->get();
            $localidades = Localidad::select('id', 'nombre')->like(['nombre'], $busq)->get();
        }else{
            $paises = [];
            $provincias=[];
            $localidades=[];
        }
        $view = view('pais.comp_tabla_busqueda',compact('provincias','paises','localidades','busq'))->render();

        $json = JSON_retorno::create();
        $json->setHtml('#tabla_busqueda',$view);

        return $json->getAllJSON();
    }
}
