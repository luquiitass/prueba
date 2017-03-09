<div class="box box-solid">
    <div class="box-body no-padding";">
        <ul class="nav nav-pills nav-stacked">

            <li class="@yield('menu_liga_portada','')">
                <a href="{{url($competencia->url())}}">
                    <i class="fa"></i> Portada
                </a>
            </li>

            <li class="@yield('menu_liga_resultados','')">
                <a href="#">
                    <i class="fa "></i> Resultados
                </a>
            </li>
            <li class="@yield('menu_liga_calendario','')">
                <a href="#">
                    <i class="fa "></i> Calendario
                </a>
            </li>
            <li class="@yield('menu_liga_equipos','')">
                <a href="#">
                    <i class="fa "></i> Equipos
                </a>
            </li>
            <li class="@yield('menu_liga_configuraciones','')">
                <a href="{{route('liga.configuracion.index',['competencia'=>$competencia->id])}}">
                    <i class="fa"></i> Configuraciiones
                </a>
            </li>
        </ul>
    </div>
    <!-- /.box-body -->
</div>