<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 09/10/16
 * Time: 17:03
 */

namespace App;


trait Funciones
{
    public static function getForSelect($listObject, $mensajeSinDatos='Sin datos', $mensajeDeSeleccion='selecciones una opcion')
    {
        $objects = array();
        if ($listObject->count()==0)
        {
            $objects['seleccionar']= $mensajeSinDatos;

        }else{
            foreach ($listObject as $object)
            {
                $objects[$object->id]= isset($object->name)?$object->name:$object->nombre;
            }
            $objects['seleccionar']= '*'.$mensajeDeSeleccion;
        }

        return array_sort($objects, function ($value) {
            return $value;
        });
    }

    public static function getForSelect2($listObject, $mensajeSinDatos='Sin datos')
    {
        $objects = array();
        if ($listObject->count()==0)
        {
            $objects['-1']= $mensajeSinDatos;

        }else{
            foreach ($listObject as $object)
            {
                $objects[$object->id]= isset($object->name)?$object->name:$object->nombre;
            }
        }

        return array_sort($objects, function ($value) {
            return $value;
        });
    }

    public static function scopeLike($query,$col,$value)
    {
        foreach ($col as $co) {
            $query->orWhere($co, 'LIKE', "%$value%");
        }
        return $query;
    }

    public static function scopeColum($query,$colum)
    {
        return $query->select($colum);
    }

    public static function scopeT_OrWhere($query,$columna,$operador,$data){
        if (is_array($data)){
            foreach ($data as $unDato){
                $query->orWhere($columna,$operador,$unDato);
            }
        }else{
            $query->orWhere($columna,$operador,$data);
        }
        return $query;
    }

    public static function scopeT_Where($query,$columna,$operador,$data){
        if (is_array($data)){
            foreach ($data as $unDato){
                $query->where($columna,$operador,$unDato);
            }
        }else{
            $query->where($columna,$operador,$data);
        }
        return $query;
    }



    public function t_attach($class,$datas)
    {
        if (is_array($datas)) {
            foreach ($datas as $data) {
                $this->$class()->attach($data);
            }
        }else
        {
            $this->$class()->attach($datas);
        }

    }

    public function t_detach($class)
    {
        $this->$class()->detach();
    }


    public function t_has($tabla=null,$valor=null,$dato=null)
    {
        if (!empty($tabla) && is_null($valor) && is_null($dato)){
            return $this->has($tabla);
        }elseif(is_null($tabla) && !empty($valor) && empty($dato) ) {
            return $this->where($valor,$dato)->count() > 0;
        }else{
            return $this->$tabla->where($valor,$dato)->count() > 0;
        }
    }

    private function has($tabla){
        return $this->$tabla->count() >0;
    }

    public function t_get($tabla,$columna,$dato){
        return $this->$tabla()->where($columna,'=',$dato)->first();
    }

    public static function t_array_id($array)
    {
        $retorno=array();
        foreach ($array as $value)
        {
            $retorno[]=$value->id;
        }
        return $retorno;
    }

    public static function corrimienDerechaExepUno($array,$numeroDeVueltas){
        if ($numeroDeVueltas<0){
            echo 'el numero de vultas debe ser mayor a 1';
            return false;
        }elseif ($numeroDeVueltas==0){
            return $array;
        }

        $retorno[]=$array[0];
        $retorno[]=last($array);

        array_pull($array,count($array)-1);
        array_pull($array,0);

        $ret=array_merge($retorno,$array);

        //dd($ret);
        if ($numeroDeVueltas > 1){
            $ret = Funciones::corrimienDerechaExepUno($ret,$numeroDeVueltas-1);
        }
        return $ret;
    }



}