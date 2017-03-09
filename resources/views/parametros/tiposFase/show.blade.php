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
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{$tipo->nombre}}</h3>
            </div>
            <div class="box-body">
                <strong>Desxripcion</strong>
                <p class="text-muted">{{$tipo->descripcion}}</p>
            </div>
        </div>
    </div>

    <div>
        <h4>Fases</h4>
        @if(count($tipo->tiposFase)>0)
        <ul>
        @foreach($tipo->fases as $fase)
            <li>
                {{$fase->nombre}}
            </li>
        @endforeach
        </ul>
        @else
            <div class="alert">
                Sin Fases
            </div>
        @endif
    </div>

@endsection



@section('scripts')
    @parent

    <script>

    </script>

@endsection