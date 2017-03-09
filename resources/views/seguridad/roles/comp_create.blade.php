<div class="">

    <h3 class="centered">Nuevo Rol</h3>
    <hr>

    {{Form::open()}}
    <div class="row">
        <div class="col-xs-6">

                <div class="form-group">
                    {{Form::label('nombre')}}
                    {{Form::text('name',null, array('class' =>'form-control'))}}
                    @include('mensajes.error_input',['name'=>'name'])
                </div>

                <div class="form-group">
                    {{Form::label('slug')}}
                    {{Form::text('slug',null, array('class' =>'form-control'))}}
                    @include('mensajes.error_input',['name'=>'slug'])
                </div>

                <div class="form-group">
                    {{Form::label('descripcion')}}
                    {{Form::textArea('description',null, array('class' =>'form-control'))}}
                    @include('mensajes.error_input',['name'=>'description'])
                </div>
            </div>
            <div id="div_permisos" class="col-xs-6">
                <h4>Permisos</h4>
                <div class="box_permisos resaltar">
                    @foreach(\Spatie\Permission\Models\Permission::get() as $permiso)
                        <div class="box" style="padding-left: 5px;">
                            {{Form::checkbox('permisos['.$permiso->id.']',$permiso->name)}}
                            {{Form::label($permiso->name)}}
                        </div>
                    @endforeach

                </div>
            </div>
    </div>

    <div class="centered">
        <a class="btn btn-primary save_ajax" data-link="/role">Guardar</a>
    </div>

    {{--{{Form::submit('Crear',array('class'=>'btn btn-primary'))}}--}}
    {{Form::token()}}

    {{Form::close()}}

</div>