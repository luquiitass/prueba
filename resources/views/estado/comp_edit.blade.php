@if(!isset($estado) && empty($estado))
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
            {{Form::text('nombre',$estado->nombre,array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('descripción')}}
            {{Form::textArea('descripcion',$estado->descripcion,array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('tabla')}}
            {{Form::select('tabla',\App\Estado::getTablas(),$estado->tabla,array('class'=>'form-control'))}}
        </div>

        <div class="centered">
            <a class="btn btn-primary manita save_edit" data-link="/estado/{{$estado->id}}">Modificar</a>
        </div>

    {{Form::close()}}

</div>

@endif