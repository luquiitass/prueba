@extends('layouts.app'){{--Extiende del blade app--}}

@section('titulo','Inicio')

@include('crop.incluir_librerias_jcrop')

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

            @include('equipo.comp_create')
            {{--<div class="col-form">--}}
                {{--<h3>Nuevo Equipo</h3>--}}

                {{--{{Form::open(array('url'=>url('equipo'),'id'=>'form_equipo'))}}--}}
                    {{--{{Form::token()}}--}}
                    {{--<div class="form-group">--}}
                        {{--{{Form::label('nombre')}}--}}
                        {{--{{Form::text('nombre',null,array('class'=>'form-control'))}}--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--{{Form::label('apodo')}}--}}
                        {{--{{Form::text('apodo',null,array('class'=>'form-control'))}}--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--{{Form::label('fundado')}}--}}
                        {{--{{Form::text('fundado',null,array('class'=>'form-control datepicker'))}}--}}
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
                        {{--{{Form::select('administradores[]',array(),null,array('class'=>'form-control select2','multiple'=>'multiple','data-url'=>'/usersSelect2','data-holder'=>'Bucas usuario'))}}--}}
                        {{--<br>--}}
                    {{--</div>--}}
                    {{--@include('categoria.comp_select')--}}

                    {{--@include('otros.selectUser')--}}

                    {{--@include('otros.direccion.direccion')--}}

                    {{--{{Form::submit('Crear',array('class'=>'fomr-control btn btn-primary center-block'))}}--}}
                {{--{{Form::close()}}--}}
            {{--</div>--}}
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