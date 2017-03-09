@if(isset($competencia))

    @extends('competencia.unaCompetencia.configuraciones')

    @section('competencia_configuraciones_migasDePan')
        <ol class="breadcrumb">
            <li>
                <a href="{{route('competencia.configuraciones',['competencia'=>$competencia->id])}}">Configuraciones</a>
            </li>
            <li>
                <a href="{{route('temporadas.configuraciones',['competencia'=>$competencia->id])}}">Competencia</a>
            </li>

        </ol>
    @endsection

    @section('competencia_configuraciones_content')
        <h3>Temporadas</h3>

        <a class="btn btn-primary create" data-toggle="collapse" href="#collapse_temporada_nueva">Nueva Temporada</a>
        <div class="collapse" id="collapse_temporada_nueva">
            <div class="resaltar" id="contenedor_nueva_temporada">
                @include('temporada.comp_create',compact('competencia'))
            </div>
        </div>
        <hr>
        <div id="contenedor_temporadas">
            @include('temporada.comp_index',array('temporadas'=>$competencia->temporadas))
        </div>
    @endsection

@else
    <div class="alert alert-danger">
        Falta pasar el Competencia
    </div>
@endif