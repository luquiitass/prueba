<?php

namespace App\Http\Controllers;

use App\Http\JSON_retorno;
use Bican\Roles\Models\Permission;
use Request;
use Amranidev\Ajaxis\Ajaxis;

use App\Http\Requests\PermisoRequestStore;

class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('seguridad.permiso.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermisoRequestStore $request)
    {
        //
        $input = $request->except('_token');

        $permission = new Permission();
        $permission->name = $input['name'];
        $permission->slug = $input['slug'];
        $permission->model = $input['model'];
        $permission->description = $input['description'];
        $permission->save();

        if (\Request::ajax())
        {
            $permisos = Permission::get();

            $json = new JSON_retorno();

            $tabSeleccionado = $permission->id;


            $html = view('seguridad.tabs.permission',['permission'=>$permisos],compact('tabSeleccionado'))->render();

            $json->setHtml('#tab_permission',$html);

            $json->setMensaje('Permiso "'.$permission->name.'" guardado','success');

            $json->setSelectElement('select_permiso_'.$permission->id);

            return $json->getAllJSON();
        }

        return redirect()->to('seguridad');
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
        return \Redirect::route('segutidad.index',['nombre'=>'Lucas','apellido'=>'Larrea']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        if (\Request::ajax())
        {
            return view('otros.modal2',array('body'=>view('seguridad.permiso.comp_edit',compact('permission'))->render()))->render();
        }
        return view('seguridad.permiso.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Permission $permission)
    {
        //
        $input = Request::except('_token');

        //$permission->name = $input['name'];
        //$permission->slug = $input['slug'];
        //$permission->model = $input['model'];
        //$permission->description = $input['description'];
        $json = new JSON_retorno();

        if ($permission->update($input))
        {
            $tabSeleccionado = $permission->id;
            $view = view('seguridad.tabs.permission',compact('tabSeleccionado'))->render();

            $json->setHtml('#tab_permission',$view);

            $json->setMensaje('Permiso modificado','success');

            $json->setSelectElement('select_permiso_'.$permission->id);

            return $json->getAllJSON();
        }

        $json->setMensaje('No see ha podido eliminar el permiso','danger','true');

        return $json->getAllJSON();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteMsg(Permission $permission){

        $msg = Ajaxis::BtDeleting('Cuidado!!','¿Esta seguro de eliminar el Permiso "'.$permission->name.'" ?','/permission/'. $permission->id . '/delete');
        if(Request::ajax())
        {
            return $msg;
        }
        return $msg;
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        if (Request::ajax())
        {
            $json = new JSON_retorno();
            $permisos = Permission::get();
            $view = view('seguridad.tabs.permission',['permission'=>$permisos])->render();

            $json->setHtml('#tab_permission',$view);
            $json->setMensaje('Permiso eliminado','success');
            return $json->getAllJSON();
        }
    }
}
