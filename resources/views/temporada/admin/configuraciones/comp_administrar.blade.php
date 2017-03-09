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
                            @include('temporada.comp_edit')
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
                            @include('torneo.comp_create',compact('temporadas'))
                        </div>
                    </div>
                </div>
            </div>

            @if(!empty($temporada->torneos))
                <hr>
                <div class="alert bg-info">
                    <p> Felicidades <i class="fa fa-thumbs-o-up"></i></p>
                    <p>Ya has creado la Temporada correctamente , ahora debes crear torneo/s</p>
                </div>
             @else
                <div id="contenedor_torneos">
                    @include('torneo.comp_index',array('torneos'=>$temporada->torneos))
                </div>
            @endif

        </div>
    </div>

@else
    <div class="alert alert-danger">
        Falta pasar el Temporada
    </div>
@endif
