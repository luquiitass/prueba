@if(isset($equipo))
    <div class="user-block">
        <img class="img-circle img-bordered-sm" src="{{$equipo->foto_escudo}}" alt="Escudo">
        <span class="username">
            <a href="#">{{$equipo->nombre}}</a>
        </span>
        <span class="description">{{!empty($equipo->alias)?'Alias '.$equipo->alias:''}} - categoría {{$equipo->categoria->nombre}}</span>
    </div>
@else
    faltaEquipo
@endif