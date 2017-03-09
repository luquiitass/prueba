<div class="col-form">
    <div class="centered">
        <h3>Nuevo Contacto</h3>
    </div>
    {{Form::open()}}
        {{Form::token()}}

        <div class="form-group">
            {{Form::label('email')}}
            {{Form::text('email',null,array('class'=>'form-control'))}}
        </div>

        <div id="form-telefonos">
            @include('telefono.comp_create')
        </div>

        <div class="">
            <a class="glyphicon glyphicon-plus-sign addTelefono manita" style="padding: 10px;"> Telefono</a>
        </div>

        <div class="centered">
            <a class="btn btn-primary save_ajax">Crear</a>
        </div>

    {{Form::close()}}
</div>