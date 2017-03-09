<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoOrganizacionCompetencia extends Model
{
    use Funciones,Trait_Fechas;

    protected $table ='tipos_organizacion_competencia';
    //
    protected $fillable = ['nombre','descripcion'];

    /* ----------------- Relaciones ---------------------------*/

    public function competencias(){
        return $this->hasMany(Competencia::class);
    }

    /* ----------------- Relaciones ---------------------------*/

    public static function select()
    {
        return self::getForSelect2(TipoOrganizacionCompetencia::get(),'Sin Tipos de Organizacion');

    }


}

