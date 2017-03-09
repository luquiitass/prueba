<?php

namespace App;

use App\Funciones;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LocalidadeController
 *
 * @author  The scaffold-interface created at 2016-09-21 07:55:19pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Localidad extends Model
{
    use Funciones;

    public $timestamps = false;

    protected $table = 'localidades';

    public function provincia()
    {
        return $this->belongsTo(Provincia::class);
    }

    public static function AjaxisCreateLocalidad()
    {
        return array(
            ['type' => 'text', 'value'=> '', 'name'=> 'nombre','key'=> 'Nombre'],
        );
    }

    public function AjaxisEditLocalidad()
    {
        return array(
            ['type' => 'text', 'value' => $this->nombre, 'name' => 'nombre', 'key' => 'Nombre :']
        );
    }

    public function belongs($idProvincia)
    {
        $this->provincia_id = $idProvincia;
    }

    public static function listForSelect()
    {
        return self::getForSelect(Localidad::get());
    }

}
