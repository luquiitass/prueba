@extends('layouts.app'){{--Extiende del blade app--}}

@section('titulo','Inicio')

@section('htmlheader')
    @parent
    {{--Vincular los css--}}
@endsection

@section('menu_inicio','active')



@section('main-content')

    <a href="{{route('telefono.create')}}">Nuevo Telefono</a>

    <ul>
        @foreach($telefonos as $telefono)
            <li>{{$telefono->numero}}</li>
        @endforeach
    </ul>

@endsection



@section('scripts')
    @parent

    <script>

    </script>

@endsection