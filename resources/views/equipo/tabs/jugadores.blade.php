@if(!isset($equipo))
    <div class="alert alert-danger"> Falta pasar el equipo</div>
@else
    <div>
        @include('jugador.comp_index',['jugadores'=>$equipo->jugadores()->get()])

    </div>

    {{--@section('modals')--}}
        {{--@parent--}}
        {{--<div id="modal_create_jugador" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
            {{--<div>--}}
                {{--@include('modals.modal_lg',array('body'=>view('jugador.comp_create',compact('equipo'))->render()))--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--@endsection--}}

@endif