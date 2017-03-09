<?php

namespace App;

use Carbon\Carbon;
use Dompdf\Exception;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Temporada extends Model
{

    use Trait_Fechas,Funciones;

    protected $table = 'temporadas';

    protected $fillable = ['nombre','inicio','fin','competencia_id'];

    public $timestamps = true;

    public $dates = ['inicio','fin'];


    public function inicio_con_formato()
    {
        return $this->formato_dia_mes_año($this->inicio);
    }

    public function fin_con_formato()
    {
        return $this->formato_dia_mes_año($this->fin);
    }






    /*              Relaciones          */
    public function competencia(){
        return $this->belongsTo(Competencia::class);
    }

    public function torneos()
    {
        return $this->hasMany(Torneo::class);
    }

    public function torneoActivo()
    {
        return $this->torneos()->where('inicio','<=',Date::now())->where('fin','>=',Date::now())->first();
    }

    /*              Fin Relaciones          */

    public function sePuedeCrearTorneo($input)
    {
        $f_inicio = new Carbon($input['inicio']);
        $f_fin = new Carbon($input['fin']);
        if ($this->has('torneos','nombre',$input['nombre'])){
            throw new \Exception('Ya existe un Torneo con este nombre, intente con otro.');
        }
        if (!$f_fin->between($this->inicio,$this->fin) && !$f_inicio->between($this->inico,$this->fin))
        {
            throw new Exception("La fecha de Inicio y Finalizacon del torneo deben ser fechas entre $this->inicio_con_formato() y $this->fin_con_formato()");
        }
    }

    public function isAactivo(){
        $actual = Carbon::now();
        return $actual->between($this->inicio,$this->fin);
    }

    public function str_activo()
    {
        return $this->isAactivo()?"Activo":"Inactivo";
    }


    //---------------metodos utiles------------------



}


