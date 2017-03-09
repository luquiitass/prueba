<div>
    <div class="centered">
        <h3>Nuevo Estado</h3>
    </div>

    {{Form::open(array('id'=>'form_create_configuracion'))}}

        <div class="form-group">
            {{Form::label('nombre')}}
            {{Form::text('nombre',null,array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('tabla')}}
            {{Form::select('tabla',\App\Configuracion::getTablas(),null,array('class'=>'form-control'))}}
        </div>

        <div class="centered">
            <a class="btn btn-primary manita save_ajax" data-link="/configuracion">Guardar</a>
        </div>

    {{Form::close()}}

</div>
