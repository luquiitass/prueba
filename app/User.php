<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Bican\Roles\Traits\HasRoleAndPermission;
use Bican\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;

class User extends Authenticatable  implements  HasRoleAndPermissionContract
{
    use  HasRoleAndPermission;
    use Funciones;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre','apellido','fecha_nacimiento','email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    //***********Relaciones******************

    public function competencias(){
        return $this->belongsToMany(Competencia::class)->withTimestamps();
    }

    public function equipos(){
        return $this->belongsToMany(Equipo::class)->withTimestamps();
    }

    public function jugador(){
        return $this->hasOne(Jugador::class);
    }

    //**************** Fin de Relaciones**********************



    //**Consultass**

    /************* Metodos add *********************/

    public function addJugador($array)
    {
        if ($this->poseeJugador())
        {
            if ($this->jugador->poseeEquipo())
            {
                throw new \Exception('Este jugador ya pertenece a un equipo.');
            }
            return $this->jugador;
            //if ($this->jugador->)
        }
        $data = array(
            'nombre'=>$this->nombre,
            'apellido'=>$this->apellido,
            'fecha_nacimiento'=>$this->fecha_nacimiento,
            'user_id'=>$this->id,
            'posicion_id'=>array_get($array,'posicion_id',null),
            'numero'=>array_get($array,'numero',null),
            'alias'=>array_get($array,'alias',null),
            'altura'=>array_get($array,'altura',null),
            'peso'=>array_get($array,'peso',null),
            );

        return new Jugador($data);
    }

    public function poseeJugador()
    {
        return isset($this->jugador);
    }


}
