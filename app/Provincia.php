<?php

namespace App;

use App\Funciones;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProvinciaController
 *
 * @author  The scaffold-interface created at 2016-09-17 11:36:04am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Provincia extends Model
{
    use Funciones;

    public $timestamps = false;

    protected $table = 'provincias';

    public function pais()
    {
        return $this->belongsTo(Pais::class);
    }

    public function localidades(){
        return $this->hasMany(Localidad::class)->orderBy('nombre');;
    }

    public function AjaxisEditProvincia()
    {
        return array(
            ['type' => 'text', 'value' => $this->nombre, 'name' => 'nombre', 'key' => 'Nombre :']
        );
    }

    public static function AjaxisCreateProvincia()
    {
        return array(
         ['type' => 'text', 'value'=> '', 'name'=> 'nombre','key'=> 'Nombre'],
        );
    }

    public function belongs($idPais){
        $this->pais_id = $idPais;
    }

    public function hasLocalidad($nombre , $atributo = 'nombre')
    {
        return $this->localidades()->where($atributo,'=',$nombre)->get()->count() > 0? true : false ;
    }


}
