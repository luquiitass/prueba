<?php

namespace App\Http\Controllers\Admin;


use App\Funciones;
use App\Http\JSON_retorno;
use App\Tabla_dataTable;
use App\Torneo;
use Request;
use App\Equipo;
use App\Http\Requests\EquipoRequestStore;
use App\Http\Requests\EquipoRequestUpdate;
use Amranidev\Ajaxis\Ajaxis;
use Datatables;

class EquipoController extends Base
{

//    public function perfil(Equipo $equipo)
//    {
//        return view('equipo.unEquipo.perfil',compact('equipo'));
//    }
//
//    public function partidos(Equipo $equipo)
//    {
//        return view('equipo.unEquipo.perfil',compact('equipo'));
//    }
//
//    public function calendario(Equipo $equipo)
//    {
//        return view('equipo.unEquipo.perfil',compact('equipo'));
//    }
//
//    public function jugadores(Equipo $equipo)
//    {
//        return view('equipo.unEquipo.jugadores',compact('equipo'));
//    }
//
//    public function fotos(Equipo $equipo)
//    {
//        return view('equipo.unEquipo.perfil',compact('equipo'));
//    }
//
//    public function configuraciones(Equipo $equipo)
//    {
//        return view('equipo.unEquipo.perfil',compact('equipo'));
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $equipos = Equipo::get();
        $columnas=[
            ['Nombre','nombre',true,true],
            ['Alias','alias',true,true],
            ['Administrador','adm'],
            ['Operaciones','op',false,false],

        ];
        $tabla = Tabla_dataTable::create('dt_equipos',rand(1,1000),$columnas);
        if (Request::ajax())
        {
            $tabla = Tabla_dataTable::create('dt_equipos',random_int(0,1000),$columnas);
            $title = 'Tabla de Equipos';
            $body = view('otros.tabla_datatable_model',compact('tabla'))->render().'<script>cargarTablas();</script>';
            return view('modals.modal_lg',compact('title','body'))->render();
        }

