@extends('layouts.app'){{--Extiende del blade app--}}

@section('titulo','Competencia')

@section('htmlheader')
    @parent
    {{--Vincular los css--}}
    <link href="{{ asset('plugins/datepicker/datepicker3.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('menu_competencias','active')

@section('menu2_nuevaCompetencia','active')


@section('main-content')
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <div class="col-form">
                <h3>Modificar Competencia</h3>
                {{Form::open(array('url'=>url('competencias'.$competencia->id.'/update'),'id'=>'form_comp'))}}
                <div class="form-group">
                    {{Form::label('nombre')}}
                    {{Form::text('nombre',$competencia->nombre,array('class'=>'form-control'))}}
                </div>

                <div class="form-group">
                    {{Form::label('descripción')}}
                    {{Form::textArea('descripcion',$competencia->descripcion,array('class'=>'form-control'))}}
                </div>

                {!! $competencia->html_selectUser() !!}
                {{--<div class="form-group">--}}
                    {{--{{Form::label('administrador/es')}}--}}
                    {{--{{Form::select('administradores[]',$users,null,array('class'=>'form-control select2','multiple'=>'multiple','data-id_selects'=>json_encode($us),'data-holder'=>'Buscar usuario','data-url'=>'/usersSelect2'))}}--}}
                {{--</div>--}}


                <div class="form-group">
                    {{Form::label('organizador de partido')}}
                    {{Form::select('org_partidos',array('admin_competencia'=>'administrado por organizador de la competencia','admin_equipo'=>'administrado por equipos'),$competencia->org_partidos,array('class'=>'form-control'))}}
                </div>
                {{Form::token()}}
                {{Form::submit('Modificar',array('class'=>'btn btn-primary center-block save_edit'))}}
                {{Form::close()}}

            </div>
        </div>
    </div>

@endsection



@section('scripts')
    @parent
    <script src="/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="/plugins/datepicker/locales/bootstrap-datepicker.es.js"></script>

    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>


    <script src="/plugins/select2/select2.min.js"></script>
    <script src="/plugins/select2/i18n/es.js"></script>

    <script>

        $('.datepicker').datepicker({
            format: "dd-mm-yyyy",
            language: "es",
            autoclose: true,
        });

        cargarSelect2();

    </script>

    {!! JsValidator::formRequest('App\Http\Requests\CompetenciaRequestUpdate', '#form_comp') !!}

@endsection