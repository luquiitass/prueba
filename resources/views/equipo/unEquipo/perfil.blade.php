@extends('equipo.unEquipo.root')

@section('equipo_submenu_perfil','active')

@section('equipo_conten')
    <div class="">
        <div id="perfil" class="borde-bottom divisor-5p-bottom">
            <img src="{{$equipo->getFotoEscudo()}}" alt="Escudo">
            <h2>Información</h2>
            @include('equipo.unEquipo.datos',compact('equipo'))
        </div>

        <div id="Resultados" class="borde-bottom divisor-5p-bottom">
            <h2>Resultados</h2>
        </div>

        <div id="Calendario" class="borde-bottom divisor-5p-bottom">
            <h2>Calendario</h2>
        </div>

        <div id="jugadores" class="borde-bottom divisor-5p-bottom">
            <h2>Plantilla de Jugadores</h2>
        </div>

        <div id="Fotos" class="borde-bottom divisor-5p-bottom">
            <h2>Fotos</h2>
        </div>
    </div>
@endsection
