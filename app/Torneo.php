<?php

namespace App;

use Carbon\Carbon;
use Dompdf\Exception;
use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
    //
    use Administradores,Trait_Fechas,Funciones;


    protected $table = 'torneos';

    protected $fillable = ['nombre','inicio','fin','descripcion','temporada_id','tipo_torneo_id'];

    protected $dates = ['inicio','fin'];


    public function administradores(){
        return $this->belongsToMany(User::class,'torneo_user','torneo_id','user_id')->withTimestamps();
    }

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class,'categoria_torneo','torneo_id','categoria_id')->withTimestamps();
    }

    public function temporada()
    {
        return $this->belongsTo(Temporada::class,'temporada_id');
    }

    public function equipos()
    {
        return $this->belongsToMany(Equipo::class,'equipo_torneo','torneo_id','equipo_id')->withTimestamps();
    }

    protected function fases()
    {
        return $this->hasMany(Fase::class,'torneo_id');
    }


    public function tipoTorneo(){
        return $this->belongsTo(TipoTorneo::class);
    }
    //No me acuerdo como se llaman estos metodos ;>)

    public function validarDeletEquipo(Equipo $equipo){
        if ($equipo->partidosDeTorneo($this->id)->count() >0){
            throw new \Exception('No es posible eliminar este equipo debido a que se encuentra asociado a un partido');
        }
    }

    public function validarUpdate($input){
        $categoriasActual= $this->equipos->groupBy('categoria_id')->keys();
        $categorias =collect( $input['categorias']);
        //dd($categoriasActual);
        foreach ($categoriasActual as $id_categoria){
            //dd($id_categoria);
            if (!$categorias->contains($id_categoria)){
                throw new \Exception('Este torneo debe tener la categoria "'.Categoria::find($id_categoria)->nombre. '" debido q que posee equipos asociados con la misma');
            }
        }

    }

}
