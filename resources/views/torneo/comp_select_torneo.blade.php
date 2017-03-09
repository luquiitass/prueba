@if(!isset($torneos))
    Falta pasr las Torneos
@else
    <div class="bfh-selectbox" data-name="selectbox3" data-filter="true" style="width: 200px">
        @forelse($torneos as $torneo)
            <div data-value="{{$torneo->id}}">{{$torneo->nombre}}</div>
        @empty
            <div class="alert alert-danger">
                Sin Torneos
            </div>
        @endforelse
    </div>
@endif
