@if(!isset($temporada))
    Falta pasar las Torneos
@else
    <div>
        <a class="btn btn-primary create" data-toggle="collapse" href="#collapse_torneo_nuevo">Agregar Torneo</a>
        <div class="collapse" id="collapse_torneo_nuevo">
            <div class="resaltar" id="contenedor_nuevo_torneo">
                <div class="bg-white resaltar">
                    @include('torneo.comp_create',compact('temporada'))
                </div>
                <div class="text-right">
                    <a class="btn btn-danger create" data-toggle="collapse" href="#collapse_torneo_nuevo">cancelar</a>
                </div>
            </div>
        </div>
    </div>

    @if(count($temporada->torneos) > 0)
        <h3>Torneos</h3>
        <table class="table">
            <thead>
            <th>Nombre</th>
            <th>Inicio</th>
            <th>Fin</th>
            <th>Cant. Equipos</th>
            <th>Operaciones</th>
            </thead>
            <tbody>
            @foreach($temporada->torneos as $torneo)
                <tr id="torneo_id_{{$torneo->id}}">
                    <td>{{$torneo->nombre}}</td>
                    <td>{{$torneo->inicio}}</td>
                    <td>{{$torneo->fin}}</td>
                    <td>Posee {{$torneo->equipos->count()}} Equipos</td>
                    <td>
                        <span class="separador"></span>

                        <a class="manita " href="{{route('torneo.configuraciones',['torneo'=>$torneo->id])}}">Editar</a>

                        <span class="separador"></span>

                        <a class="manita delete" data-toggle="modal" data-target="#myModal" data-link="/torneo/{{$torneo->id}}/deleteMgs">Eliminar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info">
            Esta Temporada no posee Torneos
        </div>
    @endif

@endif
