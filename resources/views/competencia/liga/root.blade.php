@extends('layouts.app'){{--Extiende del blade app--}}

@section('titulo','Competencia')

@section('htmlheader')
    @parent
    {{--Vincular los css--}}
@endsection

@section('menu_competencias','active')

@section('titulo_seccion')
    <p class="page-header">
            {{$competencia->nombre}}
    </p>
@endsection

@section('main-content')
        <div class="row">
        <div class="col-xs-12 col-md-2">
            @include('competencia.liga.tabs')
        </div>
        <div class="col-xs-12 col-md-10">
            @yield('liga_competencia_content')

        </div>
    </div>


@endsection



@section('scripts')
    @parent

    <script>
        cargarSelect2();
    </script>

@endsection