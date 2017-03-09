@extends('admin.competencia.root')

@include('imagen.incluir_librerias_jcrop')

@section('admin_competencia_migas')
    <li><a href="#"><i class="fa fa-dashboard"></i> Configuraciones</a></li>
    <li><a href="{{url('/admin/competencia/'.$competencia->id)}}"><i class="fa fa-dashboard"></i> Competencia {{$competencia->nombre}}</a></li>
    <li><a href="{{url('/admin/temporada/'.$liga->temporada->id)}}"><i class="fa fa-dashboard"></i> Temporada {{$liga->temporada->nombre}}</a></li>
    <li class="active">Liga {{$liga->nombre}}</li>
@endsection

@section('admin_competencia_content')
    @if(isset($liga))
            <div class="resaltar bg-info" id="torneo">
                <div class="resaltar bg-white">
                    <h3>{{$liga->nombre}}</h3>
                    <p><strong>Descripción: </strong>{{$liga->descripcion}}</p>
                    <p><strong>Inicia: </strong>{{$liga->inicio->format('d/m/Y')}}</p>
                    <p><strong>Finaliza: </strong>{{$liga->fin->format('d/m/Y')}}</p>
                    <p><strong>Administrador/es: </strong>{{$liga->administradores->implode('email',',  ')}}</p>
                    <p><strong>Equipos Asociados: </strong>{{$liga->equipos->count()}}</p>
                    <p><strong>Categoría/as: </strong>{{$liga->categorias->implode('nombre',',  ')}}</p>
                    <div>
                        <a class="btn btn-primary create" data-toggle="collapse" href="#collapse_torneo_editar">Editar Datos</a>
                        <div class="collapse" id="collapse_torneo_editar">
                            <div class="" id="contenedor_editar_torneo">
                                <div class="bg-white resaltar">
                                    @include('admin.liga.comp_edit')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        <ul class="nav nav-tabs" id="menu">
            @if(!$liga->fases->count() > 0)
                <li role="presentation" class="@yield('subemenu_liga_configuraciones','')"><a href="{{url('/admin/'.$liga->tipoTorneo->nombre.'/'.$liga->id)}}">Configuracioes</a></li>
                <li role="presentation" class="@yield('subemenu_liga_equipos','')"><a href="{{route('admin.liga.equipos',['liga'=>$liga->id])}}">Equipos</a></li>

            @else
                <li role="presentation" class="@yield('subemenu_liga_tabla','')"><a href="{{route('admin.liga.tablePosiciones',['liga'=>$liga->id,'#menu'])}}">Tabla de Posiciones</a></li>
                <li role="presentation" class="@yield('subemenu_liga_resultados','')"><a href="{{route('admin.liga.resultados',['liga'=>$liga->id,'#menu'])}}">Resultados</a></li>
                <li role="presentation" class="@yield('subemenu_liga_caledario','')"><a href="{{route('admin.liga.calendario',['liga'=>$liga->id,'#menu'])}}">Calendario</a></li>
                <li role="presentation" class="@yield('subemenu_liga_equipos','')"><a href="{{route('admin.liga.equipos',['liga'=>$liga->id,'#menu'])}}">Equipos</a></li>
                <li role="presentation" class="@yield('subemenu_liga_configuraciones','')"><a href="{{url('/admin/'.$liga->tipoTorneo->nombre.'/'.$liga->id.'#menu')}}">Configuracioes</a></li>
            @endif
        </ul>

        <div class="resaltar bg-white">
            @yield('configuraciones_liga_content')
        </div>

    @else
        <div class="alert alert-danger">
            Falta pasar la Liga
        </div>
    @endif


@endsection

@section('scripts')
    @parent
    <script>
        cargarSelect2();
        cargarSelectCategoria();
    </script>
@endsection