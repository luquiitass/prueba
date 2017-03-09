<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 02/02/17
 * Time: 16:28
 */

namespace App;


use Carbon\Carbon;
use Hamcrest\Core\DescribedAs;
use Jenssegers\Date\Date;

trait Trait_Fechas
{
    public function getCreateAtAttribute($data)
    {
        return new Date($data);
    }

    public function getUpdateAtAttribute($data)
    {
        return new Date($data);
    }

    public function formato_dia_mes_año($data)
    {
        $data = new Date($data);
        return $data->format('l j F Y');
    }


    public function setInicioAttribute($date)
    {
        $this->attributes['inicio']= new Carbon($date);
    }

    public function setFinAttribute($date)
    {
        $this->attributes['fin'] = new Carbon($date);
    }

}