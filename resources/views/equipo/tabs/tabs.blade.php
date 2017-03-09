<div id="tabs" class="borde-bottom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#perfil" data-toggle="tab"> <span class="glyphicon glyphicon-triangle-top tab-select-span"></span> Perfil</a></li>
        <li><a href="#resultados" data-toggle="tab">Resultados</a></li>
        <li><a href="#p_fechas" data-toggle="tab">Proximas Fechas</a></li>
        <li><a href="#jugadores" data-toggle="tab">Jugadores</a></li>
        <li><a href="#fotos" data-toggle="tab">Fotos</a></li>
        <li><a href="#config" data-toggle="tab">Configuraciones</a></li>
    </ul>

    <div class="tab-content bg-white resaltar">

        <div class="tab-pane active" id="perfil">
            @include('equipo.tabs.perfil',compact('equipo'))
        </div>{{--Fin tab perfil--}}

        <div class="tab-pane" id="resultados">
            @include('equipo.tabs.resultados',compact('equipo'))
        </div>{{--Fin tab resultados--}}

        <div class="tab-pane" id="p_fechas">
            @include('equipo.tabs.proximas_fechas',compact('equipo'))
        </div>{{--Fin tab Proximas Fechas--}}

        <div class="tab-pane" id="jugadores">
            @include('equipo.tabs.jugadores',compact('equipo'))
        </div>{{--Fin tab Proximas Fechas--}}

        <div class="tab-pane" id="fotos">
            @include('equipo.tabs.fotos',compact('equipo'))
        </div>{{--Fin tab fotos--}}

        <div class="tab-pane" id="config">
            @include('equipo.tabs.configuraciones',compact('equipo'))
        </div>{{--Fin tab fotos--}}

    </div>
</div>