@if(!isset($configuracion) && empty($configuracion))
    <div class="alert alert-danger">
        Falta el estado
    </div>
@else

<div>
    <div class="centered">
        <h3>Modificar Estado</h3>
    </div>

    {{Form::open(['id'=>'form_edit_estado', 'method' => 'put'])}}

        <div class="form-group">
            {{Form::label('nombre')}}
            {{Form::text('nombre',$configuracion->nombre,array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('descripción')}}
            {{Form::textArea('descripcion',$configuracion->descripcion,array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('tabla')}}
            {{Form::select('tabla',\App\Estado::getTablas(),$configuracion->tabla,array('class'=>'form-control'))}}
        </div>

        <div class="centered">
            <a class="btn btn-primary manita save_edit" data-link="/estado/{{$configuracion->id}}">Modificar</a>
        </div>

    {{Form::close()}}

</div>

@endif