@if(isset($competencia))
    <div class="filtro">
        @if(!empty($competencia->temporadas))
            @php($temporada = $competencia->t_get('temporadas','id',$id_temporada))
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
                        <a href="{{route('liga.configuracion.index',array('competencia'=>$competencia->id,'temporada'=>$temp->id,'#temporadas'))}}">{{$temp->nombre}}</a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endif