        return view('equipo.index',compact('equipos','tabla'));
    }

    public function equiposPorCategorias()
    {
        $categorias = Request::get('categorias');
        if (!Request::has('draw')) {

            $columnas = [
                ['Nombre', 'nombre', true, true],
                ['Categoria','categoria',false,false]
            ];
            $tabla = Tabla_dataTable::create('equiposPorCategoria?categorias='.$categorias, random_int(0, 1000), $columnas);
            $title = 'Tabla de Equipos';
            $body = view('otros.tabla_datatable_model', compact('tabla'))->render() . '<script>cargarTablas();</script>';
            return view('modals.modal_lg', compact('title', 'body'))->render();
        }else{
            $categorias = explode(',', $categorias);
            $query = Equipo::t_orWhere('categoria_id', '=', $categorias);//Equipo::with('users')->select('id','nombre','alias');

            return Datatables::eloquent($query)
                ->addColumn('categoria',function (Equipo $equipo)
                {
                    //$equipo->users->count() > 0?dd($equipo):'';
                    return $equipo->categoria->nombre;
                })
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view_form = view('equipo.comp_create')->render();
        $modal = view('modals.modal2',['body'=>$view_form,'title'=>'Nuevo Equipo'])->render();
        return $modal;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EquipoRequestStore $request)
    {
        //
        $input = $request->all();
        try{
            Equipo::valiadarEquipo($input);

            $nombre_image = explode('/',$request->get('img_escudo'));
            $nombre_image = $request->has('img_escudo')?array_last($nombre_image):'';

            $input =$request->except('_token','categoria');

            $input['categoria_id']= $request->get('categoria');

            //dd($input);

            $equipo =  new Equipo($input);

            $equipo->save();

            $equipo->removeAdministradores();

            $equipo->t_addAdministradores($request->only('administradores'));

            $equipo->setFotoEscudo($nombre_image);

        }catch (\Exception $e) {
            return JSON_retorno::create()->setMensaje($e->getMessage(), 'danger')->getAllJSON();
        }
        return JSON_retorno::create()->setOcultarModal()->setMensaje('Equipo Registrado','success')->getAllJSON();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $equipo
     * @return \Illuminate\Http\Response
     */
    public function show(Equipo $equipo)
    {
        return view('equipo.show',compact('equipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $equipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipo $equipo)
    {
        //
        $users = array();
        $us = array();
        foreach ($equipo->users as $user)
        {
            $users[$user->id]=$user->name;
            $us[]=$user->id;
        }
        return view('equipo.edit',compact('equipo','users','us'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $equipo
     * @return \Illuminate\Http\Response
     */
    public function update(EquipoRequestUpdate $request,Equipo $equipo)
    {
        //
        $equipo->update($request->except('_token','_method'));

        $equipo->removeAdministradores();

        $equipo->t_addAdministradores($request->only('administradores'));

        return redirect()->to('equipo');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $equipo
     * @return \Illuminate\Http\Response
     */

    public function deleteMsg(Equipo $equipo)
    {
        $url = "/equipo/$equipo->id/delete";
        if (Request::ajax()){
            return Ajaxis::BtDeleting('Eliminar Equipo',"Esta seguro que decea eliminar al equipo $equipo->nombre ",$url);
        }
    }



    public function destroy(Equipo $equipo)
    {
        //
        $equipo->delete();

        return \URL::to('equipo');
    }


    public function DT_equipos()
    {
        $query = Equipo::with('users')->select('id','nombre','alias');

        return Datatables::eloquent($query)
            ->addColumn('adm',function (Equipo $equipo)
            {
                //$equipo->users->count() > 0?dd($equipo):'';
                return $equipo->users->count() > 0 ? $equipo->users->implode('email',',<br>'):'Sin Administrador';
            })
            ->addColumn('op',function (Equipo $equipo){
                return '<div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="glyphicon glyphicon-cog"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">'.

                                    '<li><a href="'.url("equipo/".$equipo->id."/perfil").'" ><i class="glyphicon glyphicon-search"></i>Ver</a></li>'.
                                    '<li><a href="'.url("equipo/".$equipo->id."/edit").'" ><i class="glyphicon glyphicon-edit"></i>Editar</a></li>'.

                                    '<li role="separator" class="divider"></li>'.

                                    '<li><a data-link="/equipo/'.$equipo->id.'/deleteMsg" class="manita edit" data-toggle="modal" data-target="#myModal" ><i class="glyphicon glyphicon-remove-circle"></i>Eliminar</a></li>'.

                                '</ul>
                         </div>';
            })

            ->make(true);
    }


    public function select2(){
        $retorno = [];
        $busq = \Request::get('term');
        $query = Equipo::with('categoria')->like(['nombre','alias'],$busq);
        foreach ($query->get() as $equipo)
        {
            $text = $equipo->nombre.', ';
            $text .= !empty($equipo->alias)?'('.$equipo->alias.') ' : '';
            $text .=' '. $equipo->categoria->nombre;
            $retorno[]= array('id'=>$equipo->id,'text'=>$text);//$equipo->nombre. isset($equipo->alias)?' ('.$equipo->alias.') ':''.$equipo->categoria->nombre);
        }
        return json_encode($retorno);
    }

    public function categoriasSelect2(Torneo $torneo){
        $retorno = [];
        $busq = \Request::get('term');

        $equipos =  Equipo::t_OrWhere('categoria_id','=',Funciones::t_array_id($torneo->categorias))->t_Where('id','<>',Funciones::t_array_id($torneo->equipos))->like(['nombre','alias'],$busq)->get();

        foreach ($equipos as $equipo)
        {
            $text = $equipo->nombre.' ';
            $text .= !empty($equipo->alias)?'('.$equipo->alias.') ' : '';
            $text .='  cat: '. $equipo->categoria->nombre;
            $retorno[]= array('id'=>$equipo->id,'text'=>$text);//$equipo->nombre. isset($equipo->alias)?' ('.$equipo->alias.') ':''.$equipo->categoria->nombre);
        }
        return json_encode($retorno);
    }

}
