<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;



class ImagenController extends Controller
{
    //
    public function index()
    {
        return view('imagen.index_2');
    }

//    public function seleccionar()
//    {
//        return view('imagen.1_seleccionar');
//    }
    public function seleccionar_perfil()
    {
        $modal = view('imagen.perfil.comp_modal_imgen_perfil')->render();
        return $modal;
    }

    public function cortar_perfil(Request $request)
    {
        //dd($request->all());
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

    public function cortar_escudo(Request $request)
    {
        //dd($request->all());
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

//    public function recortar(Request $request){
//        dd(\Request::all());
//
//        $imagen = $request->file('imagen');
//
//
//        $ruta = 'imagenes/temp/';
//        $nombre = str_random(40).'.'.$imagen->getClientOriginalExtension();
//        $ruta_imagen = $ruta . $nombre;
//
//        $imagen->move($ruta,$nombre);
//
//
//
////        $int_img->resize(600,null,function ($constraint){
////            $constraint->aspectRatio();
////        });
//
//        $int_img->save($ruta .$nombre);
//
//
//        Session::put('ruta_imagen',$ruta_imagen);
//
//        return json_encode(array('url_image'=>$ruta_imagen,'div_mostrar'=>'#seleccionar_corte'));
//
//    }
//
//    public function cortar()
//    {
//        dd(\Request::all());
//        $input = \Request::except('_token');
//
//        $x = $input['x'];
//        $y = $input['y'];
//        $w = $input['w'];
//        $h = $input['h'];
////
//
//
//        $ruta_imagen = Session::get('ruta_imagen');
//
//        $int_img = Image::make($ruta_imagen);
//
//        $int_img->crop($w,$h,$x,$y);
//
//        $int_img->fit(600);
//
//        $int_img->save($ruta_imagen);
//
//        //return view('imagen.4_guardar',compact('ruta_imagen'));
//
//        return JSON_retorno::create()->setMensaje('Imagen Cargada','success')->setHtml('#img_terminada',"<img id='img_final' src='$ruta_imagen' > <script>$('#img_final').attr('src',$('#img_final').attr('src')+'?'+Math.random())</script>")->getAllJSON();
//    }
//
//    public function store($url_imagen)
//    {
//
//
//    }
}