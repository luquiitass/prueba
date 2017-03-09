@extends('layouts.app'){{--Extiende del blade app--}}

@section('titulo','Tipos')

@section('htmlheader')
    @parent
    {{--Vincular los css--}}
@endsection

@section('menu_parametros','active')

@section('menu2_tipo_torneo','active')



@section('main-content')

    <div>
        <h3>Tipo de Torneo</h3>
        <div class="resaltar bg-white">
            <h3>{{$tipo->nombre}}</h3>
            <p class="">{{$tipo->descripcion}}</p>
            <hr>
            <a class="manita edit fa fa-edit" data-toggle="modal"  data-target="#myModal" data-link="/tipoTorneo/{{$tipo->id}}/edit">Editar</a>
            <span class="separador"></span>
            <a class="manita edit cl-rojo fa fa-trash-o" data-toggle="modal"  data-target="#myModal" data-link="/tipoTorneo/{{$tipo->id}}/deleteMsg">Eliminar</a>
        </div>
    </div>

    <div>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tipo de Fases</h3>
                <div>
                    <a class="btn btn-primary  edit" data-toggle="modal" data-target="#myModal" data-link="/tipoFase/create?tipoTorneo={{$tipo->id}}">mamam</a>
                </div>
            </div> <div class="box-body">
            @if(count($tipo->tiposFase)>0)
                @foreach($tipo->tiposFase as $tipoFase)
                        <strong>{{$tipoFase->nombre}}</strong>
                        <p class="text-muted">{{$tipoFase->descripcion}}</p>
                    <div>
                        <span class="separador"></span>
                        <a href="" class="manita edit fa fa-edit" data-toggle="modal" data-target="#myModal" data-link="/tipoFase/{{$tipoFase->id}}/edit?tipoTorneo={{$tipo->id}}"></a>
                        <span class="separador"></span>
                        <a href="" class="manita edit fa fa-trash-o" data-toggle="modal" data-target="#myModal" data-link="/tipoFase/{{$tipoFase->id}}/deleteMsg"></a>
                    </div>
                    <hr>
                @endforeach
            @else
                <div class="alert">
                    Sin Fases
                </div>
            @endif
            </div>
    </div>

@endsection



@section('scripts')
    @parent

    <script>

    </script>

@endsection