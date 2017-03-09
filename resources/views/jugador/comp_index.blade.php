@if(isset($jugadores))
    <div>
        @if($jugadores->count()>0)
        <div >
            <h3>Plantilla de Jugadores</h3>
            <div>
                <ul style="display: inline-block;font-size: x-small;float: none;vertical-align: top;">
                    @foreach($jugadores as $jugador)
                        <li class="divisor-5p-right" style="float: left;display: block">
                            <div style="position: relative;overflow: hidden;">
                                <a href="{{url("jugador/$jugador->id")}}">
                                    <div style="padding: 10px">
                                        <img src="{{asset($jugador->getFotoPerfil())}}" alt="" style="width:250px;max-width: 100%;display: block;">
                                    </div>
                                </a>
                            </div>

                            <div class="" style="display: table;background: #FFFFFF;width: 100%">
                                <div style="    display: table-row;border: 1px solid red;vertical-align: top;
}">
                                    <strong style="padding: 10px 0;display: table-cell;width: 45px;border-right: 1px solid #EBEBEB;font-size: 2.9em;text-align: center;">{{$jugador->numero}}</strong>
                                    <p style="display: table-cell;vertical-align: middle;text-align: left;">
                                        <a href="" style="font-size: x-small; text-decoration: none;font-size: 1.2em;color: #666666;padding-left: 10px">{{$jugador->nombre}} {{$jugador->apellido}}</a>
                                        <span style="font-size: .8em;color: #666666;">({{$jugador->posicion->nombre}})</span>
                                    </p>
                                </div>
                            </div>
                        </li>
                    @endforeach

                </ul>
            </div>

        </div>
        @else
        <div class="alert alert-info">
            No posee jugadores
        </div>
        @endif
    </div>


@else
    <div class="alert alert-danger">
        Falta pasar los jugadores
    </div>
@endif