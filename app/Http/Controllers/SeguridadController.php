<?php

namespace App\Http\Controllers;

use Bican\Roles\Models\Permission;
use Bican\Roles\Models\Role;
use Illuminate\Http\Request;

use App\Http\Requests;


class SeguridadController extends Controller
{
    //
    public function index()
    {
        $permission = Permission::orderBy('model')->get();
        $roles = Role::get();

        return view('seguridad.index',compact('permission','roles'));
    }
}
