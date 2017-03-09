<?php

namespace App\Http\Controllers;

use App\Contacto;
use App\Equipo;
use App\Http\JSON_retorno;
use App\Telefono;
use Illuminate\Http\Request;
use App\Http\Requests\ContactoRequestUpdate;
use App\Http\Requests\ContactoRequestStore;

use App\Http\Requests;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $json = new JSON_retorno();
        $equipo = Equipo::first();

        $json->setHtml('#tabs',view('equipo.tabs.tabs',compact('equipo'))->render());

        $json->setMensaje('Medio Anda','success');

        $json->setDesactivarTabs();
        $json->setTabActivo( \Request::input('tab') );
        $json->setTabActivo( \Request::input('tab2') );

        return $json->getAllJSON();


        //return view('contacto.index',compact('contacto'));
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
    public function update(ContactoRequestUpdate $request, $id)
    {
        $input = \Request::except('_token','telefono');
        $telefonos = \Request::get('telefono');
        if (\Request::ajax())
        {
            $contacto =Contacto::find($id);

            //$telefonos = Telefono::create($telefonos);
            $equipo = $contacto->equipo;

            //$contacto->update($input);
            $contacto->removerTelefonos();
            $contacto->addTelefonos($telefonos);

            $json =new JSON_retorno();
            $json->setHtml('#tabs',view('equipo.tabs.tabs',compact('equipo'))->render());
            $json->setDesactivarTabs();
            $json->setTabActivo('config');
            $json->setTabActivo('conf_contacto');
            $json->setMensaje('Anda de maravilla ak modifica un contacto '.$equipo->nombre,'success','true');

            return $json->getAllJSON();
        }
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
}
