@extends('torneo.admin.show_configuraciones')

@section('subemenu_torneo_calendario','active')

@section('configuraciones_torneo_content')
    <div id="calendario">
        <!-- /.box-header -->
        <div class="box-body">
            <div id="carousel-example-generic" class="carousel" data-ride="">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">
                    @php($fechas = $torneo->fechas())
                    @foreach($fechas as $fecha)
                        <div class="item {{(isset($fechaActiva) && $fechaActiva->id==$fecha->id)?'active':$fecha->id==$fechas->first()->id?'active':''}}">
                            <div class="centered box-header with-border">
                                <h3 class="box-title">{{$fecha->nombre}}</h3>
                                <p>
                                    <a href="">Modificar partidos</a>
                                    <span class="separador"></span>
                                    <a href="">Asignar fechas a los partidos</a>
                                    <span class="separador"></span>
                                    <a href="">Editar datos de fechas</a>
                                </p>
                            </div>
                            <div class="centered borde-bottom">

                                <table class="" style="margin: 0 auto;">
                                    @foreach($fecha->partidos as $partido)
                                        <tr style="margin-top: 10px;">
                                            <td colspan="3"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"></td>
                                        </tr>
                                        <tr style="padding: 20px;">
                                            <td style="padding: 8px;">
                                                <p class="text-right">
                                                    {{$partido->equipo1->nombre}}
                                                    <img src="{{asset($partido->equipo1->getFotoEscudo())}}" alt="Escudo">
                                                </p>
                                            </td>

                                            <td style="padding: 0px 10px;">vs</td>


                                            <td style="padding: 8px;">
                                                <p class="text-left">
                                                    <img src="{{asset($partido->equipo2->getFotoEscudo())}}" alt="Escudo">
                                                    {{$partido->equipo2->nombre}}
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-center">

                                            </td>
                                        </tr>

                                        <tr style="padding-bottom: 10px;">
                                            <td colspan="3" class="centered">
                                                <a class="manita edit" data-toggle="modal" data-target="#myModal" data-link="" >Ver</a>
                                                <span class="separador"></span>
                                                <a class="manita edit" data-toggle="modal" data-target="#myModal" data-link=""  >Editar</a>
                                            </td>
                                        </tr>

                                    @endforeach
                                </table>

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