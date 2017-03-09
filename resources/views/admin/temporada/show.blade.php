@extends('admin.competencia.root')

@section('admin_competencia_migas')
    <li><a href=""><i class="fa fa-dashboard"></i> Configuraciones</a></li>
    <li><a href="{{url('/admin/competencia/'.$competencia->id)}}"><i class="fa fa-dashboard"></i> Competencia {{$temporada->competencia->nombre}}</a></li>
    <li class="active">Temporada {{$temporada->nombre}}</li>
@endsection

@section('admin_competencia_content')

    @if(isset($temporada))

        <div class="resaltar bg-success">
            <div class="resaltar bg-white">
                <h3>Temporada {{$temporada->nombre}}</h3>
                <p><strong>Descripción: </strong>{{$temporada->descripcion}}</p>
                <p><strong>Fecha de Inicio:</strong> {{$temporada->inicio_con_formato()}}</p>
                <p><strong>Fecha de Finalizacion:</strong> {{$temporada->fin_con_formato()}}</p>
                <div>
                    <a class="btn btn-primary create" data-toggle="collapse" href="#collapse_temporada_editar">Editar Datos</a>
                    <div class="collapse" id="collapse_temporada_editar">
                        <div class="" id="contenedor_editar_temporada">
                            <a  data-toggle="collapse" href="#collapse_temporada_editar" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                            <div class="bg-white resaltar">
                                @include('admin.temporada.comp_edit')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="resaltar bg-success">
            <div class="resaltar bg-white">
                <h3>Torneos</h3>
                <div>
                    <a class="btn btn-primary create" data-toggle="collapse" href="#collapse_torneo_nuevo">Agregar Torneo</a>
                    <div class="collapse" id="collapse_torneo_nuevo">
                        <div class="" id="contenedor_nuevo_torneo">
                            <div class="bg-white resaltar">
                                <a  data-toggle="collapse" href="#collapse_torneo_nuevo" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                                @include('admin.torneo.comp_create')
                            </div>
                        </div>
                    </div>
                </div>

                @if(empty($temporada->torneos))
                    <hr>
                    <div class="alert bg-info">
                        <p> Felicidades <i class="fa fa-thumbs-o-up"></i></p>
                        <p>Ya has creado la Temporada correctamente , ahora debes crear torneo/s</p>
                    </div>
                @else
                    <div id="contenedor_torneos">

                        @if(count($temporada->torneos) > 0)
                            <table class="table">
                                <thead>
                                <th>Nombre</th>
                                <th>Inicio</th>
                                <th>Fin</th>
                                <th>Cant. Equipos</th>
                                <th>Tipo</th>
                                <th>Operaciones</th>
                                </thead>
                                <tbody>
                                @foreach($temporada->torneos as $torneo)
                                    <tr id="torneo_id_{{$torneo->id}}">
                                        <td>{{$torneo->nombre}}</td>
                                        <td>{{$torneo->inicio->format('d/m/Y')}}</td>
                                        <td>{{$torneo->fin->format('d/m/Y')}}</td>
                                        <td>Posee {{$torneo->equipos->count()}} Equipos</td>
                                        <td>{{$torneo->tipoTorneo->nombre}}</td>
                                        <td>

                                            <a class="manita " href="{{url('/admin/'.$torneo->tipoTorneo->nombre.'/'.$torneo->id)}}">Administrar</a>

                                            <span class="separador"></span>

                                            <a class="manita delete" data-toggle="modal" data-target="#myModal" data-link="/admin/{{$torneo->tipoTorneo->nombre}}/{{$torneo->id}}/deleteMsg">Eliminar</a>
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
                    </div>
                @endif

            </div>
        </div>

    @else
        <div class="alert alert-danger">
            Falta pasar el Temporada
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