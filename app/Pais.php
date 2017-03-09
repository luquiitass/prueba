<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Funciones;

/**
 * Class PaiseController
 *
 * @author  The scaffold-interface created at 2016-09-17 11:22:08am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Pais extends Model
{
    use Funciones;

    public $timestamps = false;

    protected $table = 'paises';

    protected $fillable = [
        'nombre','created_at',
    ];

    public function AjaxisEditPais()
    {
        return array(
            ['type' => 'text', 'value' => $this->nombre, 'name' => 'nombre', 'key' => 'Nombre :']
        );
    }

    public static function AjaxisCreatePAis()
    {
        return array(
          ['type' => 'text', 'value'=> '', 'name'=> 'nombre','key'=> 'Nombre'],
        );
    }

    public function provincias(){
        return $this->hasMany(Provincia::class)->orderBy('nombre');;
    }

    public function hasProvincia($nombre, $atributo = 'nombre')
    {
        return $this->provincias()->where($atributo,'=',$nombre)->get()->count() > 0? true : false ;
    }


    public static function listForSelect()
    {
        return self::getForSelect(Pais::get(),'No se han registrado paises','Seleccionar un Pais');
    }

}
