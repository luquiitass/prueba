<div>
    <div class="centered">
        <h3>Nuevo</h3>
    </div>
    {{Form::open()}}
        <div class="form-group">
            {{Form::label('nombre')}}
            {{Form::text('nombre',null,['class'=>'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('descripcion')}}
            {{Form::textArea('descripcion',null,['class'=>'form-control'])}}
        </div>
        <div class="centered">
            <a class="manita btn btn-primary save_ajax" data-link="/tipoOrganizacionCompetencia">Guardar</a>
        </div>

    {{Form::close()}}

</div>