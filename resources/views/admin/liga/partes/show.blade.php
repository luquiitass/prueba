@extends('admin.liga.root')

@section('htmlheader')
    @parent
    <style>
        .equipos  a{
            color: #5FA0BF;;
            text-decoration: none;
        }
    </style>
@endsection

@section('subemenu_liga_configuraciones','active')

@section('configuraciones_liga_content')
    <div>
        @if(!count($liga->fase())>0)

            @if(count($liga->equipos)>0)
                @if(count($liga->equipos) < 3)
                    <div class="alert alert-info">
                        <p>
                            <i class="fa fa-info-circle"></i>
                            Como minimo esta liga debe tener 3 equipos asociados para generar el fixture
                        </p>
                        <a class="btn btn-primary" href="{{route('admin.liga.equipos',['liga'=>$liga->id])}}"></a>
                    </div>
                @else
                    <p><i class="fa fa-thumbs-o-up"></i> Felicidades ya posee los equipos necesarios para poder generar el fixture</p>

                    <div class="alert bg-info">
                        <h4 class=""><i class=" fa fa-info-circle"></i> Importante:</h4>
                        <p><i class="cl-negro-claro fa fa-asterisk"></i>Recuerde que al generar el fixture las fechas y los partidos se generaran automaticamente </p>
                        <p><i class="cl-negro-claro fa fa-asterisk"></i>Una ves creado el fixture no se podran asociar o quitar equiposa a ésta liga </p>

                        <hr>
                        <div class="row resaltar bg-white equipos">
                            <div class="col-xs-12 col-md-6">
                                <h4>Equipos asociados</h4>
                                <table>
                                    @foreach($liga->equipos as $equipo)
                                        <tr>
                                            <td>
                                                @include('equipo.comp_unEquipo')
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="centered">

                                    <a class="btn btn-app cl-negro-claro edit " data-link="/admin/liga/{{$liga->id}}/generarFixture">
                                        <i class="fa fa-table"></i>
                                        Generar Fixture
                                    </a>

                                </div>
                            </div>
                        </div>

                    </div>
                @endif
            @else
                <div class="alert alert-info">
                    <p>
                        <i class="fa fa-info-circle"></i>
                        Para generar el fixture de la Liga, primero de debe <a class="cl-azul" href="{{route('admin.liga.equipos',['liga'=>$liga->id])}}">asociar los equipos</a>
                    </p>
                </div>

            @endif
        @else
            Otras configuraciones porque ya esta creado el fixture


        @endif
    </div>

@endsection