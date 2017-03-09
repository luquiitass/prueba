<div class="resaltar bg-white">
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
</div>