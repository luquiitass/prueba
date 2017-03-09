<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class PerfilController extends Controller
{
    //
    public function index(User $user){
        return view('perfil.index',compact('user'));
    }
}
