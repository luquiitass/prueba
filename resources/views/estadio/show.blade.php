@extends('layouts.app'){{--Extiende del blade app--}}

@section('titulo','Equipo')

@section('htmlheader')
    @parent
    <style>
        table{
            background: white!important;
        }
        td{
            border-bottom:1px solid rgba(31, 48, 31, 0.2);
            padding:5px;
        }
    </style>
    {{--Vincular los css--}}
@endsection

@section('menu_equipo','active')


@section('main-content')
    <h3>{{$estadio->nombre}} <strong>{{$estadio->alias}}</strong></h3>
    <h4>Datos</h4>
    <div class="row">
        <div class="col-xs-12 col-md-4">
            <h4>Datos</h4>
            <table class="well">
                @foreach($estadio['attributes'] as $key => $value)
                    <tr>
                        <td>{{ucfirst($key)}}:</td>
                        <td style=" padding-left: 7px;" >{{$value}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="col-xs-12 col-md-4">
            <h4>Direccion</h4>
            <table class="well">
                @foreach($estadio->direccion['attributes'] as $key => $value)
                    <tr>
                        <td>{{ucfirst($key)}}:</td>
                        <td style=" padding-left: 7px;" >{{$value}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection



@section('scripts')
    @parent

    <script>

    </script>

@endsection