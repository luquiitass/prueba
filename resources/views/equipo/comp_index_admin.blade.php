@if(isset($equipos))
    @if(count($equipos) > 0)
    <table class="table">
        <thead>
            <th>Escudo</th>
            <th>Operaciones</th>
        </thead>
        @foreach($equipos as $equipo)
            <tr id="id_fila_equipo_{{$equipo->id}}">
               <td>
                   @include('equipo.comp_unEquipo',['equipo'=>$equipo])
               </td>
                <td>
                    <a class="manita edit" data-link="/torneo/{{$torneo->id}}/{{$equipo->id}}/removeEquipo">Eliminar</a>
                </td>
            </tr>
        @endforeach
    </table>
    @else
        <div class="alert alert-danger">
            No posee Equipos
        </div>
    @endif
@else
    Falta Equipos
@endif