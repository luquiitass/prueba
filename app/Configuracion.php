<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    //
    protected $table = 'configuraciones';

    public $timestamps = true;

    protected $fillable = ['nombre','estado','tabla'];

    public static function getTablas()
    {
        $retorno = array();
        $tables = \DB::select('SHOW TABLES');
        //dd($tables);
        foreach($tables as $table)
        {
            foreach ($table as $key => $value)
                $retorno[$value] = $value;
        }

        return $retorno;
    }
}
