@if(isset($torneo))

    @extends('competencia.unaCompetencia.configuraciones')

    @include('crop.incluir_librerias_jcrop')

    @section('competencia_configuraciones_migasDePan')
        <ol class="breadcrumb">
            <li>
                <a href="{{route('competencias.configuraciones',['competencias'=>$torneo->temporada->competencia->id])}}">Configuraciones</a>
            </li>
            <li class="">
                <a href="{{route('competencia.configuraciones',['competencia'=>$torneo->temporada->competencia->id])}}">Competencia {{$torneo->temporada->competencia->nombre}}</a>
            </li>
            <li class="">
                <a href="{{route('temporadas',['temporadas'=>$torneo->temporada->id])}}">Temporada {{$torneo->temporada->nombre}}</a>
            </li>
            <li class="active">
                {{$torneo->nombre}}
            </li>
        </ol>
    @endsection

    @section('competencia_configuraciones_content')
        <div class="resaltar bg-info" id="torneo">
            <div class="resaltar bg-white">
                <h3>{{$torneo->nombre}}</h3>
                <p><strong>Descripción: </strong>{{$torneo->descripcion}}</p>
                <p><strong>Inicia: </strong>{{$torneo->inicio->format('d/m/Y')}}</p>
                <p><strong>Finaliza: </strong>{{$torneo->fin->format('d/m/Y')}}</p>
                <p><strong>Categoría/as: </strong>{{$torneo->categorias->implode('nombre',',  ')}}</p>
                <div>
                    <a class="btn btn-primary create" data-toggle="collapse" href="#collapse_torneo_editar">Editar Datos</a>
                    <div class="collapse" id="collapse_torneo_editar">
                        <div class="" id="contenedor_editar_torneo">
                            <div class="bg-white resaltar">
                                @include('torneo.comp_edit')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="resaltar bg-info" id="equipos">
            @include('torneo.admin.liga.comp_tabs_liga')

            <div class="resaltar bg-white">
                @yield('configuraciones_torneo_content')
            </div>

        </div>
    @endsection

@else
    <div class="alert alert-danger">
        Falta pasar el torneo
    </div>
@endif