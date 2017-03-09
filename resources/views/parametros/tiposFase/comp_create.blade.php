<div>
    <div class="centered">
        <h3>Nuevo Tipo de Fase</h3>
    </div>
    {{Form::open()}}

        @if(isset($tipoTorneo))
        {{Form::hidden('tipo_torneo_id',$tipoTorneo->id)}}
        @else
            @include('parametros.tiposOrganizacionCompetencia.comp_select')
        @endif

        <div class="form-group">
            {{Form::label('nombre')}}
            {{Form::text('nombre',null,['class'=>'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('descripcion')}}
            {{Form::textArea('descripcion',null,['class'=>'form-control'])}}
        </div>
        <div class="centered">
            <a class="manita btn btn-primary save_ajax" data-link="/tipoFase">Guardar</a>
        </div>

    {{Form::close()}}
</div>