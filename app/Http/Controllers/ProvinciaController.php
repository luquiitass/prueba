<?php

namespace App\Http\Controllers;

use App\Funciones;
use App\Pais;
use Request;
use App\Provincia;
use Amranidev\Ajaxis\Ajaxis;
use URL;
use Datatables;
use App\Http\JSON_retorno;

use App\Http\Requests\ProvinciaStore;

/**
 * Class ProvinciaController
 *
 * @author  The scaffold-interface created at 2016-09-17 11:36:04am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class ProvinciaController extends Controller
{
    use Funciones;
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $provincias = Provincia::all();
        return view('provincia.index',compact('provincias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create($pais)
    {
        $url = '/'.$pais.'/provincia/store';
        if (Request::ajax())
        {
            return Ajaxis::BtCreateFormModal(Provincia::AjaxisCreateProvincia(),$url);
        }
        return view('provincia.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Pais $pais,ProvinciaStore $request)
    {
        $json = new JSON_retorno();

        $input = Request::except('_token');

        if (! $pais->hasProvincia($input['nombre'])) {

            $provincia = new Provincia();
            $provincia->nombre = $input['nombre'];
            $provincia->belongs($pais->id);
            $provincia->save();


            $paises = Pais::with('provincias.localidades')->get();
            $paisActivo = $pais->id;
            $provinciaActiva = $provincia->id;
            $colProvincia = 'true';

            $html = view('pais.html_pais_provincia_localidad', compact('paises', 'paisActivo', 'provinciaActiva','colProvincia'))->render();

            $json->setHtml('#content', $html);
            $json->setMensaje('Provincia registrada', 'success');
        }else{
            $json->setMensaje('La provincia ya existe', 'danger');
        }

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
            return URL::to('provincia/'.$id);
        }

        $provincia = Provincia::findOrfail($id);
        return view('provincia.show',compact('provincia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit(Provincia $provincia)
    {
        $url ='/provincia/'.$provincia->id.'/update';

        if(Request::ajax())
        {
            return Ajaxis::BtEditFormModal($provincia->AjaxisEditProvincia(),$url);
            //return URL::to('pais/'. $id . '/edit');
        }

        return view('provincia.edit',compact('provincia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update(Provincia $provincia)
    {
        $input = Request::except('_token');

        $provincia->nombre = $input['nombre'];

        $provincia->save();

        $provinciaActiva = $provincia->id;

        $html = view('provincia.unaProvincia',compact('provincia','provinciaActiva'))->render();

        $json = new JSON_retorno();
        $json->setMensaje('Provincia modificada','suuccess');
        $json->setHtmlRemplace('#li_provincia_id_'.$provincia->id,$html);



        return $json->getAllJSON();// response()->json($retorno);
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
        $msg = Ajaxis::BtDeleting('Cuidado!!','¿Esta seguro de eliminar esta Provinvcia?','/provincia/'. $id . '/delete/');

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
    public function destroy(Provincia $provincia)
    {
        $json = new JSON_retorno();
        if ($provincia->localidades()->count() == 0) {
            $provincia = Provincia::findOrfail($provincia->id);
            $provincia->delete();

            $json->setFadeOut('#li_provincia_id_'.$provincia->id);
            $json->setMensaje('Provincia eliminada','info');
        }else{
            $json->setMensaje('No se puede eliminar esta provincias debido a que posee localidades asociasda','danger','true');
        }
        return $json->getAllJSON();
    }

    public function DT_provincia(Pais $pais)
    {
        $provincias = $pais->provincias()->getBaseQuery();

        return Datatables::of($provincias)
            ->addColumn('action', function ($provincia) {

                return "<button data-toggle='modal' data-target='#myModal' class ='edit btn btn-success btn-xs'  data-link = '/provincias/$provincia->pais_id/$provincia->id/edit'>Editar</i></button>";
            })->make(true);
    }

    public function autoCompleteProvincia(Pais $pais)
    {
        //dd($pais);

        $busq = Request::get('term');

        $provincias = Provincia::where('nombre','LIkE',"%$busq%")->select('nombre as value','id')->get();

        if ($provincias->count() == 0 && strlen($busq ) > 0 )
        {
            return $provincias = array('value'=> 'No existe la Provincia');
        }
        return response()->json($provincias);
    }

    public function listForSelect(Pais $pais){
        return self::getForSelect($pais->provincias,$pais->nombre.' no posee Provincias','Selecciones una provincia');
    }
}
