<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    protected $table ='partidos';

    protected $fillable = ['eq1_id','eq2_id','fecha_id','estado'];

    protected $dates=['fecha_hora'];


    public function equipo1(){
        return $this->belongsTo(Equipo::class,'eq1_id');
    }

    public function equipo2(){
        return $this->belongsTo(Equipo::class,'eq2_id');
    }
    public function equipoLocal(){
        return $this->belongsTo(Equipo::class,'eq_local_id');
    }


    public function fecha(){
        return $this->belongsTo(Fecha::class);
    }

    public function date(){
        return $this->fecha_hora->format('d-m-Y');
    }

    public function time(){
        return $this->fecha_hora->toTimeString();
    }

    public function selectEquipos(){
        $retorno[$this->equipo1->id] = $this->equipo1->nombre;
        $retorno[$this->equipo2->id] = $this->equipo2->nombre;
        return $retorno;
    }

    public function getEq1EscudoAttribute(){
        $default = asset('/img/escudo_default_2.png');
        if (!is_null($this->attributes['eq1_escudo']))
        {
            return asset($this->attributes['eq1_escudo']);
        }
        return $default;
    }
    public function getEq2EscudoAttribute(){
        $default = asset('/img/escudo_default_2.png');
        if (!is_null($this->attributes['eq2_escudo']))
        {
            return asset($this->attributes['eq2_escudo']);
        }
        return $default;
    }

    public function isPendiente(){
        return $this->estado == 'Pendiente';
    }
    //
}
