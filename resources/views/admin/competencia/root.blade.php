@extends('layouts.app'){{--Extiende del blade app--}}

@section('titulo','Competencias')

@section('htmlheader')
    @parent
    {{--Vincular los css--}}
@endsection

@section('menu_competencias','active')

@section('menu2_admCompetencias','active')


@section('main-content')
    <div class="centered resaltar bg-white">
        <h2 class="Heading--Fancy">
            <span class="linea">{{$competencia->nombre}}</span>
        </h2>
    </div>

    <div>
        <ol class="breadcrumb">
            @yield('admin_competencia_migas')
        </ol>
    </div>


    @yield('admin_competencia_content')
@endsection



@section('scripts')
    @parent

    <script>

    </script>

@endsection