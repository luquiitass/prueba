@if(!empty($temporada) && count($temporada->torneos) > 0)
    @php($torneo = $temporada->t_get('torneos','id',$id_torneo))
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
@endif
