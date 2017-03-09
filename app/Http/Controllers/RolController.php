<?php

namespace App\Http\Controllers;

use App\Equipo;
use App\Jugador;
use App\Localidad;
use App\Pais;
use App\Provincia;
use App\User;
use App\Competencia;
use Bican\Roles\Models\Permission;
use Bican\Roles\Models\Role;
use App\Http\JSON_retorno;
use Request;
use Amranidev\Ajaxis\Ajaxis;
use App\Http\Requests\RolRequestStore;


class RolController extends Controller
{
    //
    public function index(){
        $jugador = Jugador::find('47');
         dd($jugador->equipos);
    }

    public function store(RolRequestStore $request){

        $input = Request::except('_token','permisos');
        $permisos = array();

        if (array_has(Request::all(),'permisos')) {

           $permissions = Request::get('permisos');

           foreach ($permissions as $key => $value) {
               $permisos[] = $key;
           }
       }


        if (Request::ajax())
        {
            $json = new JSON_retorno();

            if ($role = Role::create($input))
            {
                $role->attachPermission($permisos);

                $tabSeleccionado = $role->id;
                $view = view('seguridad.tabs.roles',compact('tabSeleccionado'))->render();

                $json->setHtml('#tab_roles',$view);

                $json->setMensaje('Rol Creado','success');

            }else{
                $json->setMensaje('no se ha crear el rol','danger');
            }
            return $json->getAllJSON();
        }
        $role = new Role();
        $role->save($input);
        $role->attachPermission($permisos);
        return redirect()->to('seguridad');
    }

    public function create(){

        return view('seguridad.roles.create',compact('permisos'));
    }

    public function edit(Role $role){
        if (\Request::ajax())
        {
            $body= view('seguridad.roles.comp_edit',compact('role'))->render();
            return view('otros.modal2',compact('body'));
        }
        return view('seguridad.roles.edit',compact('role','permisos'));
    }

    public function update(Role $role){

        $input = Request::except('_token','permisos');

        $permissions = Request::get('permisos');
        $permisos = array();

        foreach ($permissions as $key => $value){
            $permisos[]= $key;
        }

//        $role->name = $input['name'];
//        $role->slug = $input['slug'];
//        $role->description = $input['description'];
//        $role->save();



        if (Request::ajax())
        {
            $json= new JSON_retorno();

            if ($role->update($input))
            {
                $role->detachAllPermissions();
                $role->attachPermission($permisos);

                $view = view('seguridad.tabs.roles',['tabSeleccionado'=>$role->id])->render();

                $json->setHtml('#tab_roles',$view);

                $json->setMensaje('Rol Modificado','success');

            }else{
                $json->setMensaje('No se ha podido eliminar el rol','danger');
            }
            return $json->getAllJSON();
        }

        return redirect()->to('seguridad');
    }

    public function DeleteMsg(Role $role)
    {
        $msg = Ajaxis::BtDeleting('Cuidado!!','¿Esta seguro de eliminar el Rol "'.$role->name.'" ?','/role/'. $role->id . '/delete');
        if(Request::ajax())
        {
            return $msg;
        }
        return $msg;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //cuando se cree una direccion tendre que validar ante de eliminar si no posee direcciones asociadas
        if (Request::ajax())
        {
            if ($role->delete())
            {
                $json = new JSON_retorno();
                $view = view('seguridad.tabs.roles')->render();
                $json->setHtml('#tab_roles',$view);
                $json->setMensaje('Rol eliminado','success');

                return $json->getAllJSON();
            }

        }

        $role->delete();
        return url('seguridad');
    }
}
