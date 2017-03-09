<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 23/02/17
 * Time: 11:31
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Admin\Base;

class UserController extends Base
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::get();
        $columnas = [
            ['Nombre','nombre',true,true],
            ['Apellido','apellido',true,true],
            ['Email','email',true,true]
        ];

        $tabla = Tabla_dataTable::create('dt_users',rand(1,1000),$columnas);

        return view('users.index',compact('tabla'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function select2(){
        $retorno = [];
        $busq = \Request::get('term');
        $query = User::like(['nombre','apellido','email'],$busq);
        foreach ($query->select('id','nombre','apellido','email')->get() as $user)
        {
            $retorno[]= array('id'=>$user->id,'text'=>'('.$user->email.')     '.$user->nombre .' '.$user->apellido);
        }
        return json_encode($retorno);
    }

    public function select()
    {
        $retorno = [];
        $busq = \Request::get('query');
        $query = User::like(['nombre','apellido','email'],$busq);
        foreach ($query->select('id','nombre','apellido','email','fecha_nacimiento')->get() as $user)
        {
            $retorno[]= array('data'=>$user->id,'value'=>'('.$user->email.')     '.$user->nombre .' '.$user->apellido,'nombre'=>$user->nombre ,'apellido'=>$user->apellido,'fecha_nacimiento'=>$user->fecha_nacimiento);
        }
        return json_encode(array('suggestions'=>$retorno));
    }

    public function dt_users(){
        $query = User::select('id','nombre','apellido','email');
        return Datatables::of($query)
            ->editColumn('nombre',function ($user){
                return '<a class="manita" href="perfil/'.$user->id.'">'.$user->nombre.'</a>';
            })
            ->make(true);
    }

}