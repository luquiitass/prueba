@if(isset($competencia))
    <div>
        <div class="centered">
            <h2 class="Heading--Fancy">
                <span class="linea">{{$competencia->nombre}}</span>
                <span class="Heading--Fancy__subtitle">Cat. Libres</span>
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
                    {{--<a href="#" class="navbar-brand">{{$competencia->nombre}}</a>--}}
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-6">
                    <ul class="nav navbar-nav submenu-nav">
                        <li class="@yield('competencia_submenu_portada','')">
                            <a href="{{route('competencia.portada',['competencia'=>$competencia->id])}}">Portada</a>
                        </li>
                        <li class="@yield('competencia_submenu_configuraciones','')">
                            <a href="{{route('competencias.configuraciones',['competencias'=>$competencia->id])}}">Configuraciones</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!-- Full Width Column -->


    {{--Contenedores de los menu --}}
@else
    Falta pasar el competencia
@endif