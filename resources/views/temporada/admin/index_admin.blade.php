@if(!isset($temporadas))
    Falta pasr las temporadas temporada.admin.index_admin
@else
    <h3>Temporadas</h3>

    <a class="btn btn-primary create" data-toggle="collapse" href="#collapse_temporada_nueva">Nueva Temporada</a>
    <div class="collapse" id="collapse_temporada_nueva">
        <div class="resaltar" id="contenedor_nueva_temporada">
            <a  data-toggle="collapse" href="#collapse_temporada_nueva" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
            @include('temporada.comp_create',compact('competencia'))
        </div>
    </div>
    <hr>
    <div id="contenedor_temporadas">
        @include('temporada.comp_index',array('temporadas'=>$competencia->temporadas))
    </div>
@endif
