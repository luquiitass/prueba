<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estadio extends Model
{
    //
    protected $table = 'estadios';

    protected $fillable = ['nombre','alias','capasidad','iluminado','arquitectos','dueños','inauguracion'];

    public function direccion(){
        return $this->hasOne(Direccion::class);
    }

    public function equipos()
    {
        return $this->belongsToMany(Equipo::class)->withTimestamps();
    }

    public static function exist($estadio)
    {
        return Estadio::where('nombre','=',$estadio)->get()->count() > 0?true:false;
    }

    public  static function getEstadio($nomberEstadio)
    {
        return Estadio::where('nombre','=',$nomberEstadio)->first();
    }
}
