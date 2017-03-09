@extends('layouts.app'){{--Extiende del blade app--}}

@section('titulo','Competencia')

@section('htmlheader')
    @parent
    {{--Vincular los css--}}
@endsection

@section('menu_competencias','active')

@section('titulo_seccion')

@endsection

@section('main-content')
        <div class="centered resaltar bg-white">
            <h2 class="Heading--Fancy">
                <span class="linea">{{$competencia->nombre}}</span>
            </h2>
        </div>
        <div class="row">
            {{--
        <div class="col-xs-12 col-md-2">
            @include('liga.tabs')
        </div>
            --}}
            <div class="col-xs-12 col-md-10">
            @yield('liga_configuraciones_content')

        </div>
    </div>


@endsection



@section('scripts')
    @parent

    <script>
        cargarSelect2();
    </script>

@endsection