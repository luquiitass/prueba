@if(isset($equipo))
    <div>
        <div class="centered">
            <h2 class="Heading--Fancy">
                <span class="linea">{{$equipo->nombre}}</span>
                <span class="Heading--Fancy__subtitle">Cat. {{$equipo->categoria->nombre}}</span>
            </h2>
        </div>

        <nav class="navbar navbar-default submenu">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="collapsed navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-6" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    {{--<a href="#" class="navbar-brand">{{$equipo->nombre}}</a>--}}
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-6">
                    <ul class="nav navbar-nav submenu-nav">
                        <li class="@yield('equipo_submenu_perfil','')">
                            <a href="{{url("/equipo/$equipo->id/perfil")}}">Perfil</a>
                        </li>
                        <li class="@yield('equipo_submenu_partidos','')">
                            <a href="#">Partidos</a>
                        </li>
                        <li class="@yield('equipo_submenu_calendario','')">
                            <a href="#">Calendario</a>
                        </li>
                        <li class="@yield('equipo_submenu_jugadores','')">
                            <a href="{{url("equipo/$equipo->id/jugadores")}}">Jugadores</a>
                        </li>
                        <li class="@yield('equipo_submenu_fotos','')">
                            <a href="#">Fotos</a>
                        </li>
                        <li class="@yield('equipo_submenu_configuraciones','')">
                            <a href="#">Configuraciones</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

<!-- Full Width Column -->


{{--Contenedores de los menu --}}
@else
    Falta pasar el equipo
@endif