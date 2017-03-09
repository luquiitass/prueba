@extends('layouts.app'){{--Extiende del blade app--}}

@section('titulo','Paises')
@section('menu2_pasies','active')

@section('htmlheader')
    @parent
    {{--Vincular los css--}}
    <style>
        button {
            margin:0 auto;
            display:block;
        }
        .nuevo{
            margin: 3%;
            align-items: center;

        }
        .pais{

        }
        .pais > .btn-group{

        }
        
        .provincia{
            padding: 10px !important;
        }
        .localidad{
            padding: 10px !important;
        }

        .list-group-item.active, .list-group-item.active:hover, .list-group-item.active:focus {
            z-index: 2;
            color: #262424;
            background-color: #bbf0be;
            border-color: #a0c9ed;
        }
        #ul_paises,#ul_provincias,#ul_localidades {
            height: 400px;
            overflow: auto;
            border: 1px solid #e7dbdb;
            border-radius: 3px;
        }

    </style>
@endsection

@section('menu_parametros','active')

@section('menu2_paises','active')


@section('main-content')

    {{--@include('flash::message')--}}
    <div id="content">

        @include('pais.html_pais_provincia_localidad',array('paises',$paises))
        {{--<div class="row" style="max-height: 500px; background:#FFF;">
            <div class="col-xs-4">
                <h3>Paises</h3>
                <div class="nuevo text-center ">
                    <button data-toggle="modal" data-target="#myModal" class = ' create btn btn-info blo'  data-link = '/pais/create'>
                        Nuevo Pais
                    </button>
                </div>

                <div class="tabs" style="height: 400px;overflow: auto">
                    <ul id="ul_paises" class="nav nav-pills nav-stacked list-group">
                        @forelse($paises as $pais)

                            @include('pais.unPais',array('pais',$pais))
                            --}}{{--<li class="pais">--}}{{--
                            --}}{{--{{$pais->nombre}}--}}{{--
                            --}}{{--<div class="btn-group pull-right">--}}{{--
                            --}}{{--<button data-toggle="modal" data-target="#myModal"  class="delete btn btn-danger " data-link="/pais/{{$pais->id}}/deleteMsg">--}}{{--
                            --}}{{--<i class="fa fa-trash" aria-hidden="true"></i>--}}{{--
                            --}}{{--</button>--}}{{--
                            --}}{{--<button data-toggle="modal" data-target="#myModal" class="edit btn btn-info" data-link="/">--}}{{--
                            --}}{{--<i class="fa fa-pencil" aria-hidden="true"></i>--}}{{--
                            --}}{{--</button>--}}{{--
                            --}}{{--<button class="btn btn-success " href="#p_{{$pais->id}}" data-pais="{{$pais->id}}" data-toggle="tab">--}}{{--
                            --}}{{--Provincias--}}{{--
                            --}}{{--<i class="fa fa-chevron-right" aria-hidden="true"></i>--}}{{--
                            --}}{{--</button>--}}{{--
                            --}}{{--</div>--}}{{--

                            --}}{{--</li>--}}{{--
                        @empty
                            <li class="alert alert-info"><span>Sin Paises</span></li>
                        @endforelse
                    </ul>
                </div>
            </div>

            <div class="col-xs-4" style="max-height: 500px;overflow: auto">
                <h3>Provincias</h3>
                <div class="tab-content">
                    @foreach($paises as $pais)
                        <div id="p_{{$pais->id}}" class="tab-pane">
                            <div class="nuevo text-center ">
                                <button data-toggle="modal" data-target="#myModal" class = "create btn btn-info "  data-link ="/{{$pais->id}}/provincias/create" > Nueva Provincia</button>
                            </div>
                            <ul id="ul_provincias" class="nav nav pills nav-stacked">
                                @forelse($pais->provincias as $provincia)

                                    @include('provincia.unaProvincia',array('provincia'=>$provincia))
                                    --}}{{--<li class="provincia">--}}{{--
                                    --}}{{--{{$provincia->nombre}}--}}{{--
                                    --}}{{--<div class="btn-group pull-right">--}}{{--
                                    --}}{{--<button data-toggle="modal" data-target="#myModal"  class="delete btn btn-danger " data-link="/provincia/{{$provincia->id}}/deleteMsg">--}}{{--
                                    --}}{{--<i class="fa fa-trash" aria-hidden="true"></i>--}}{{--
                                    --}}{{--</button>--}}{{--
                                    --}}{{--<button href="#" class="btn btn-info  ">--}}{{--
                                    --}}{{--<i class="fa fa-pencil" aria-hidden="true"></i>--}}{{--
                                    --}}{{--</button>--}}{{--
                                    --}}{{--<button class="btn btn-success"  data-prov="{{$provincia->id}}" href="#pr_{{$provincia->id}}" data-toggle="tab">--}}{{--
                                    --}}{{--Localidades--}}{{--
                                    --}}{{--<i class="fa fa-chevron-right" aria-hidden="true"></i>--}}{{--
                                    --}}{{--</button>--}}{{--
                                    --}}{{--</div>--}}{{--
                                    --}}{{--</li>--}}{{--
                                @empty
                                    <li class="alert alert-info"><strong>{{$pais->nombre}}</strong> no posee Provincias</li>
                                @endforelse
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-xs-4" style="max-height: 500px;overflow: auto">
                <h3>Localidades</h3>
                <div class="tab-content">
                    @foreach($paises as $pais)
                        @foreach($pais->provincias as $provincia)
                            <div id="pr_{{$provincia->id}}" class="localidad tab-pane">

                                <div class="nuevo text-center ">
                                    <button data-toggle="modal" data-target="#myModal" class = "create btn btn-info "  data-link ="/{{$provincia->id}}/localidad/create" > Nueva Provincia</button>
                                </div>

                                <ul id="ul_localidades" class="nav nav pills nav-stacked">
                                    @forelse($provincia->localidades as $localidad)
                                        @include('localidad.unaLocalidad',array('localidad'=>$localidad))
                                        --}}{{--<li class="localidad" >--}}{{--
                                        --}}{{--{{$localidad->nombre}}--}}{{--
                                        --}}{{--<div class="btn-group pull-right">--}}{{--
                                        --}}{{--<button data-toggle="modal" data-target="#myModal"  class="delete btn btn-danger " data-link="/localidad/{{$localidad->id}}/deleteMsg">--}}{{--
                                        --}}{{--<i class="fa fa-trash" aria-hidden="true"></i>--}}{{--
                                        --}}{{--</button>--}}{{--
                                        --}}{{--<button href="#" class="btn btn-info  ">--}}{{--
                                        --}}{{--<i class="fa fa-pencil" aria-hidden="true"></i>--}}{{--
                                        --}}{{--</button>--}}{{--
                                        --}}{{--</div>--}}{{--
                                        --}}{{--</li>--}}{{--
                                    @empty
                                        <li class="alert alert-info"><strong>{{$provincia->nombre }}</strong> no posee Localidades</li>
                                    @endforelse
                                </ul>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>--}}
    </div>

@endsection



@section('scripts')
    @parent

    <script>

        cargarTablas();

        $(document).on('click','.pais',function () {
            $('.localidad').parents('.tab-pane').removeClass('active');
        });

        mostrarPaises();

        function mostrarPaises() {
            $('#columna-paises').removeClass().addClass('col-xs-12');
            $('#columna-provincias').removeClass().addClass('hide');
            $('#columna-localidades').removeClass().addClass('hide');
        }

        function mostrarProvincia() {
            $('#columna-paises').removeClass().addClass('hide');
            $('#columna-provincias').removeClass().addClass('col-xs-12');
            $('#columna-localidades').removeClass().addClass('hide');
        }

        function mostrarLocalidades() {
            $('#columna-paises').removeClass().addClass('hide');
            $('#columna-provincias').removeClass().addClass('hide');
            $('#columna-localidades').removeClass().addClass('col-xs-12');
        }

    </script>

@endsection