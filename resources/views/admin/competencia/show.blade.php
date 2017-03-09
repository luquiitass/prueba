@extends('admin.competencia.root')

@section('admin_competencia_migas')
    <li><a href="#"><i class="fa fa-dashboard"></i> Configuraciones</a></li>
    <li class="active">Competencia {{$competencia->nombre}}</li>
@endsection

@section('admin_competencia_content')

    @if(isset($competencia))
        <div class="resaltar bg-info" id="cong_general_general">
            <div class="resaltar bg-white">
                <h3>Nombre: <strong>{{$competencia->nombre}}</strong></h3>
                <p><strong>Descripción: </strong>{{$competencia->descripcion}}</p>
                <p><strong>Administrador/es: </strong>{{$competencia->users->implode('email',', ')}}</p>
                <p><strong>Número de temporadas: </strong>{{count($competencia->temporadas)}}</p>

                <div>
                    <a class="btn btn-primary create" data-toggle="collapse" href="#collapse_competencia_editar">Editar Datos</a>
                    <div class="collapse" id="collapse_competencia_editar">
                        <div class="" id="contenedor_editar_competencia">
                            <div class="bg-white resaltar">
                                <a  data-toggle="collapse" href="#collapse_competencia_editar" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                                @include('admin.competencia.comp_edit',compact('competencia'))
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @php($temporadas = $competencia->temporadas)

        <div class="resaltar bg-info" id="temporadas">
            <div class="resaltar bg-white">
                <h3>Temporadas</h3>
                @if(!empty($temporadas))
                        <a class="btn btn-primary create" data-toggle="collapse" href="#collapse_temporada_nueva">Nueva Temporada</a>
                        <div class="collapse" id="collapse_temporada_nueva">
                            <div class="resaltar" id="contenedor_nueva_temporada">
                                <a  data-toggle="collapse" href="#collapse_temporada_nueva" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                                @include('admin.temporada.comp_create',compact('competencia'))
                            </div>
                        </div>
                        <hr>
                        @if(count($temporadas) > 0)
                            <table class="table">
                            <thead>
                            <th>N°</th>
                            <th>Nombre</th>
                            <th>Estado</th>
                            <th>Inicio</th>
                            <th>Fin</th>
                            <th>N° Torneos</th>
                            <th class="text-center">Operaciones</th>
                            </thead>
                                @for($i=0;$i < count($temporadas); $i++)
                                    <tr id="temporada_{{$temporadas->all()[$i]->id}}">
                                        <td>
                                            {{count($temporadas) - $i }}
                                        </td>
                                        <td style="padding-right: 20px">
                                            {{$temporadas->all()[$i]->nombre}}
                                            {{$temporadas->all()[$i]->sub>1?"-".$temporadas->all()[$i]->sub:''}}
                                        </td>
                                        <td>
                                            {{$temporadas->all()[$i]->str_activo() }}
                                        </td>
                                        <td>
                                            {{$temporadas->all()[$i]->inicio_con_formato() }}
                                        </td>
                                        <td>
                                            {{$temporadas->all()[$i]->fin_con_formato()}}
                                        </td>
                                        <td>
                                            {{count($temporadas->all()[$i]->torneos)}}
                                        </td>
                                        <td class="centered">
                                            <a class="manita" href="{{url('/admin/temporada/'.$temporadas->all()[$i]->id)}}">Administrar</a>
                                            <span class="separador"></span>
                                            {{--<a class="manita edit" data-toggle="modal" data-target="#myModal" data-link="/temporada/{{$temporadas->all()[$i]->id}}/edit" href="">Editar</a>--}}
                                            {{--<span class="separador"></span>--}}
                                            <a class="manita delete" data-toggle="modal" data-target="#myModal" data-link="/admin/temporada/{{$temporadas->all()[$i]->id}}/deleteMgs" href="">Eliminar</a>

                                        </td>
                                    </tr>
                                @endfor
                            </table>

                        @else
                            <div class="alert alert-warning">
                                Sin temporadas
                            </div>
                        @endif
                @else
                    <div class="alert bg-info">
                        <p> <i class="fa fa-thumbs-o-up"></i>  Felicidades ya se ha creado su competencia.</p>
                        <p>El siguiente paso es crear una nueva temporada para esta competencia</p>
                    </div>

                    <a class="btn btn-primary create" data-toggle="collapse" href="#collapse_temporada_nueva">Nueva Temporada</a>
                    <div class="collapse" id="collapse_temporada_nueva">
                        <div class="resaltar" id="contenedor_nueva_temporada">
                            <a  data-toggle="collapse" href="#collapse_temporada_nueva" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                            @include('temporada.comp_create',compact('competencia'))
                        </div>
                    </div>
                    <hr>
                @endif
            </div>
    </div>
    @else
        falta pasar la competencia
    @endif

@endsection

@section('scripts')
@parent
    <script>
        cargarSelect2();
    </script>
@endsection