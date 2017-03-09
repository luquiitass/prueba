<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    //
    protected $table = 'estados';

    public $timestamps = true;

    protected $fillable = ['nombre','descripcion','tabla'];

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
