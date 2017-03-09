@if(isset($competencia))
    <div class="resaltar bg-info" id="cong_general_general">
        <div class="resaltar bg-white">
            <h3>Nombre: <strong>{{$competencia->nombre}}</strong></h3>
            <p><strong>Descripción: </strong>{{$competencia->descripcion}}</p>
            <p><strong>Organizador de partidos: </strong>{{$competencia->org_partidos}}</p>
            <p><strong>Administrador/es: </strong>{{$competencia->users->implode('email',', ')}}</p>

            <div>
                <a class="btn btn-primary create" data-toggle="collapse" href="#collapse_competencia_editar">Editar Datos</a>
                <div class="collapse" id="collapse_competencia_editar">
                    <div class="" id="contenedor_editar_competencia">
                        <div class="bg-white resaltar">
                            <a  data-toggle="collapse" href="#collapse_competencia_editar" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                            @include('competencia.comp_edit',compact('competencia'))
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="resaltar bg-info">
        <div class="resaltar bg-white">
            <h3>Temporadas</h3>
            @if(!empty($competencia->temporadas))
                <a class="btn btn-primary create" data-toggle="collapse" href="#collapse_temporada_nueva">Nueva Temporada</a>
                <div class="collapse" id="collapse_temporada_nueva">
                    <div class="resaltar" id="contenedor_nueva_temporada">
                        <a  data-toggle="collapse" href="#collapse_temporada_nueva" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        @include('temporada.comp_create',compact('competencia'))
                    </div>
                </div>
                <hr>

                @include('temporada.comp_index',array('temporadas'=>$competencia->temporadas))
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