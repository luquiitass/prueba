@extends('layouts.app'){{--Extiende del blade app--}}

@section('titulo','Estadios')

@section('htmlheader')
    @parent
    {{--Vincular los css--}}
@endsection

@section('menu_estadios','active')

@section('menu2_administrarEstadios','active')

@section('main-content')

   <h3>Estadioa</h3>
   <a href="{{url('estadio/create')}}" class="btn btn-primary">NuevoEstadio</a>
    
    <table class="table table-bordered table-striped">
        <thead>
            <th>Nombre</th>
            <th>Alias</th>
            <th>Equipo/s</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @forelse($estadios as $estadio)
                <tr>
                    <td>{{$estadio->nombre}}</td>
                    <td>{{$estadio->alias}}</td>
                    <td>{{$estadio->equipos->implode('nombre',', ')}}</td>
                    <td>
                        <a href="{{route('estadio.show',array('estadio'=>$estadio->id))}}" class="btn btn-info">Ver</a>
                        <a href="{{route('estadio.edit',array('estadio'=>$estadio->id))}}" class="btn btn-success">Editer</a>
                        <a data-link="/estadio/{{$estadio->id}}/deleteMsg" class="delete btn btn-danger" data-toggle="modal" data-target="#myModal">Eliminar</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4"> Sin Estadios</td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection



@section('scripts')
    @parent

    <script>

    </script>

@endsection