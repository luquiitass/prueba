@extends('layouts.app'){{--Extiende del blade app--}}

@section('titulo','Equipos')

@section('htmlheader')
    @parent
    {{--Vincular los css--}}
@endsection

@section('menu_equipos','active')
@section('menu2_equipos','active')


@section('main-content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3>Equipos</h3>
            <a href="/equipo/create" class="btn btn-primary">Nuevo Equipo</a>
            <hr>

            <a class="edit btn btn-success" data-toggle="modal" data-target="#myModal" data-link="/equipo"> DataTable en Modal</a>

            @include('otros.tabla_datatable_model',compact('tabla'))
            {{--<table class="table table-striped table-bordered">--}}
                {{--<thead>--}}
                    {{--<th>Nombre</th>--}}
                    {{--<th>Administrador</th>--}}
                    {{--<th>Operaciones</th>--}}
                {{--</thead>--}}
                {{--<tbody>--}}
                    {{--@forelse($equipos as $equipo)--}}
                        {{--<tr>--}}
                            {{--<td>{{$equipo->nombre}}</td>--}}
                            {{--<td>{{$equipo->users->implode('name',', ')}}</td>--}}
                            {{--<td>--}}
                                {{--<a class="btn btn-info" href="{{route('equipo.show',array('$equipo'=>$equipo->id))}}">Ver</a>--}}
                                {{--<a class="btn btn-success" href="{{route('equipo.edit',array('equipo'=>$equipo->id))}}">Editar</a>--}}
                                {{--<a class="btn btn-danger delete" data-toggle="modal" data-target="#myModal" data-link="/estadio/{{$equipo->id}}/deleteMsg" href="#">Eliminar</a>--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                    {{--@empty--}}
                        {{--<tr><td colspan="3" class="bg-danger">Sin Equipos</td></tr>--}}
                    {{--@endforelse--}}
                {{--</tbody>--}}
            {{--</table>--}}
        </div>
    </div>
@endsection



@section('scripts')
    @parent

    <script>
        cargarTablas();
    </script>

@endsection