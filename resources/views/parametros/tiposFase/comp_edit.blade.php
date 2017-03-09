@if(isset($tipo))
<div>
    <div class="centered">
        <h3>Edita Tipo de Fase</h3>
    </div>
    {{Form::open()}}

    @if(isset($tipoTorneo))
        {{Form::hidden('tipo_torneo_id',$tipo->tipoTorneo->id)}}
    @else
        @include('parametros.tiposOrganizacionCompetencia.comp_select')
    @endif

    <div class="form-group">
        {{Form::label('nombre')}}
        {{Form::text('nombre',$tipo->nombre,['class'=>'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('descripcion')}}
        {{Form::textArea('descripcion',$tipo->descripcion,['class'=>'form-control'])}}
    </div>
    <div class="centered">
        <a class="manita btn btn-primary save_edit" data-link="/tipoFase/{{$tipo->id}}">Modificar</a>
    </div>

    {{Form::close()}}
</div>
@else
    <div class="alert">
        Falta pasar el tipo de Fase
    </div>
@endif