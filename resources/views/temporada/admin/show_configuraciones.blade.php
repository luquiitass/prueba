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
            <div id="contenedor_torneos">
                @include('torneo.comp_index',array('torneos'=>$temporada->torneos))
            </div>
        </div>
    </div>

@else
    <div class="alert alert-danger">
        Falta pasar el Temporada
    </div>
@endif
