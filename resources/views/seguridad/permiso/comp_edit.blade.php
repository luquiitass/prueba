@if(isset($permission))
    <div class="">
        <h3 class="centered">Modificar Permiso</h3>
        <hr>
        {{Form::open(array())}}
        {{Form::token()}}
        <div class="form-group">
            {{Form::label('Nombre')}}
            {{Form::text('name',$permission->name,array('class'=>'form-control'))}}
        </div>

        <div class="form-group">
            {{Form::label('slug')}}
            {{Form::text('slug',$permission->slug,array('class'=>'form-control'))}}
        </div>

        <div class="form-group">
            {{Form::label('model')}}
            {{Form::text('model',$permission->model,array('class'=>'form-control'))}}
        </div>

        <div class="form-group">
            {{Form::label('Descripcion')}}
            {{Form::textArea('description',$permission->description,array('class'=>'form-control','height'=>'117px'))}}
        </div>
        <div class="centered">
            <a class="btn btn-primary save_edit" data-link="/permission/{{$permission->id}}">Modificar</a>
        </div>
        {{Form::close()}}
    </div>
@else
    No se ha pasado el permiso
@endif
