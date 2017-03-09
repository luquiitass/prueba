<div class="">
    <div id="tabs" class="borde-bottom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#inicio" data-toggle="tab"> <span class="glyphicon glyphicon-triangle-top tab-select-span"></span> inicio</a></li>
            <li><a href="#fotos" data-toggle="tab">Fotos</a></li>
            <li><a href="#configuracion" data-toggle="tab">Configuraciones</a></li>
        </ul>

        <div class="tab-content bg-white resaltar">

            <div class="tab-pane active" id="inicio">
                @include('competencia.tabs.inicio',compact('competencias'))
            </div>{{--Fin tab perfil--}}

            <div class="tab-pane" id="fotos">
                @include('competencia.tabs.fotos',compact('competencia'))
            </div>{{--Fin tab fotos--}}

            <div class="tab-pane" id="configuracion">
                @include('competencia.tabs.configuracion',compact('competencia'))
            </div>{{--Fin tab fotos--}}

        </div>
    </div>
</div>