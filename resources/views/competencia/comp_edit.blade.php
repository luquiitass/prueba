@if(isset($competencia))
    <h3>Modificar Competencia</h3>
    {{Form::open(array('url'=>url('competencia/'.$competencia->id.'/update'),'id'=>'form_comp'))}}
    <div class="row">
        {{Form::token()}}
        <div class="col-xs-12 col-md-6">
            <div class="form-group">
                {{Form::label('nombre')}}
                {{Form::text('nombre',$competencia->nombre,array('class'=>'form-control'))}}
            </div>

            <div class="form-group">
                {{Form::label('descripción')}}
                {{Form::textArea('descripcion',$competencia->descripcion,array('class'=>'form-control'))}}
            </div>
        </div>

        <div class="col-xs-12 col-md-6">
            {!! $competencia->html_selectUser() !!}
            {{--<div class="form-group">--}}
            {{--{{Form::label('administrador/es')}}--}}
            {{--{{Form::select('administradores[]',$users,null,array('class'=>'form-control select2','multiple'=>'multiple','data-id_selects'=>json_encode($us),'data-holder'=>'Buscar usuario','data-url'=>'/usersSelect2'))}}--}}
            {{--</div>--}}


            <div class="form-group">
                {{Form::label('organizador de partido')}}
                {{Form::select('org_partidos',array('admin_competencia'=>'administrado por organizador de la competencia','admin_equipo'=>'administrado por equipos'),$competencia->org_partidos,array('class'=>'form-control'))}}
            </div>
        </div>
    </div>
    {{--Form::submit('Modificar',array('class'=>'btn btn-primary center-block'))--}}
    <a class="btn btn-primary save_edit manita" data-link="/competencia/{{$competencia->id}}" >Modificar</a>

    {{Form::close()}}
@else
    Falta pasar la competencia
@endif
