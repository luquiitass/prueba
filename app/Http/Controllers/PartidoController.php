<?php

namespace App\Http\Controllers;

use App\Partido;
use Illuminate\Http\Request;

use App\Http\Requests;

class PartidoController extends Controller
{
    public function edit(Partido $partido){
        $body = view('partido.comp_edit',compact('partido'))->render();
        $modal = view('modals.modal2',compact('body'))->render();
        return $modal;
    }
}
