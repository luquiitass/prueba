<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posicion extends Model
{
    use Funciones;
    //
    protected $table = 'posiciones';

    /*************** Relaciones ****************/

    public function jugadores()
    {
        return $this->hasMany(Jugador::class);
    }

    public static function forSelect()
    {
        return self::getForSelect(Posicion::get(),'No existe posiciones de jugo cargadas','Seleccionar posicion');
    }

    /*************** Relaciones ****************/
}
