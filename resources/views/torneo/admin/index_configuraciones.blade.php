@if(isset($temporada))

    @extends('competencia.unaCompetencia.configuraciones')

@section('competencia_configuraciones_content')
    <h3>Torneos de la Temporada {{$temporada->nombre}}</h3>
    <div>
        <div class="resaltar bg-white">
            <h5 class="borde-bottom">Datos de la temporada</h5>
            <p>
                {{$temporada->descripcion}}
            </p>
            <div>
                Inicia: {{$temporada->inicio->format('d/m/Y')}}
            </div>
            <div>
                Finaliza: {{$temporada->fin->format('d/m/Y')}}
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-12">
                <div>
                    @include('torneo.admin.comp_index',['torneos'=>$temporada])
                </div>
            </div>
        </div>

    </div>
@endsection

@else
    <div class="alert alert-danger">
        Falta pasar el Temporada
    </div>
@endif