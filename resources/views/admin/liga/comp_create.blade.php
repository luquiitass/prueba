@if(isset($temporada))
    <div>
        <h3 class="text-center">Nueva Liga</h3>

        {{Form::open()}}
            {{Form::hidden('temporada_id',$temporada->id)}}

            <div class="form-group">
                {{Form::label('nombre')}}
                {{Form::text('nombre',$temporada->competencia->nombre,array('class'=>'form-control'))}}
            </div>

            <div class="form-group">
                {{Form::label('Fecha inicio')}}
                {{Form::text('inicio',null,array('class'=>'form-control datepicker'))}}
                <p class="text-danger"> <i class="fa fa-info-circle"></i> La fecha de inicio debe ser postereios a <strong>{{$temporada->inicio->format('d-m-Y')}}</strong> , es cuando inicia la temporada</p>

            </div>

            <div class="form-group">
                {{Form::label('Fecha a finalizar')}}
                {{Form::text('fin',null,array('class'=>'form-control datepicker'))}}
                <p class="text-danger"><i class="fa fa-info-circle"></i> La fecha de finalización debe ser menor a <strong>{{$temporada->fin->format('d-m-Y')}}</strong> , es cuando finaliza la temporada</p>
            </div>

            <div class="form-group">
                {{Form::label('descripción')}}
                {{Form::textArea('descripcion',null,array('class'=>'form-control'))}}
            </div>

            @include('otros.selectUser')

            @include('categoria.comp_select_multiple')


            <a class="manita" data-toggle="collapse" data-target="#configuraciones_liga">Mas configuraciones +</a>

            <div id="configuraciones_liga" class="collapse">
                no posee mas configuraciones
            </div>

            <div class="centered">
                <a class="btn btn-primary save_ajax " data-link="/admin/liga">Guardar</a>
            </div>


        {{Form::close()}}

    </div>
@else
    Falta temporada
@endif

