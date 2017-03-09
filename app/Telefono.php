<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    //
    protected $table = 'telefonos';

    protected $fillable = ['numero'];

    public function contactos()
    {
        return $this->belongsToMany(Contacto::class)->withTimestamps();
    }

    public static function exist($numero){
        return Telefono::where('numero','=',$numero)->get()->count() > 0?true:false;
    }

    public static function getTelefono($telefono)
    {
        return Telefono::where('numero','=',$telefono)->first();
    }
}
