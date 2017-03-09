<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoFase extends Model
{
    //
    protected $table = 'tipos_fase';
    protected $fillable = ['nombre','descripcion','tipo_torneo_id'];

    public function tipoTorneo(){
        return $this->belongsTo(TipoTorneo::class);
    }
}
