@if(isset($competencia))

    @extends('liga.root')

    @section('titulo_seccion')

    @endsection

    @section('menu_liga_configuraciones','active')

    @section('liga_configuraciones_content')

        <div class="resaltar bg-info" id="torneo">
            <h3 class="">{{$torneo->nombre}}</h3>
                <div class="box">
                    <div class="box-header with-border">
                        <i class="fa fa-info-circle "></i>
                        <h3 class="box-title">Informacion</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                @if(!empty($torneo->descripcion))
                                    <p><strong>Descripcion</strong>$torneo->descripcion</p>
                                @endif
                                    <dl>
                                        <dt>Inicio</dt>
                                        <dd>{{$torneo->inicio->format('d-m-Y')}}</dd>
                                        <dt>Inicia</dt>
                                        <dd>{{$torneo->inicio->format('d/m/Y')}}</dd>
                                        <dt>Finaliza</dt>
                                        <dd>{{$torneo->fin->format('d/m/Y')}}</dd>
                                        <dt>Categoría/as</dt>
                                        <dd>{{$torneo->categorias->implode('nombre',',  ')}}</dd>
                                    </dl>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                @if(empty($torneo->fases))
                                    <div class="centered">
                                        <div class="alert alert-info text-left">
                                            <p class="text-left"> <span class="fa  fa-check "></span> Ya puede generar las fechas, partidos t tabla de posiciones su {{$competencia->tipoOrganizacionCompetencia->nombre}}. Solamente debe precionar el siguiente boto éstas crearan solas.</p>
                                            <p> <i class="fa fa-info-circle"></i> Recuerde que al generar las fechas y partidos ya no podra adherir mas equipos .</p>
                                        </div>
                                        <a class="btn btn-app cl-negro-claro">
                                            <i class="fa fa-table"></i>
                                            Generar Partidos de liga
                                        </a>
                                    </div>
                                @else
                                    <p><strong>Cantidad de Fechas: </strong>{{count($torneo->fechas())}}</p>
                                    <p><strong>Cantidad de Equipos: </strong>{{count($torneo->equipos)}}</p>
                                    <p><strong>Inicia: </strong>{{$torneo->inicio->format('d/m/Y')}}</p>
                                @endif

                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
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

        <div class="resaltar bg-info" id="equipos">

            <div>
                <ul class="nav nav-tabs">
                    @if($torneo->fases->count() > 0)
                        <li role="presentation" class="@yield('subemenu_torneo_tabla','')"><a href="#">Tabla de Posiciones</a></li>
                        <li role="presentation" class="@yield('subemenu_torneo_fechas','')"><a href="{{route('torneo.fechas.configuraciones',['torneo'=>$torneo->id,'#fechas'])}}">Fechas</a></li>
                        <li role="presentation" class="@yield('subemenu_torneo_resultados','')"><a href="{{route('torneo.resultados.configuraciones',['torneo'=>$torneo->id,'#resultados'])}}">Resultados</a></li>
                        <li role="presentation" class="@yield('subemenu_torneo_calendario','')"><a href="{{route('torneo.calenndario.configuraciones',['torneo'=>$torneo->id,'#calendario'])}}">Calendario</a></li>
                    @endif
                    <li role="presentation" class="@yield('subemenu_torneo_equipos','')"><a href="{{route('liga.configuracion.torneo.equipos',['torneo'=>$torneo->id,'#equipos'])}}">Equipos</a></li>
                </ul>{{--  Tabs de Torneo( equipo,calendario,resultado, tabla, etc)--}}
            </div>

            <div class="resaltar bg-white">
                @yield('liga_configuraciones_torneo_content')
            </div>

        </div>
    @endsection
@else
    Falta pasar la competencia
@endif