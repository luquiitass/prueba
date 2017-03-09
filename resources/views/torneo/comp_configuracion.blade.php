@if(isset($temporada))
    <div>
        <a class="btn btn-primary create" data-toggle="collapse" href="#collapse_torneo_nuevo">Nuev Torneo</a>
        <div class="collapse" id="collapse_torneo_nuevo">
            <div class="resaltar" id="contenedor_nuevo_torneo">
                @include('torneo.comp_create',['temporada'=>$temporada])
            </div>
        </div>
    </div>

    <div>
        Torneos de Esta Temporada
        @include('torneo.comp_index',['torneos'=>$temporada->torneos])
    </div>
@else
    <div class="alert alertdannger">
        Tenes q pasar una temporada nabo
    </div>
@endif
