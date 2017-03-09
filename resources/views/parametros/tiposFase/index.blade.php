@extends('layouts.app'){{--Extiende del blade app--}}

@section('titulo','Tipos')

@section('htmlheader')
    @parent
    {{--Vincular los css--}}
@endsection

@section('menu_parametros','active')

@section('menu2_tipo_fase','active')



@section('main-content')

    <div>
        <h3>Tipos de Fase</h3>
        <a class="manita edit btn btn-primary " data-toggle="modal" data-target="#myModal" data-link="/tipoFase/create">Nuevo Tipo de Fase</a>
        @if(count($tipos)>0)
            <table class="table resaltar bg-white">
                <thead>
                    <th>Nombre</th>
                    <th>Tipo Torneo</th>
                    <th>Descripcion</th>
                    <th>Operaciones</th>
                </thead>
                @foreach($tipos as $tipo)
                    <tr>
                        <td>
                            {{$tipo->nombre}}
                        </td>
                        <td>
                            <a href="{{route('tipoTorneo.show',['tipoTorneo'=>$tipo->tipoTorneo->id])}}">{{$tipo->tipoTorneo->nombre}}</a>
                        </td>
                        <td>
                            {{$tipo->descripcion}}
                        </td>
                        <td>
                            <a href="{{route('tipoFase.show',['tipoFase'=>$tipo->id])}}">Ver</a>
                            <span class="separador"></span>
                            <a class="manita edit" data-toggle="modal" data-target="#myModal" data-link="/tipoFase/{{$tipo->id}}/edit">Editar</a>
                            <span class="separador"></span>
                            <a class="manita edit " data-toggle="modal" data-target="#myModal" data-link="/tipoFase/{{$tipo->id}}/deleteMsg">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            </table>

        @else
            <div class="alert">
                No se han encotrado tipos de fase
            </div>
        @endif

    </div>

@endsection



@section('scripts')
    @parent

    <script>

    </script>

@endsection