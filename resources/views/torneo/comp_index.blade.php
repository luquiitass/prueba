@if(!isset($temporada))
    Falta pasar las Torneos
@else
    <hr>
    @if(count($temporada->torneos) > 0)
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
                        <td>{{$torneo->inicio->format('d/m/Y')}}</td>
                        <td>{{$torneo->fin->format('d/m/Y')}}</td>
                        <td>Posee {{$torneo->equipos->count()}} Equipos</td>
                        <td>

                            <a class="manita " href="{{url($competencia->tipoOrganizacionCompetencia->nombre.'/configuraciones/torneo/'.$torneo->id)}}">Ver</a>

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
