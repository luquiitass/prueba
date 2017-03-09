@extends('layouts.app'){{--Extiende del blade app--}}

@section('titulo','Inicio')

@section('htmlheader')
    @parent
    {{--Vincular los css--}}
    <link href="{{ asset('plugins/datepicker/datepicker3.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('menu_inicio','active')



@section('main-content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="col-form">
                <h3>Nuevo Equipo</h3>

                {{Form::open(array('url'=>url('equipo/'.$equipo->id),'id'=>'form_equipo','method'=>'PUT'))}}
                {{Form::token()}}
                <div class="form-group">
                    {{Form::label('nombre')}}
                    {{Form::text('nombre',$equipo->nombre,array('class'=>'form-control'))}}
                </div>
                {{--<div class="form-group">--}}
                {{--{{Form::label('apodo')}}--}}
                {{--{{Form::text('apodo',null,array('class'=>'form-control'))}}--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--{{Form::label('fundado')}}--}}
                    {{--{{Form::text('fundado',$equipo->fundado,array('class'=>'form-control datepicker'))}}--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                {{--{{Form::label('fundadores')}}--}}
                {{--{{Form::text('fundadores',null,array('class'=>'form-control'))}}--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                {{--{{Form::label('descripcion')}}--}}
                {{--{{Form::textArea('descripcion',null,array('class'=>'form-control'))}}--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--{{Form::label('administrador/es')}}--}}
                    {{--{{Form::select('administradores[]',$users,null,array('class'=>'form-control select2','multiple'=>'multiple','data-id_selects'=>json_encode($us),'data-url'=>'/usersSelect2','data-holder'=>'Bucas usuario'))}}--}}
                    {{--<br>--}}
                {{--</div>--}}

                {!!$equipo->html_selectUser() !!}

                {{Form::submit('Crear',array('class'=>'fomr-control btn btn-primary center-block'))}}
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection



@section('scripts')
    @parent
    <script src="/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="/plugins/datepicker/locales/bootstrap-datepicker.es.js"></script>

    <script src="/plugins/select2/select2.min.js"></script>
    <script src="/plugins/select2/i18n/es.js"></script>

    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

    <script>
        $('.datepicker').datepicker({
            format: "dd-mm-yyyy",
            language: "es",
            autoclose: true,
        });

        cargarSelect2();
    </script>

    {!! JsValidator::formRequest('App\Http\Requests\EquipoRequestStore', '#form_equipo') !!}


@endsection