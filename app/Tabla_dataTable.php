<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 09/12/16
 * Time: 20:51
 */

namespace App;


use PhpParser\Node\Expr\New_;

class Tabla_dataTable
{
    public $url;
    public $tabla_id;
    public $columnas;

    public static function create($url, $tabla_id, $columnas)
    {
        $tabla = new Tabla_dataTable();
        $tabla->url = url($url);
        $tabla->tabla_id = $tabla_id;
        $tabla->columnas = array();
        foreach ($columnas as $columna) {
            try {
                $tabla->columnas[] = new Columna($columna[0], $columna[1], isset($columna[2]) ? $columna[2] :null, isset($columna[3]) ? $columna[3] : null);
            }catch (\Exception $e){
                throw new \Exception('Error al creacr la coluna '.$tabla[0]);
            }
        }
        return $tabla;
    }


}

class Columna
{
    public $nombre_col;
    public $nombre;
    public $searchable;
    public $orderable;


    public function __construct($nombre_col,$nombre,$searchable,$orderable)
    {
        $this->nombre_col=$nombre_col;
        $this->nombre = $nombre;
        $this->searchable = is_null($searchable)?false:$searchable;
        $this->orderable = is_null($orderable)?false:$orderable;
    }

}

