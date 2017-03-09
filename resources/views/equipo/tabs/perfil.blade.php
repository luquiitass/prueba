<div class="row">

    <div class="row portada">
        <div class="panel">
            <div class="cover-photo">
                <div class="fb-timeline-img">
                    <img src="{{asset('img/port.jpg')}}" alt="Portada">
                </div>
                <div class="fb-name">
                    {{--<h2><a href="#">Deyson Bejarano</a></h2>--}}
                </div>
            </div>

            <div class="panel-body">
                <div class="profile-thumb">
                    <img class="" src="{{asset('/img/esc.png')}}" alt="Escudo">
                </div>
                {{--<a href="#" class="fb-user-mail">dbjarano@bootdey.com</a>--}}
                <h2 class="nombre-equipo">{{$equipo->nombre}}</h2>
            </div>
        </div>
    </div>{{--Foto de Portada, Escudo, y nombre--}}

    {{--<div class="col-xs-12 col-md-6">--}}
        {{--<div class="separador_in_tabs resaltar">--}}
            {{--<div class="titulo">--}}
                {{--<span>Datos Del Equipo</span>--}}
            {{--</div>--}}
            {{--<a class="manita" onclick='activarTabs(["config","conf_datos_generales"]);' data-toggle="tab"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>--}}
            {{--@include('equipo.comp_show',compact('equipo'))--}}
        {{--</div>--}}{{--Datos del equipo--}}

        {{--<br>--}}

        {{--<div class="separador_in_tabs resaltar">--}}
            {{--<div class="titulo">--}}
                {{--<span>Datos de Estadio</span>--}}
            {{--</div>--}}
            {{--<a onclick="activarTabs(['config','conf_estadios','creat_estadio']);" class="manita" data-toggle="tab"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>--}}

            {{--@forelse($equipo->estadios as $estadio)--}}
                {{--<div class="well">--}}
                    {{--@include('estadio.comp_show',['estadio'=>$estadio])--}}
                {{--</div>--}}

            {{--@empty--}}
                {{--Sin Estadios--}}
            {{--@endforelse--}}
        {{--</div>--}}

    {{--</div>--}}{{--Columna datos de equipo--}}

    {{--<div class="col-xs-12 col-md-6">--}}
        {{--<div class="separador_in_tabs resaltar">--}}
            {{--<div class="titulo">--}}
                {{--<span>Datos De Contacto</span>--}}
            {{--</div>--}}
            {{--<a onclick="activarTabs(['config','conf_contacto']);" class="manita" data-toggle="tab"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>--}}
            {{--@include('contacto.comp_show',['contacto'=>$equipo->contacto])--}}
        {{--</div>--}}{{--Datos del equipo--}}
    {{--</div>--}}
</div>