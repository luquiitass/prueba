<div class="">
    <h3 class="centered">Nuevo Permiso</h3>
    <hr>
    {{Form::open(array('url'=>url('permission')))}}
    {{Form::token()}}
    <div class="form-group">
        {{Form::label('Nombre')}}
        {{Form::text('name',null,array('class'=>'form-control'))}}
        @include('mensajes.error_input',['name'=>'name'])
    </div>

    <div class="form-group">
        {{Form::label('slug')}}
        {{Form::text('slug',null,array('class'=>'form-control'))}}
        @include('mensajes.error_input',['name'=>'slug'])
    </div>

    <div class="form-group">
        {{Form::label('model')}}
        {{Form::text('model',null,array('class'=>'form-control'))}}
        @include('mensajes.error_input',['name'=>'model'])
    </div>

    <div class="form-group">
        {{Form::label('Descripcion')}}
        {{Form::textArea('description',null,array('class'=>'form-control','height'=>'117px'))}}
        @include('mensajes.error_input',['name'=>'description'])
    </div>
    <div class="centered">
        <a class="btn btn-primary save_ajax" data-link="/permission">Guardar</a>
    </div>
    {{Form::close()}}
</div>