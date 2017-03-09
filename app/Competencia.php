<?php

namespace App;

use App\Administradores;
use Illuminate\Database\Eloquent\Model;

class Competencia extends Model
{
    use Administradores,Funciones;
    //

    protected $table = 'competencias';
    protected $fillable = ['nombre','nombre','descripcion','estado'];

    public static $estados=['visible'=>'visible','oculto'=>'oculto'];

    /*                  Relaciones                   */
    public function temporadas()
    {
        return $this->hasMany(Temporada::class)->orderBy('inicio','sub');
    }

    public function tipoOrganizacionCompetencia(){
        return $this->belongsTo(TipoOrganizacionCompetencia::class);
    }
    /*                  Relaciones                   */


    /***************** Funciones para las vistas  ********************/
    public function getDatos()
    {
        return array(
            'Creado:'=> $this->created_at,
            'Administradores'=> $this->users()->colum('name')->get()->implode('name',', a'),
        );

    }

    public function temporadaActiva(){
        return $this->temporadas()->first();
    }

    /***************** Fin Funciones para las vistas  ********************/

    /***************Otras funciones**************************************/
    public function validarTempotada($input){
        $temporada = $this->temporadas()->orderBy('fin')->get()->last();

        if (isset($temporada) && $temporada->fin > $input['inicio']){
            throw new \Exception("La fecha inicio debe ser posterior a ".$temporada->fin->format('d/m/Y')." ,es cuando finaliza la ultima temporada");
        };
    }

    /***************Fin Otras funciones**************************************/
    public function getTemporada($id){
        return $this->t_get('temporadas','id',$id);
    }

    public function hasTorneo(){
        $retorno =false;
        foreach ($this->temporadas() as $temporada){
            $retorno = $temporada->t_has('torneo');
        }
        return $retorno;
    }

    public function url(){
        return $this->tipoOrganizacionCompetencia->nombre.'/competencia/'.$this->id.'/portada';
    }
}
