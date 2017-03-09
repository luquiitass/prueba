@if(!isset($temporadas))
    Falta pasar las temporadas
@else
    <div class="bfh-selectbox" data-name="selectbox3" data-filter="true" style="width: 200px">
        @forelse($temporadas as $temporada)
            <div data-value="{{$temporada->id}}">{{$temporada->nombre}}</div>
        @empty
            <div class="alert alert-danger">
                Sin temporadas
            </div>
        @endforelse
    </div>
@endif
