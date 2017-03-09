@extends('competencia.unaCompetencia.root')

@section('competencia_submenu_configuraciones','active')

@section('competencia_content')

    @yield('competencia_configuraciones_migasDePan')
    @yield('competencia_configuraciones_content')

    {{--<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">--}}

        {{--<div class="panel panel-default">--}}
            {{--<div class="panel-heading" role="tab" id="heading_temporadas">--}}
                {{--<h4 class="panel-title">--}}
                    {{--<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_temporadas" aria-expanded="false" aria-controls="collapse_temporadas">--}}
                        {{--Temporadas--}}
                    {{--</a>--}}
                {{--</h4>--}}
            {{--</div>--}}
            {{--<div id="collapse_temporadas" class="panel-collapse collapse {{request()->has('temporadas')?'in':''}}" role="tabpanel" aria-labelledby="heading_temporadas">--}}
                {{--<div class="panel-body">--}}
                    {{--Inicio del contenido de mi tab _temporadas--}}
                    {{--<div>--}}
                        {{--<a class="btn btn-primary create" data-toggle="collapse" href="#collapse_temporada_nueva">Nueva Temporada</a>--}}
                        {{--<div class="collapse" id="collapse_temporada_nueva">--}}
                            {{--<div class="resaltar" id="contenedor_nueva_temporada">--}}
                                {{--@include('temporada.comp_create',compact('competencia'))--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<hr>--}}
                        {{--<div id="contenedor_temporadas">--}}
                            {{--@include('temporada.comp_index',array('temporadas'=>$competencia->temporadas))--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--Fin del contenido de mi tab _temporadas--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}{{--Fin de un tab--}}


        {{--<div class="panel panel-default">--}}
            {{--<div class="panel-heading" role="tab" id="heading_categorias">--}}
                {{--<h4 class="panel-title">--}}
                    {{--<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_categorias" aria-expanded="false" aria-controls="collapse_categorias">--}}
                        {{--Categorias--}}
                    {{--</a>--}}
                {{--</h4>--}}
            {{--</div>--}}
            {{--<div id="collapse_categorias" class="panel-collapse collapse {{request()->has('categorias')?'in':''}}" role="tabpanel" aria-labelledby="heading_categorias">--}}
                {{--<div class="panel-body">--}}
                    {{--<div>--}}

                    {{--</div>Fin del contenido de mi tab categorias--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}{{--Fin de un tab--}}


        {{--<div class="panel panel-default">--}}
            {{--<div class="panel-heading" role="tab" id="heading_torneos">--}}
                {{--<h4 class="panel-title">--}}
                    {{--<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_torneos" aria-expanded="false" aria-controls="collapse_torneos">--}}
                        {{--Torneos--}}
                    {{--</a>--}}
                {{--</h4>--}}
            {{--</div>--}}
            {{--<div id="collapse_torneos" class="panel-collapse collapse {{request()->has('torneos')?'in':''}}" role="tabpanel" aria-labelledby="heading_torneos">--}}
                {{--<div class="panel-body">--}}
                    {{--<div>--}}
                        {{--<div>--}}
                            {{--Temporadas--}}
                            {{--<div class="bfh-selectbox" data-name="selectbox3" data-filter="true" style="width: 200px">--}}
                                {{--@forelse($competencia->temporadas as $temporada)--}}
                                    {{--<div data-value="{{$temporada->id}}">{{$temporada->nombre}}</div>--}}
                                {{--@empty--}}
                                    {{--<div class="alert alert-danger">--}}
                                        {{--Sin temporadas--}}
                                    {{--</div>--}}
                                {{--@endforelse--}}
                            {{--</div>--}}
                        {{--</div>--}}


                    {{--</div>Fin del contenido de mi tab torneos--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}{{----}}{{--Fin de un tab--}}


        {{--<div class="panel panel-default">--}}
            {{--<div class="panel-heading" role="tab" id="heading_equipos">--}}
                {{--<h4 class="panel-title">--}}
                    {{--<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_equipos" aria-expanded="false" aria-controls="collapse_equipos">--}}
                        {{--Equipos--}}
                    {{--</a>--}}
                {{--</h4>--}}
            {{--</div>--}}
            {{--<div id="collapse_equipos" class="panel-collapse collapse {{request()->has('equipos')?'in':''}}" role="tabpanel" aria-labelledby="heading_equipos">--}}
                {{--<div class="panel-body">--}}
                    {{--<div>--}}

                    {{--</div>Fin del contenido de mi tab equipos--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}{{--Fin de un tab--}}

        {{--<div class="panel panel-default">--}}
            {{--<div class="panel-heading" role="tab" id="heading_otros">--}}
                {{--<h4 class="panel-title">--}}
                    {{--<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_otros" aria-expanded="false" aria-controls="collapse_otros">--}}
                        {{--Otros--}}
                    {{--</a>--}}
                {{--</h4>--}}
            {{--</div>--}}
            {{--<div id="collapse_otros" class="panel-collapse collapse {{request()->has('otros')?'in':''}}" role="tabpanel" aria-labelledby="heading_otros">--}}
                {{--<div class="panel-body">--}}
                    {{--<div>--}}

                    {{--</div>Fin del contenido de mi tab otros--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}{{--Fin de un tab--}}

    {{--</div>--}}{{-- Fin del Grupo de acordeo--}}
@endsection