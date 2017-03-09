<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fase extends Model
{
    protected $table = 'fases';

    public static $estados = [1=>'Activa',2=>'Espera',0=>'Cerrada'];

    protected $fillable = ['nombre','descripcion','torneo_id','estado'];

    //


    //----------------Relaciones-------------------------
    public function torneo(){
        return $this->belongsTo(Torneo::class);
    }


    public function grupos(){
        return $this->hasMany(Grupo::class);
    }


    //----------------Relaciones-------------------------


    public function descripcionEstado(){
        switch ($this->estado){
            case 'Activa':
                return 'La Torneo se encuentra en esta fase';
            case 'Espera':
                return 'El torneo no ha llegado a esta fase';
            case 'Cerrada':
                return 'El Torneo Ya a finalizado esta fase';
        }
    }



    public function crearGrupo(){
        $atributosGrupo = ['nombre'=>'grupo-liga','fase_id'=>$this->id];
        $grupo = new Grupo($atributosGrupo);
        $grupo->save();
        return $grupo;
    }


}
