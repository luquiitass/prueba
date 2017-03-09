<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fecha extends Model
{
    //
    protected $table = 'fechas';

    protected $fillable = ['nombre','grupo_id','fecha_id'];

    // ----------------Relaciones---------------------
    public function grupo(){
        return $this->belongsTo(Grupo::class);
    }

    public function partidos(){
        return $this->hasMany(Partido::class)
            ->leftJoin('equipos as eq1','partidos.eq1_id','=','eq1.id')
            ->leftJoin('equipos as eq2','partidos.eq2_id','=','eq2.id')
            ->leftJoin('equipos as eql','partidos.eq_local_id','=','eql.id')
            ->select('partidos.*',
                'eq1.nombre as eq1',
                'eq1.foto_escudo as eq1_escudo',
                'eq2.nombre as eq2',
                'eq2.foto_escudo as eq2_escudo',
                'eql.nombre as eql');

    }

    public function equipoLibre(){
        return $this->belongsTo(Equipo::class);
    }

    // ----------------Relaciones---------------------

    public function crearPartidos($equipos)
    {
        $catEquipos = count($equipos);
        $partidos = array();

        $inicio= 0;

        $numPartido=1;

        $atributosPartido = ['numero' => $numPartido, 'eq1_id' =>$equipos[$inicio]['id'], 'eq2_id' => $equipos[$inicio+1]['id'], 'eq_local_id' => null, 'gol_eq1' => null, 'gol_eq2' => null, 'hora' => null, 'date' => null, 'edtadio_id' => null, 'fecha_id' => $this->id, 'estado' => 'Pendiente', 'comentario' => null];


        $partidos[] = Partido::create($atributosPartido);

        array_pull($equipos,$inicio);
        array_pull($equipos,$inicio+1);

        $inicio = $inicio+2;
        $fin=$catEquipos-1;


        while (count($equipos) > 1){
            $numPartido = $numPartido + 1;


            $atributosPartido = ['numero' => $numPartido, 'eq1_id' => array_first($equipos)['id'], 'eq2_id' => last($equipos)['id'], 'eq_local_id' => null, 'gol_eq1' => null, 'gol_eq2' => null, 'hora' => null, 'date' => null, 'edtadio_id' => null, 'fecha_id' => $this->id, 'estado' => 'Pendiente', 'comentario' => null];

            array_pull($equipos,$fin);
            array_pull($equipos,$inicio);

            $fin= $fin-1;
            $inicio=$inicio+1;

            $partido = Partido::create($atributosPartido);
            $partidos[] = $partido;


        }
        if(!$catEquipos % 2 == 0){

            $this->equipo_libre_id = last($equipos)['id'];
            array_pull($equipos,count($equipos)-1);
            $this->save();
        }
        return $partidos;
    }
}
