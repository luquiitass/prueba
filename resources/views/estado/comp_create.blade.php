<div>
    <div class="centered">
        <h3>Nuevo Estado</h3>
    </div>

    {{Form::open(array('id'=>'form_create_estado'))}}

        <div class="form-group">
            {{Form::label('nombre')}}
            {{Form::text('nombre',null,array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('descripción')}}
            {{Form::textArea('descripcion',null,array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('tabla')}}
            {{Form::select('tabla',\App\Estado::getTablas(),null,array('class'=>'form-control'))}}
        </div>

        <div class="centered">
            <a class="btn btn-primary manita save_ajax" data-link="/estado">Guardar</a>
        </div>

    {{Form::close()}}

</div>
