<div class="">
    <h3>Nueva Competencia</h3>
    @include('mensajes.error')
    {{Form::open(array())}}
        <div class="form-group">
            {{Form::label('nombre')}}
            {{Form::text('nombre',null,array('class'=>'form-control'))}}
        </div>

        <div class="form-group">
            {{Form::label('descripción')}}
            {{Form::textArea('descripcion',null,array('class'=>'form-control'))}}
        </div>

        @include('otros.selectUser')

        <div class="centered">
            <a class="manita save_ajax btn btn-primary" data-link="/admin/competencia"> Guardar</a>
        </div>

    {{Form::close()}}
</div>