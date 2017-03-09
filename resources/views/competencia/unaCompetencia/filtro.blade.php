@if(isset($competencia))
    <div class="filtro">
        @if(!empty($competencia->temporadas) && count($competencia->temporadas))

            @php(!empty($id_temporada)?$temporada = $competencia->t_get('temporadas','id',$id_temporada):$temporada = $competencia->temporadas->first())
            <div class="dropdown">
                <div class="title">
                    Temporada
                </div>
                <button class="dropbtn radius_4p">
                    {{$temporada->nombre}}
                    <span class="caret"></span>
                </button>
                <div class="dropdown-content">
                    @foreach($competencia->temporadas as $temp)
                        <a href="{{route('liga.configuracion.index',array('competencia'=>$competencia->id,'temporadas'=>$temp->id,'#temporadas'))}}">{{$temp->nombre}}</a>
                    @endforeach
                </div>
            </div>

            <span class="separador"></span>

            @if(!empty($temporada) && count($temporada->torneos))
                @php(!empty($id_torneo)?$torneo = $temporada->t_get('torneos','id',$id_torneo):$torneo=$temporada->torneos->first())
                <div class="dropdown">
                    <div class="title">
                        Torneo
                    </div>
                    <button class="dropbtn radius_4p">
                        {{$torneo->nombre}}
                        <span class="caret text-right"></span>
                    </button>
                    <div class="dropdown-content">
                        @foreach($temporada->torneos as $tor)
                            <a href="{{route('liga.configuracion.index',['competencia'=>$competencia->id,'temporada'=>$temporada->id,'torneo'=>$tor->id.'#torneos'])}}">{{$tor->nombre}}</a>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="dropdown">
                    <div class="title">
                        Torneo
                    </div>
                    <div class="dropbtn radius_4p">
                        Esta Temporada no posee tornos, <a href="{{route('temporadas',['temporadas'=>$temporada->id])}}" class="">Añadir Torneo</a>
                    </div>
                </div>
            @endif

        @else
            {{--<div class="dropdown">--}}
                {{--<div class="title">--}}
                    {{--Temporada--}}
                {{--</div>--}}
                {{--<div class="dropbtn radius_4p">--}}
                    {{--Esta Competencia no posee temporadas, <a href="{{route('temporadas.configuraciones',['competencia'=>$competencia->id])}}" class="">Añadir Temporada</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        @endif
    </div>
@endif