<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManagerStatic as Image;

class Jugador extends Model
{
    //
    protected $table = 'jugadores';

    public $timestamps = false;

    protected $fillable = [
        'nombre','apellido','fecha_nacimiento','alias', 'peso','altura','numero','posicion_id','user_id','foto_perfil'
    ];

    /***********************  Get Set Personalizados***********************************/

    public function setUserIdAttribute($value){
        $this->attributes['user_id']= empty($value)?null:$value;
    }

    /***********************  Fin Get-Set Personalizados***********************************/



    /* Relaciones de jugador*/
    public function posicion()
    {
        return $this->belongsTo(Posicion::class);
    }

    public function equipoActual(){
        return $this->belongsToMany(Equipo::class)
            ->with('jugadores')
            ->wherePivot('actual',1)
            ->withPivot('actual')
            ->withTimestamps()
            ->first();
    }

    public function equipos()
    {
        return $this->belongsToMany(Equipo::class)->withTimestamps();
    }

    public function poseeEquipo(){
        return ! is_null($this->equipoActual());
    }

    public static function existWithUser($jugador){
        return isset($jugador->user_id)?Jugador::where('user_id','=',$jugador->user_id)->count()>0:false;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    function getFotoPerfil()
    {
        $default = '/img/avatar.png';
        if (isset($this->foto_perfil))
        {
            return file_exists('imagenes/original/'.$this->foto_perfil)?'/imagenes/original/' . $this->foto_perfil : $default;
        }

        return $default;
    }

    function getFotoPerfilThumb()
    {
        $default = '/img/avatar.png';
        if (isset($this->foto_perfil)) {
            return file_exists('imagenes/perfil/' . $this->foto_perfil) ? '/imagenes/perfil/' . $this->foto_perfil : $default;
        }
        return $default;
    }

    public function setFotoPerfil($url){
        $url = !empty($url)?$url:'nada.jpl';
        $ruta_imagen_temporal = 'imagenes/temp/'.$url;
        $ruta_original = 'imagenes/original/';
        $ruta_perfil = 'imagenes/perfil/';

        if (file_exists($ruta_imagen_temporal))
        {
            $img_perfil = Image::make($ruta_imagen_temporal);
            $nombre_imagen = $this->id.$img_perfil->extension;
            copy($ruta_imagen_temporal,$ruta_perfil . $nombre_imagen);
            rename($ruta_imagen_temporal,$ruta_original . $nombre_imagen);
            Image::make($ruta_perfil . $nombre_imagen)->fit(128)->save();

            $this->foto_perfil = $nombre_imagen;
            $this->save();
        }
    }

}
