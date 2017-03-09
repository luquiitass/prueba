@if(isset($partido))
    <div class="border partido">
        <div style="display: inline-flex">
            <div class="eq1 inline">
                <p class="imagen_equipo">
                    <img src="{{asset($partido->eq1_escudo)}}" alt="Escudo">
                    <span >{{$partido->eq1}}</span>
                </p>
            </div>
            @if($partido->isPendiente())
                <div class="vs">
                    Vs
                </div>
            @else
                <div class="resultado">
                    4
                </div>
                <div class="vs">
                    -
                </div>
                <div class="resultado">
                    5
                </div>
            @endif
            <div class="eq2 inline">
                <p class="imagen_equipo">
                    <img src="{{asset($partido->eq2_escudo)}}" alt="Escudo">
                    <span >{{$partido->eq2}}</span>
                </p>
            </div>
            <br class="clearBoth">
        </div>
    </div>
@else
    falta pasar partido
@endif