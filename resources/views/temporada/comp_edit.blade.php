@if(!isset($temporada))
    <div class="alert alert-danger">
        Falta pasar la temporada
    </div>
@else

    <div class="">
        <div class="centered">
            <h3>Editar Temporada</h3>
        </div>
        <div>
            {{Form::open(array('id'=>'form_create_temporada','class'=>'form-inline'))}}

            {{--Form::hidden('competencia_id',$temporada->competencia->id)--}}

            {{Form::hidden('sub',$temporada->sub)}}

            <div class="form-group">
                {{Form::label('nombre')}}
                {{Form::text('nombre',$temporada->nombre,array('class'=>'form-control'))}}
            </div>

            <span class="separador"></span>

            <div class="form-group">
                {{Form::label('Inicio')}}
                {{Form::text('inicio',$temporada->inicio->format('d-m-Y'),array('class'=>'form-control datepicker'))}}
            </div>

            <span class="separador"></span>

            <div class="form-group">
                {{Form::label('Fin')}}
                {{Form::text('fin',$temporada->fin->format('d-m-Y'),array('class'=>'form-control datepicker'))}}
            </div>

            <span class="separador"></span>

            <div class="form-group">
                <a class="save_edit btn btn-primary manita text-center" data-link="/temporada/{{$temporada->id}}" >Guardar</a>
            </div>

            {{Form::close()}}
        </div>

    </div>

@endif
