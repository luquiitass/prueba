@if(isset($jugadores))
    <div>
        <h3>
            Jugadores
            <a  style="margin-left: 30px;" class="btn btn-success edit"  data-toggle="modal" data-target="#myModal" data-link="/jugador/{{$equipo->id}}/create">Nuevo jugador</a> </h3>
        @if($jugadores->count()>0)
        <table class="table table-striped">
            <thead>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Posición</th>
            <th>Números</th>
            <th>Operaciones</th>
            </thead>

            <tbody>
                @forelse($jugadores as $jugador)
                    <tr>
                        <td>
                            <img width="50" src="{{asset($jugador->getFotoPerfilThumb())}}" alt="Fot perfil">
                        </td>
                        <td>{{$jugador->nombre}}</td>
                        <td>{{$jugador->apellido}}</td>
                        <td>{{$jugador->posicion->nombre}}</td>
                        <td>{{$jugador->numero}}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="glyphicon glyphicon-cog"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <li><a href="#">Ver</a></li>
                                    <li><a class="edit manita" data-toggle="modal" data-target="#myModal" data-link="/jugador/{{$equipo->id}}/{{$jugador->id}}">Editar</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#" class="delete" data-toggle="modal" data-target="#myModal" data-link="/jugador/{{$jugador->id}}/{{$equipo->id}}/bajaJugadorMsg">Eliminar</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
        @else
        <div class="alert alert-info">
            No posee jugadores
        </div>
        @endif
    </div>


@else
    <div class="alert alert-danger">
        Falta pasar los jugadores
    </div>
@endif