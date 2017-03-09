<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //
    use Funciones;

    protected $table = 'categorias';

    protected $fillable = ['nombre'];

    public $timestamps = true;

    //------------Relaciones-----------------

    public function torneos()
    {
        return $this->belongsToMany(Torneo::class)->withTimestamps();
    }

    public function equipos()
    {
        return $this->hasMany(Equipo::class);
    }

    //---------Fin Relaciones---------------------






    /************ Vistas****************/
    public static function select()
    {
        return self::getForSelect2(Categoria::get(),'Sin Categorias');

    }
    /************Fin Vistas****************/

}
