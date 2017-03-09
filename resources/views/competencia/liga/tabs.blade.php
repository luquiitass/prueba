<div class="box box-solid">
    <div class="box-body no-padding" style="display: block;">
        <ul class="nav nav-pills nav-stacked">
            <li class="@yield('menu_cmompetencia_portada','')">
                <a href="{{url($competencia->url())}}">
                    <i class="fa"></i> Portada
                </a>
            </li>

            <li class="@yield('menu_cmompetencia_resultados','')">
                <a href="#">
                    <i class="fa "></i> Resultados
                </a>
            </li>
            <li class="@yield('menu_cmompetencia_calendario','')">
                <a href="#">
                    <i class="fa "></i> Calendario
                </a>
            </li>
            <li class="@yield('menu_cmompetencia_equipos','')">
                <a href="#">
                    <i class="fa "></i> Equipos
                </a>
            </li>
            <li class="@yield('menu_configuraciones_competencia','')">
                <a href="{{route('liga.configuracion.competencia',['competencia'=>$competencia->id])}}">
                    <i class="fa"></i> Configuraciiones
                </a>
            </li>
        </ul>
    </div>
    <!-- /.box-body -->
</div>