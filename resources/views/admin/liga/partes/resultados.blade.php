@extends('admin.liga.root')

@section('subemenu_liga_resultados','active')

@section('configuraciones_liga_content')

    <div id="resultados">
        <!-- /.box-header -->
        <div class="box-body">
            <div id="carousel-example-generic" class="carousel" data-ride="">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">
                    @php($fechas = $liga->fechas())
                    @foreach($fechas as $fecha)
                        <div class="item {{$fecha->id==$fechas->first()->id?'active':''}}">
                            <div class="centered box-header with-border">
                                <h3 class="box-title">{{$fecha->nombre}}</h3>
                            </div>

                            @if(!empty($fecha->equipoLibre))
                                <div>
                                    <h3>{{$fecha->equipoLibre->nombre}} <strong>(libre)</strong></h3>
                                </div>
                            @endif

                            <div class="centered borde-bottom">
                                    @foreach($fecha->partidos as $partido)


                                        <div class="centered text-muted">
                                            Local: {{empty($partido->equipoLocal)?'no definido':$partido->equipoLocal->nombre}}
                                            <a class="manita edit" data-toggle="modal" data-target="#myModal" data-link="/admin/partido/{{$partido->id}}/editEquipoLocal"> <i class="fa fa-home" data-toggle="tooltip" title="Modificar equipo Local"></i></a>
                                        </div>

                                        <div class="centered text-muted">
                                            {{$partido->date()}} {{$partido->time()}}
                                            <a class="delete manita" data-toggle="modal" data-target="#myModal" data-link="/admin/partido/{{$partido->id}}/editFechaHora" ><i class="fa fa-calendar" data-toggle="tooltip" title="Modificar fecha y hora"></i> <i class="fa fa-clock-o" data-toggle="tooltip" title="Modificar fecha y hora"></i></a>
                                        </div>

                                        @include('admin.partido.comp_show')

                                    @endforeach

                            </div>
                        </div>
                    @endforeach

                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <span class="fa fa-angle-right"></span>
                </a>
            </div>
        </div>
        <!-- /.box-body -->
    </div>

@endsection