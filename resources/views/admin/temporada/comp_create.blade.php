@if(!isset($competencia))
    <div class="alert alert-danger">
        Falta pasar la competencia
    </div>
@else

    <div class="">
        <div class="centered">
            <h3>Nueva Temporada</h3>
        </div>
        <div class="centered">
            {{Form::open(array('id'=>'form_create_temporada','class'=>'form-inline','id'=>'form_create_temporada'))}}

                {{Form::hidden('competencia_id',$competencia->id)}}

                <div class="form-group">
                    {{Form::label('nombre')}}
                    {{Form::text('nombre',null,array('class'=>'form-control'))}}
                </div>
                <span class="separador"></span>
                <div class="form-group">
                    {{Form::label('Inicio')}}
                    {{Form::text('inicio',null,array('class'=>'form-control datepicker'))}}
                </div>
                <span class="separador"></span>
                <div class="form-group">
                    {{Form::label('Fin')}}
                    {{Form::text('fin',null,array('class'=>'form-control datepicker'))}}
                </div>
                <span class="separador"></span>
                <div class="form-group">
                    <a class="save_ajax btn btn-primary manita form-control" data-link="/admin/temporada" >Guardar</a>
                </div>

            {{Form::close()}}
        </div>

    </div>

@endif
