@if(isset($torneo))
    @extends('liga.configuracion.torneo')

    @section('subemenu_torneo_equipos','active')

    @section('liga_configuraciones_torneo_content')
        <div>
            @include('equipo.comp_asociar_equipo')
        </div>

        <hr>
        @if(count($torneo->equipos) > 0)
            <table class="table">
                @foreach($torneo->equipos as $equipo)
                    <tr id="id_fila_equipo_{{$equipo->id}}">
                        <td>@include('equipo.comp_unEquipo')</td>
                        <td>
                            <a class="manita edit" data-toggle="modal" data-target="#myModal" data-link="/torneo/{{$torneo->id}}/{{$equipo->id}}/quitarEquipo" >Quitar Equipo</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            <div class="alert bg-warning">
                {{$torneo->nombre}} no posee Equipos adherido.
            </div>
        @endif


    @endsection
@else
    falta pasar el torneo
@endif