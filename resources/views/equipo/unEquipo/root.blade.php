@extends('layouts.app'){{--Extiende del blade app--}}

@section('titulo','Inicio')

@section('htmlheader')
    @parent
    {{--Vincular los css--}}
@endsection

@section('menu_inicio','active')



@section('main-content')

    @include('equipo.unEquipo.submenu',compact('equipo'))

    @yield('equipo_conten')

@endsection



@section('scripts')
    @parent

    <script>

    </script>

@endsection