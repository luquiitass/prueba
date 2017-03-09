<div class="row" >
    <div class="col-xs-12 col-md-6">
        <div class="row">
            <div class="{{isset($colPais)?'' :'hide'}}" id="columna-paises">
                <div class="tabs col-form">
                    <h3 class="text-center">Paises</h3>
                    <hr>
                    <div class="nuevo text-center ">
                        {{--@permission('pais.create')--}}

                        <button data-toggle="modal" data-target="#myModal" class = ' create btn btn-primary'  data-link = '/pais/create'>
                            Nuevo Pais
                        </button>
                        {{--@endpermission--}}
                    </div>

                    <ul id="ul_paises" class="nav nav-pills nav-stacked">
                        @forelse($paises as $pais)

                            @include('pais.unPais',array('pais',$pais))

                        @empty
                            <li class="alert bg-info"><span>Sin Paises</span></li>
                        @endforelse
                    </ul>
                </div>
            </div>

            <div class="{{isset($colProvincia)?'col-xs-12':'hide'}}" id="columna-provincias" >
                <div class="tab-content col-form" >
                    @foreach($paises as $pais)
                        <div id="p_{{$pais->id}}" class="tab-pane {{isset($paisActivo) && $paisActivo == $pais->id?'active':''}}" >
                            <h3 class="text-center">Provincias de <b class="underline">{{$pais->nombre}}</b></h3>
                            <hr>

                            <div class="nuevo text-center ">
                                <button onclick="mostrarPaises();" class="btn btn-warning">Paises</button>
                                <button data-toggle="modal" data-target="#myModal" class = "create btn btn-primary "  data-link ="/{{$pais->id}}/provincias/create" > Nueva Provincia</button>
                            </div>
                            <ul id="ul_provincias" class="nav nav pills nav-stacked">
                                @forelse($pais->provincias as $provincia)

                                    @include('provincia.unaProvincia',array('provincia'=>$provincia))

                                @empty
                                    <li class="provincia alert bg-info"><strong>{{$pais->nombre}}</strong> no posee Provincias</li>
                                @endforelse
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="{{isset($colLocalidad)?'col-xs-12':'hide'}}" id="columna-localidades">
                <div class="tab-content col-form">
                    @foreach($paises as $pais)
                        @foreach($pais->provincias as $provincia)
                            <div id="pr_{{$provincia->id}}" class="tab-pane {{isset($provinciaActiva) && $provinciaActiva == $provincia->id?'active':''}}">

                                <h3 class="text-center">Localidades de <b class="underline">{{$pais->nombre}}, {{$provincia->nombre}}</b></h3>
                                <hr>

                                <div class="nuevo text-center ">
                                    <button onclick="mostrarProvincia();" class="btn btn-warning">Provincias</button>
                                    <button data-toggle="modal" data-target="#myModal" class = "create btn btn-primary "  data-link ="/{{$provincia->id}}/localidad/create" > Nueva Provincia</button>
                                </div>

                                <ul id="ul_localidades" class="nav nav pills nav-stacked">
                                    @forelse($provincia->localidades as $localidad)
                                        @include('localidad.unaLocalidad',array('localidad'=>$localidad))

                                    @empty
                                        <li class="localidad alert bg-info"><strong>{{$provincia->nombre }}</strong> no posee Localidades</li>
                                    @endforelse
                                </ul>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>

        </div>
    </div>
    <div class="col-xs-12 col-md-6">
        <h3>Busqueda</h3>
        @include('pais.busqueda')
    </div>
</div>
