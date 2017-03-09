@extends('layouts.app'){{--Extiende del blade app--}}

@section('titulo','Competencia')

@section('htmlheader')
    @parent
    {{--Vincular los css--}}
@endsection

@section('menu_competencias','active')

@section('main-content')

    @include('competencia.unaCompetencia.submenu',compact('competencia'))

    @yield('competencia_content')

@endsection



@section('scripts')
    @parent

    <script>
        cargarSelect2();
    </script>

@endsection