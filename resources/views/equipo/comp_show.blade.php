<div>
    @if(isset($equipo))
        <ul class="lista-datos">

            @if(isset($equipo->nombre))
                <li><span>Nombre: </span> {{$equipo->nombre}}</li>
            @endif

            @if(isset($equipo->alias))
                <li><span>Alias: </span>{{$equipo->alias}}</li>
            @endif

            @if(isset($equipo->fundado))
                <li><span>Fundado: </span>{{$equipo->fundado}}</li>
            @endif

            @if(isset($equipo->fundadore))
                <li><span>Fundadores:</span> $equipo->fundadore</li>
            @endif

            @if(isset($equipo->arquitectos))
                <li><span>Arquitectos: </span>{{$equipo->arqutectos}}</li>
            @endif

            @if(isset($equipo->dueños))
                <li><span>Dueños:</span>{{$equipo->dueños}}</li>
            @endif

            @if(isset($equipo->inauguracion))
                <li><span>Ianugurado:</span>El {{$equipo->inauguracion}}</li>
            @endif
        </ul>
    @else
        Sin Estadio
    @endif
    <br>
</div>