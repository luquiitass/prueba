@extends('layouts.app'){{--Extiende del blade app--}}

@section('titulo','Seguridad')

@section('htmlheader')
    @parent
    {{--Vincular los css--}}
@endsection

@section('menu_parametros','active')

@section('menu2_seguridad','active')


@section('main-content')

    <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
            <div class="col-form">
                <h3 class="centered">Nuevo Permiso</h3>
                <hr>
                {{Form::open(array('url'=>url('permiso')))}}
                {{Form::token()}}
                <div class="form-group">
                    {{Form::label('Nombre')}}
                    {{Form::text('name',null,array('class'=>'form-control'))}}
                    @include('mensajes.error_input',['name'=>'name'])
                </div>

                <div class="form-group">
                    {{Form::label('slug')}}
                    {{Form::text('slug',null,array('class'=>'form-control'))}}
                    @include('mensajes.error_input',['name'=>'slug'])
                </div>

                <div class="form-group">
                    {{Form::label('model')}}
                    {{Form::text('model',null,array('class'=>'form-control'))}}
                    @include('mensajes.error_input',['name'=>'model'])
                </div>

                <div class="form-group">
                    {{Form::label('Descripcion')}}
                    {{Form::textArea('description',null,array('class'=>'form-control','height'=>'117px'))}}
                    @include('mensajes.error_input',['name'=>'description'])
                </div>
                <div class="centered">
                    {{Form::submit('Crear',array('class'=>'btn btn-primary'))}}
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>

@endsection



@section('scripts')
    @parent

    <script>

    </script>

@endsection