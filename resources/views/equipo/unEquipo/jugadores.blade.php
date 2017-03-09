@extends('equipo.unEquipo.root')

@section('equipo_submenu_jugadores','active')

@section('equipo_conten')
    @include('jugador.comp_index',['jugadores'=>$equipo->jugadores])
@endsection
