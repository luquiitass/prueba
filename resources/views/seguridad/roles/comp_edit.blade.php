@if(isset($role))
    <h3 class="centered">Modificar Rol</h3>
    <hr>

    {{Form::open(array('url'=>url('rol')))}}
    {{Form::token()}}
    <div class="row">
        <div class="col-xs-6">
            <div class="form-group">
                {{Form::label('nombre')}}
                {{Form::text('name',$role->name, array('class' =>'form-control'))}}
            </div>

            <div class="form-group">
                {{Form::label('slug')}}
                {{Form::text('slug',$role->slug, array('class' =>'form-control'))}}
            </div>

            <div class="form-group">
                {{Form::label('descripcion')}}
                {{Form::textArea('description',$role->description, array('class' =>'form-control'))}}
            </div>
        </div>
        <div id="div_permisos" class="col-xs-6">
            <h4>Permisos</h4>
            <div class="box_permisos resaltar">
                @foreach(\Bican\Roles\Models\Permission::orderBy('model')->get() as $permiso)
                    <div class="box" style="padding-left: 5px;">
                        {{Form::checkbox('permisos['.$permiso->id.']',$permiso->name,$role->has($permiso->id))}}
                        {{Form::label($permiso->name)}}
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <div class="centered">
        <a class="btn btn-primary save_edit" data-link="/role/{{$role->id}}">Modificar</a>
    </div>

    {{--{{Form::submit('Crear',array('class'=>'btn btn-primary'))}}--}}

    {{Form::close()}}

@else
    No se ha pasado el Rol
@endif