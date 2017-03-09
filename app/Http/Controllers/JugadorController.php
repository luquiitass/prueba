<?php

namespace App\Http\Controllers;

use App\Equipo;
use App\Http\JSON_retorno;
use App\Http\Requests\JugadorConuserRequestStore;
use App\Http\Requests\JugadorRequestStore;
use App\Jugador;
use Amranidev\Ajaxis\Ajaxis;
use App\User;
use Illuminate\Http\JsonResponse;
use Request;

class JugadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Equipo $equipo)
    {
        return view('equipo.unEquipo.jugadores',compact('equipo'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Equipo $equipo)
    {
        //
        if (\Request::ajax())
        {
            $body = view('jugador.comp_create',compact('equipo'))->render();

            return view('modals.modal_lg',compact('body'))->render();
        }
        return view('jugador.comp_create',compact('equipo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Equipo $equipo,JugadorRequestStore $request)
    {
        $input = Request::except('_token');
        $user_id = $input['user_id'];

        //dd($input);

        $nombre_image = explode('/',$input['img_perfil']);
        $nombre_image = isset($input['img_perfil'])?array_last($nombre_image):'';
        $input['foto_perfil'] = $nombre_image;


        if (Request::ajax()){
            $json = new JSON_retorno();
            try{
                if (!empty($user_id) && $user=User::findOrFail($user_id))
                {
                    $equipo->addJugador($input,$user);
                }else{
                    $equipo->addJugador($input);
                    //$jugador = new Jugador($input);
                }

                //$equipo->addJugador($jugador);

                $view = view('equipo.tabs.jugadores',compact('equipo'))->render();

                $json->setHtml('#jugadores',$view);
                $json->setMensaje('Jugador creado','success');
            }catch (\Exception $e){
                $json->setMensaje($e->getMessage(),'danger','true');
            }
        }
        return $json->getAllJSON();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Jugador $jugador)
    {
        return view('jugador.show',compact('jugador'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipo $equipo,Jugador $jugador)
    {
        if (Request::ajax())
        {
            $view_form = view('jugador.comp_edit',compact('equipo','jugador'))->render();
            return view('modals.modal_lg',['body'=>$view_form])->render();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jugador $jugador)
    {
        //dd($jugador);
        $input = Request::except('_token');
        $user_id = $input['user_id'];

        $nombre_image = explode('/',$input['img_perfil']);
        $nombre_image = isset($input['img_perfil'])?array_last($nombre_image):'';

        //dd($input);

        if (Request::ajax()){
            $json = new JSON_retorno();
            try{
                //dd($jugador);

                if (!empty($user_id) && $user=User::findOrFail($user_id))
                {
                    $jugador->save($user->toArray());
                }else{

                    $jugador->save(array_except($input,['user_id','equipo_id']));
                    //$jugador = new Jugador($input);
                }

                //$equipo->addJugador($jugador);
                $jugador->setFotoPerfil($nombre_image);

                $view = view('equipo.tabs.jugadores',['equipo'=>$jugador->equipoActual()])->render();

                $json->setHtml('#jugadores',$view);
                $json->setMensaje('Jugador Modificado','success');
            }catch (\Exception $e){
                $json->setMensaje($e->getMessage(),'danger','true');
            }
        }
        return $json->getAllJSON();

    }


    public function bajaJugadorMsg(Jugador $jugador,Equipo $equipo)
    {
        $msg = Ajaxis::BtDeleting('Cuidado!!','¿Esta seguro de eliminar la jugador '.$jugador->name.' ?','/jugador/'. $jugador->id . '/'.$equipo->id.'/bajaJugador');
        if(Request::ajax())
        {
            return $msg;
        }
        return $msg;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bajaJugador(Jugador $jugador,Equipo $equipo)
    {
        $json = new JSON_retorno();
        try{
            if (is_null($jugador->user_id)){
                $jugador->delete();
            }else{
                $pivot =  $jugador->equipoActual()->pivot;
                $pivot->actual = 0;
                $pivot->update();
            }
            //dd($jugador->equipoActual()->pivot);
            $view = view('equipo.tabs.jugadores',compact('equipo'))->render();
            $json->setHtml('#jugadores',$view);
            $json->setMensaje('Jugador Eliminado','success');
        }catch (\Exception $e){
            $json->setMensaje($e->getMessage(),'danger','true');
        }

        return $json->getAllJSON();
    }


    public function deleteMsg(Jugador $jugador,Equipo $equipo)
    {
        $msg = Ajaxis::BtDeleting('Cuidado!!','¿Esta seguro de eliminar la jugador '.$jugador->name.' ?','/jugador/'. $jugador->id . '/'.$equipo->id.'/delete');
        if(Request::ajax())
        {
            return $msg;
        }
        return $msg;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jugador $jugador,Equipo $equipo)
    {
        $json = new JSON_retorno();
        try{

            $view = view('equipo.tabs.jugadores',compact('equipo'))->render();
            $json->setHtml('#jugadores',$view);
            $json->setMensaje('Jugador Eliminado','success');
        }catch (\Exception $e){
            $json->setMensaje($e->getMessage(),'danger','true');
        }

        return $json->getAllJSON();
    }
}
