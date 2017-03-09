<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    //
    protected $table = 'contactos';

    protected $fillable= ['id','email','nombre'];

    public function addTelefonos($numerosTelefono)
    {
        if (!is_array($numerosTelefono)){
            $numerosTelefono = array($numerosTelefono);
        }
        foreach ($numerosTelefono as $numero)
        {
            if (Telefono::exist($numero))
            {
                if (! $this->hasTelefono($numero))
                {
                    //dd('no deberia entrar');
                    $this->telefonos()->attach( Telefono::getTelefono($numero)->id );
                }
            }else
            {
                $this->telefonos()->attach( Telefono::create(['numero'=>$numero]));
            }
        }
    }

    public function removerTelefonos(){
        return $this->telefonos()->detach();
    }

    public function telefonos()
    {
        return $this->belongsToMany(Telefono::class)->withTimestamps();
    }

    public function equipo()
    {
        return $this->hasOne(Equipo::class);
    }

    public function hasTelefono($value){
        return $this->telefonos()->where('numero',$value)->count() > 0?true:false;
    }
}
