@if(isset($partido))
    <div>
        {{Form::open()}}
            <div class="centered">
                <h3>
                    {{$partido->equipo1->nombre}} <strong>vs</strong> {{$partido->equipo2->nombre}}
                </h3>
            </div>

            <div class="form-group">
                {{Form::label('Fecha')}}
                {{Form::text('date',$partido->date(),array('class'=>'form-control datepicker'))}}
            </div>

            <div class="form-group">
                {{Form::label('Fecha')}}
                <div class="input-group bootstrap-timepicker timepicker">
                    {{Form::text('date',$partido->time(),array('class'=>'form-control input-small timepicker'))}}
                    <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                </div>
            </div>

            @include('partido.comp_select_equipos_partido')

            <div class="form-group"></div>
            <div class="form-group"></div>

            <div class="centered">
                <a class="manita save_edit btn btn-primary" data-link="/admin/partido/{{$partido->id}}">Modificar</a>
            </div>

        {{Form::close()}}
    </div>
@else
    Faalta el partido
@endif