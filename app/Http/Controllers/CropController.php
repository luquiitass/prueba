<?php

namespace App\Http\Controllers;

use Request;
use Intervention\Image\ImageManagerStatic as Image;

class CropController extends Controller
{
    function crop_perfil(){
        return view('crop.perfil.index');
    }

    function crop_escudo(){
        return view('crop.otros.index_escudo');
    }

    function crop_portada(){
        return 'Portada';
    }

    function create()
    {

    }

    function store_perfil(Request $request)
    {
        $imagen = $request->file('imagen');

        $w = $request->get('w');
        $h = $request->get('h');
        $x = $request->get('x');
        $y = $request->get('y');

        $ruta = 'imagenes/temp/';
        $nombre = str_random(60).'.'.$imagen->getClientOriginalExtension();
        $ruta_imagen = $ruta . $nombre;

        $imagen->move($ruta,$nombre);


        $int_img = Image::make($ruta_imagen);

        //dd($int_img);
        $int_img->crop((int)$w,(int)$h,(int)$x,(int)$y);

        //$int_img->fit(600);

        $int_img->save($ruta_imagen);

        return json_encode(array('url_imagen'=>url($ruta_imagen)));
    }

    function store_escudo(Request $request)
    {
        $imagen = $request->file('imagen');

        $w = $request->get('w');
        $h = $request->get('h');
        $x = $request->get('x');
        $y = $request->get('y');

        $ruta = 'imagenes/temp/';
        $nombre = str_random(60).'.'.$imagen->getClientOriginalExtension();
        $ruta_imagen = $ruta . $nombre;

        $imagen->move($ruta,$nombre);


        $int_img = Image::make($ruta_imagen);

        //dd($int_img);
        $int_img->crop((int)$w,(int)$h,(int)$x,(int)$y);

        //$int_img->fit(600);

        $int_img->save($ruta_imagen);

        return json_encode(array('url_imagen'=>url($ruta_imagen)));
    }

    function store_portada()
    {

    }

    function store(){

    }
}
