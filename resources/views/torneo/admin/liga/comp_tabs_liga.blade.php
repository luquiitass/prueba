<ul class="nav nav-tabs">
    @if($torneo->fases->count() > 0)
    <li role="presentation" class="@yield('subemenu_torneo_tabla','')"><a href="#">Tabla de Posiciones</a></li>
    <li role="presentation" class="@yield('subemenu_torneo_fechas','')"><a href="{{route('torneo.fechas.configuraciones',['torneo'=>$torneo->id,'#fechas'])}}">Fechas</a></li>
    <li role="presentation" class="@yield('subemenu_torneo_resultados','')"><a href="{{route('torneo.resultados.configuraciones',['torneo'=>$torneo->id,'#resultados'])}}">Resultados</a></li>
    <li role="presentation" class="@yield('subemenu_torneo_calendario','')"><a href="{{route('torneo.calenndario.configuraciones',['torneo'=>$torneo->id,'#calendario'])}}">Calendario</a></li>
    @endif
    <li role="presentation" class="@yield('subemenu_torneo_equipos','')"><a href="{{route('torneo.equipos.configuraciones',['torneo'=>$torneo->id,'#equipos'])}}">Equipos</a></li>
</ul>