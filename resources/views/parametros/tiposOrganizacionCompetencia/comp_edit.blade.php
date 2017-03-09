@if(isset($tipo))
    <div>
        <div class="centered">
            <h3>Editar</h3>
        </div>
        {{Form::open()}}
        <div class="form-group">
            {{Form::label('nombre')}}
            {{Form::text('nombre',$tipo->nombre,['class'=>'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('descripcion')}}
            {{Form::textArea('descripcion',$tipo->descripcion,['class'=>'form-control'])}}
        </div>
        <div class="centered">
            <a class="manita btn btn-primary save_edit" data-link="/tipoOrganizacionCompetencia/{{$tipo->id}}">Modificar</a>
        </div>

        {{Form::close()}}

    </div>
@else
    Falta pasar el tipo de Torneo
@endif