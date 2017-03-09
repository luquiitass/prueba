@extends('torneo.admin.show_configuraciones')

@section('subemenu_torneo_equipos','active')

@section('configuraciones_torneo_content')
    <div id="equipos">
        @include('equipo.comp_asociar_equipo')
        <hr>
        @include('equipo.comp_index_admin',['equipos'=>$torneo->equipos])
    </div>
@endsection