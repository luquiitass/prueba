@extends('admin.liga.root')

@section('subemenu_liga_equipos','active')

@section('configuraciones_liga_content')

    <div id="equipos">
        <div>
            @include('equipo.comp_asociar_equipo',['torneo'=>$liga])
        </div>
        <hr>

        <div>
            @if(count($liga->equipos)==0)
                <hr>
                <div class="alert bg-info">
                    <p> Felicidades <i class="fa fa-thumbs-o-up"></i></p>
                    <p>Ya has creado una Liga correctamente , ahora debes asociar equipos a esta Liga</p>
                </div>

            @else
                <h4>Equipos Asociados</h4>
                @if(count($liga->equipos)>0)
                    <table class="table">
                        @foreach($liga->equipos as $equipo)
                            <tr id="id_fila_equipo_{{$equipo->id}}">
                                <td>
                                    @include('equipo.comp_unEquipo')
                                </td>
                                <td>
                                    <a class="manita delete" data-toggle="modal" data-target="#myModal" data-link="/admin/torneo/{{$liga->id}}/quitarEquipo/{{$equipo->id}}">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @endif
            @endif
        </div>
    </div>

@endsection