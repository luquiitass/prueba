@if(isset($competencia))

    @extends('liga.root')


    @section('menu_liga_portada','active')

    @section('liga_configuraciones_content')

        Portada

    @endsection

@else
    Falta pasar la competencia
@endif