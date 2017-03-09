<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    //
    protected $table = 'grupos';

    protected $fillable = ['nombre','fase_id'];

    //--------------Relaciones-----------------------

    public function fase(){
        return $this->belongsTo(Fase::class);
    }

    public function equipos(){
        return $this->belongsToMany(Equipo::class)->withTimestamps();
    }

    public function fechas()
    {
        return $this->hasMany(Fecha::class);
    }
    //--------------Relaciones-----------------------

    public function crearFechas(){
        $fechas = array();
        $fecha = null;
        $catEquipos= count($this->equipos);
        $fin = ($catEquipos%2==0)?$catEquipos:$catEquipos-1;

        for ($i=0;$i < $fin ; $i ++){
            $atributosFecha = ['nombre'=>'fecha ' . ($i +1),'fecha_id'=>is_null($fecha)?null:$fecha->id,'grupo_id'=>$this->id];
            $fecha = new Fecha($atributosFecha);
            $fecha->save();
            $fechas[]=$fecha;
        }
        return $this->fechas()->get();
    }

    public function crearPartidosPorFecha(){
        $retorno=array();
        $fechas = $this->fechas->all();
        $equipos = $this->equipos->toArray();
        $cantFechas = count($fechas);

        for ($i= 0;$i < $cantFechas; $i++){
            $retorno[]=$fechas[$i]->crearPartidos(Funciones::corrimienDerechaExepUno($equipos,$i));
        }
        return $retorno;
    }

    public function crearTablaPosiciones(){

    }

    public function asociarEquipos($equipos){
        $this->equipos()->attach(Funciones::t_array_id($equipos));
    }

}
