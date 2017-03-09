<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Http\JSON_retorno;
use App\Http\Requests\CategoriaRequestStore;
use App\Http\Requests\CategoriaRequestUpdate;
use Request;
use Amranidev\Ajaxis\Ajaxis;

class CategoriaController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::get();
        return view('categoria.index',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = view('categoria.comp_create')->render();
        return view('modals.modal2',['body'=>$view])->render();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaRequestStore $request)
    {
        $input = Request::except('_token');


        try{
            Categoria::create($input);
        }catch (\Exception $e){
            return JSON_retorno::create()->setMensaje($e->getMessage(),'danger','true')->getAllJSON();
        }
        return JSON_retorno::create()->setUrl(\URL::previous())->getAllJSON();//JSON_retorno::create()->setUrl('categoria')->getAllJSON();
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
    public function edit(Categoria $categoria)
    {
        //
        $body = view('categoria.comp_edit',compact('categoria'))->render();
        return view('modals.modal2',compact('body'))->render();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriaRequestUpdate $request, Categoria $categoria)
    {
        $input = Request::except('_token');
        $categoria->nombre = $input['nombre'];
        $categoria->descripcion = $input['descripcion'];
        $categoria->tabla = $input['tabla'];
        $categoria->save();
        return \URL::to('categoria');
    }

    public function DeleteMsg(Categoria $categoria)
    {
        $msg = Ajaxis::BtDeleting('Cuidado!!','¿Esta seguro de eliminar éste Categoria?','/categoria/'. $categoria->id . '/delete/');

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
    public function destroy(Categoria $categoria)
    {
        $json = new JSON_retorno();
        try{
            $id = $categoria->id;
            $categoria->delete();
            $json->setMensaje('Categoria Eliminado','siccess');
            $json->setFadeOut('#tr_configuracion_'.$id);
        }catch (\Exception $e){
            $json->setMensaje($e->getMessage(),'danger','true');
        }
        return $json->getAllJSON();
    }

    public function select2(){
        $busq = \Request::get('term');
        $query = Categoria::like(['nombre'],$busq);
        return json_encode($query->select('id','nombre as text')->get());
    }
}
