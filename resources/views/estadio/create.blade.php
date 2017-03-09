@extends('layouts.app'){{--Extiende del blade app--}}

@section('titulo','Nuevo Estadio')

@section('htmlheader')
    @parent
    {{--Vincular los css--}}
@endsection

@section('menu_estadios','active')



@section('main-content')
<div class="row">
    <div class="col-xs-12 col-md-8 col-md-offset-2">
        <div class="col-form">
            <h3>Nuevo Estadio</h3>
            {{Form::open(array('url'=>url('estadio')))}}
                {{Form::token()}}
                <div class="form-group">
                    {{Form::label('nombre')}}
                    {{Form::text('nombre',null,array('class'=>'form-control'))}}
                </div>

                <div class="form-group">
                    {{Form::label('alias')}}
                    {{Form::text('alias',null,array('class'=>'form-control'))}}
                </div>

                <div class="form-group">
                    {{Form::label('capasidad')}}
                    {{Form::text('capasidad',null,array('class'=>'form-control'))}}
                </div>

                <div class="form-group">
                    {{Form::label('dueños')}}
                    {{Form::text('dueños',null,array('class'=>'form-control'))}}
                </div>

                <div class="form-group">
                    {{Form::label('arquitectos')}}
                    {{Form::text('arquitectos',null,array('class'=>'form-control'))}}
                </div>

                <div class="form-group">
                    {{Form::label('inauguracion')}}
                    {{Form::text('inauguracion',null,array('class'=>'form-control'))}}
                </div>

                @include('otros.direccion.direccion ')

                {{Form::submit('Guardar',array('class'=>'btn btn-primary center-block'))}}

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