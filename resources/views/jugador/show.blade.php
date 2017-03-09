@extends('layouts.app'){{--Extiende del blade app--}}

@section('titulo','Jugador')

@section('htmlheader')
    @parent
    {{--Vincular los css--}}
@endsection

@section('menu_inicio','active')



@section('main-content')
    <h3>mam</h3>
    <h3> {{$jugador->nombre}} {{$jugador->apellido}}</h3>

@endsection



@section('scripts')
    @parent

    <script>

    </script>

@endsection