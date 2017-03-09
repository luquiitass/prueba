<?php

namespace App;

use Barryvdh\Reflection\DocBlock\Type\Collection;
use Dompdf\Exception;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Database\Eloquent\Model;
use App\Administradores;

class Equipo extends Model
{
    use Administradores,Funciones,Trait_Fechas;

    protected $table='equipos';

    protected $fillable = ['nombre','alias','fundado','fundadores','descripcion','categoria_id'];


    /* **********************  Relaciones   *****************************/

    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function jugadores()
    {
        return $this->belongsToMany(Jugador::class)
            ->withTimestamps()
            ->wherePivot('actual',1)
            ->withPivot('actual')
            ->withPivot('id');
    }

    public function estadios()
    {
        return $this->belongsToMany(Estadio::class)->withTimestamps();
    }

    public function contacto(){
        return $this->belongsTo(Contacto::class);
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function grupos(){
        return $this->belongsToMany(Grupo::class);
    }

    public function hasEstadio($value){
        return $this->estadios()->where('nombre',$value)->count() > 0?true:false;
    }


    public function getFotoEscudoAttribute(){
        $default = asset('/img/escudo_default_2.png');
        if (!is_null($this->attributes['foto_escudo']))
        {
            return asset($this->attributes['foto_escudo']);
        }
        return $default;
    }


    /* **********************  Relaciones   *****************************/









    /****************** Mettodos Add relaciones ******************************/

    public function addEstadio($estadio)
    {
        if (Estadio::exist($estadio['nombre']))
        {
            if (! $this->hasEstadio($estadio['nombre']))
            {
                $this->estadios()->attach( Estadio::getEstadio($estadio['nombre'])->id );
            }
        }else{
            $this->estadios()->attach( Estadio::create($estadio));
        }
        return Estadio::getEstadio($estadio['nombre']);
    }

    public function removerEstadios(){
        return $this->estadios()->detach();
    }

    public function addJugador($data,User $user=null)
    {
        if ($this->jugadores->contains('numero', $data['numero'])) {
            throw new \Exception('Este equipo ya posee un jugador con el mismo numero, debe cambiarlo');
        }

        if (!is_null($user)) {
            $jugador = $user->addJugador($data);
        } else {
            $jugador = new Jugador($data);
        }

       // dd($jugador);

        $jugador->save();
        $this->jugadores()->attach($jugador);

        $jugador->setFotoPerfil($data['foto_perfil']);
    }


    /****************** Mettodos Add relaciones ******************************/


    //************* operaciones******************

    /*  ************En Vistas*****************  */

    public function mostrarDatos(){
        return array(
            'Nombre' => $this->nombre,
            'Alias' => $this->apodo,
            'Fundado' => $this->fundado,
            'Fundadores' => $this->fundadores,
            'Direccion' =>$this->estadios()->first()->direccion->direccionCompleta(),
            'Estadio' => $this->estadios()->first()->nombre
        );
    }

    public function getDireccion(){
    }

    public function getNumerosDisponibles($except_num=null){
        $jugadores = $this->jugadores;
        $retorno =[];
        foreach (range(1,100) as $value)
        {
            if (!$jugadores->pluck('numero')->contains($value) != ($value == $except_num))
            {
                $retorno[$value]=$value;
            }
        }
        return $retorno;
    }

    public function setFotoEscudo($url){
        $url = !empty($url)?$url:'nada.jpl';
        $ruta_imagen_temporal = 'imagenes/temp/'.$url;
        $ruta_escudo = 'imagenes/escudo/';

        if (file_exists($ruta_imagen_temporal))
        {
            $img_escudo = Image::make($ruta_imagen_temporal);
            $nombre_imagen = $this->id.'.'.$img_escudo->extension;
            copy($ruta_imagen_temporal,$ruta_escudo . $nombre_imagen);
            //rename($ruta_imagen_temporal,$ruta_escudo . $nombre_imagen);
            Image::make($ruta_escudo . $nombre_imagen)->fit(128)->save();

            $this->foto_escudo = $nombre_imagen;
            $this->save();
        }
    }


    public static function valiadarEquipo($input){
        //dd($input);
        $equipos = Equipo::where('nombre','=',$input['nombre'])->get();
        if ($equipos->count()>0) {
            if ($equipos->where('categoria_id',$input['categoria'])->count()>0) {
                if ($equipos->where('alias',$input['alias'])->count()>0) {
                    throw new Exception('Ya existe un equipo con este nombre,categoria y alias registrado');
                }else{
                    return true;
                }
                throw new Exception('Ya existe un equipo con este nombre y categoria. Debe asignarle un Alias para diferenciarlos');
            }
        }
    }

    public function partidosDeTorneo($id){
        $partidos = Partido::join('fechas','fechas.id','=','partidos.fecha_id')
            ->join('grupos','grupos.id','=','fechas.grupo_id')
            ->join('fases','fases.id','=','grupos.fase_id')
            ->join('torneos','torneos.id','=','fases.torneo_id')
            ->where('torneos.id','=',$id)
            ->where(function ($query){
                $query->where('eq1_id','=',$this->id)
                    ->orWhere('eq2_id','=',$this->id);
            })
            ->get();

        return $partidos;

    }

}
