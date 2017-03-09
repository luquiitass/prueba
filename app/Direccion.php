<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    //
    protected $table = 'direcciones';

    protected $fillable = ['calle','altura','piso','dpto','pais_id','provincia_id','localidad_id'];

    public function estadio()
    {
        return $this->belongsTo(Estadio::class);
    }

    public function pais()
    {
        return $this->belongsTo(Pais::class);
    }

    public function provincia()
    {
        return $this->belongsTo(Provincia::class);
    }

    public function localidad()
    {
        return $this->belongsTo(Localidad::class);
    }

    /*   Funciones  */
    public function direccionCompleta()
    {
        return $this->pais->nombre.", ".$this->provincia->nombre.", ".$this->localidad->nombre.', '.$this->calle." ".$this->altura;
    }
}
