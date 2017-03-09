@extends('layouts.app'){{--Extiende del blade app--}}

@section('titulo','Inicio')

@section('htmlheader')
    @parent
    {{--Vincular los css--}}
    <link href="{{asset('/plugins/datepicker/datepicker3.css')}}" rel="stylesheet" type="text/css">

    <style>
        .carousel-inner > .item > img, .carousel-inner > .item > a > img {
            margin: auto;
        }

    </style>
@endsection

@section('menu_competencias','active')

@section('menu2_'.$competencia->nombre,'active')


@section('main-content')

    {{--<div class="">--}}
        {{--<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">--}}
            {{--<ol class="carousel-indicators">--}}
                {{--<li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>--}}
                {{--<li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>--}}
                {{--<li data-target="#carousel-example-generic" data-slide-to="2" class="active"></li>--}}
            {{--</ol>--}}
            {{--<div class="carousel-inner ">--}}
                {{--<div class="item">--}}
                    {{--<img src="http://placehold.it/900x500/3c8dbc/ffffff&amp;text=Tabla de Posiciones" alt="">--}}

                    {{--<div class="carousel-caption">--}}
                        {{--First Slide--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="item">--}}
                    {{--<img src="http://placehold.it/900x500/3c8dbc/ffffff&amp;text=+++Resultados+++" alt="">--}}

                    {{--<div class="carousel-caption">--}}
                        {{--Second Slide--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="item active">--}}
                    {{--<img src="http://placehold.it/900x500/3c8dbc/ffffff&amp;text=++++++Fechas++++++" alt="">--}}

                    {{--<div class="carousel-caption">--}}
                        {{--Third Slide--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">--}}
                {{--<span class="fa fa-angle-left"></span>--}}
            {{--</a>--}}
            {{--<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">--}}
                {{--<span class="fa fa-angle-right"></span>--}}
            {{--</a>--}}
        {{--</div>--}}
    {{--</div>--}}

    <div class="centered">
        <h2 class="Heading--Fancy">
            <span>{{$competencia->nombre}}</span>
            <span class="Heading--Fancy__subtitle"></span>
        </h2>
    </div>



    {{--@include('competencia.tabs.tabs',compact('competencia'))--}}

    <div>
        <div class="filtros">
            <div class="filtro">
                <button class="btn btn-primary create" data-toggle="modal" data-target="#myModal" data-link="/temporada/{{$competencia->id}}/create">Nueva Temporada</button>
                @include('temporada.comp_index',['temporadas'=>$competencia->temporadas])
            </div>
            <div class="filtro">
                {{--<button class="btn btn-primary create" data-toggle="modal" data-target="#myModal" data-link="/torneo/{{$competencia->temporadaActiva()->id}}/create">Nueva Temporada</button>--}}
                {{--@include('temporadas.comp_index',['temporadas'=>$competencia->temporadas])--}}
            </div>
        </div>
    </div>


@endsection



@section('scripts')
    @parent
    <script src="{{asset('/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('/plugins/datepicker/bootstrap-datepicker.es.min.js')}}"></script>

    <script>

    </script>

@endsection