@if(isset($competencia))

    @extends('liga.root')

    @section('menu_liga_configuraciones','active')

@section('liga_configuraciones_content')
    <div class="resaltar bg-success" id="cong_general_general">
        <h4 class="borde-bottom">Competencia</h4>
        <div class="resaltar bg-white">
            <p><strong>Descripción: </strong>{{$competencia->descripcion}}</p>
            <p><strong>Organizador de partidos: </strong>{{$competencia->org_partidos}}</p>
            <p><strong>Administrador/es: </strong>{{$competencia->users->implode('email',',')}}</p>
            <a class="btn btn-success" href="{{route('liga.configuracion.competencia',array('competencia'=>$competencia->id))}}">Administrar Competencia</a>
        </div>
    </div>

    <div class="bg-white resaltar">


    @if(!empty($id_temporada) && !empty($temporada = $competencia->t_get('temporadas','id',$id_temporada)))

            @include('liga.configuracion.filtros.comp_filtro_temporada')

            <div class="resaltar bg-aqua" id="temporadas">
                <h4 class="borde-bottom">Temporada {{$temporada->nombre}}</h4>
                <div class="resaltar bg-white">
                    <p><strong>Descripción: </strong>{{$temporada->descripcion}}</p>
                    <p><strong>Inicio: </strong>{{$temporada->inicio->format('d/m/Y')}}</p>
                    <p><strong>Fin: </strong>{{$temporada->fin->format('d/m/Y')}}</p>
                    <p><strong>Torneos: </strong>Esta temporada posee {{$temporada->torneos->count()}} torneos.</p>
                    <a class="btn btn-info" href="{{route('liga.configuracion.temporada',['temporadas'=>$temporada->id])}}">Administrar Temporada</a>
                </div>
            </div>

            @php(!empty($id_torneo)?$torneo = $temporada->t_get('torneos','id',$id_torneo):$torneo = $temporada->torneos->first())

            @if(!empty($torneo))

                @include('liga.configuracion.filtros.comp_filtro_torneo')

                <div class="resaltar bg-blue" id="toneos">
                    <h4>Torneo {{$torneo->nombre}}</h4>
                    <div class="resaltar bg-white">
                        <p><strong>Descripción: </strong>{{$torneo->descripcion}}</p>
                        <p><strong>Inicio: </strong>{{$torneo->inicio->format('d/m/Y')}}</p>
                        <p><strong>Fin</strong>{{$torneo->fin->format('d/m/Y')}}</p>
                        <p><strong>Categorías: </strong>{{$torneo->categorias->implode('nombre','')}}</p>
                        <p><strong>Equipos:</strong>Este torneo posee {{$torneo->equipos->count()}} asociados.</p>
                        <a class="btn btn-primary" href="{{route('liga.configuracion.torneo',['torneo'=>$torneo->id])}}">Administrar Torneo</a>
                    </div>
                </div>

                @php( $equipos = $torneo->equipos)

                @if(!empty($equipos) && count($equipos)>0)
                    <div class="resaltar bg-info" id="equipos">
                        <h4>Equipos</h4>
                        <div class="resaltar bg-white">
                            <ul class="list-inline" >
                                @foreach($equipos as $equipo)
                                    <li class="separador" style="margin-bottom: 10px;border-bottom: 1px solid #d8cec6;">
                                        @include('equipo.comp_unEquipo')
                                    </li>
                                @endforeach
                            </ul>
                            <a class="btn btn-info" href="{{route('liga.configuracion.torneo',['torneo'=>$torneo->id."#equipos"])}}">Administrar Equipos</a>
                        </div>
                    </div>
                @else
                    <div class="alert alert-danger">
                        Esta Torneo no posee Equipos
                        <a href="{{route('liga.configuracion.torneo',compact('torneo'))}}">Añadir Equipos</a>
                    </div>

                @endif

            @else
                <div class="alert alert-danger">
                    Esta Temporada no posee Torneos
                    <a href="{{route('liga.configuracion.temporada',compact('temporada'))}}">Añadir Torneo</a>
                </div>
            @endif

        @else
            <div class="alert alert-danger">
                Esta Competencia no posee Temporadas
                <a href="{{route('liga.configuracion.competencia',compact('competencia'))}}">Añadir Temporadas</a>
            </div>
        @endif
    </div>
@endsection
@else
    Falta pasar la competencia
@endif