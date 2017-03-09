@extends('layouts.app'){{--Extiende del blade app--}}

@section('titulo','Competencias')

@section('htmlheader')
    @parent
    {{--Vincular los css--}}
@endsection

@section('menu_competencias','active')

@section('menu2_admCompetencias','active')


@section('main-content')
    <h3>Competencias</h3>
    <a class="btn btn-primary manita edit" data-toggle="modal" data-target="#myModal" data-link="/admin/competencia/create" style="margin-bottom: 10px;">Nueva Competencia</a>
    <table class="table table-striped table-bordered" style="background-color: white">
        <thead>
        <th>Nombre</th>
        <th>Administrador</th>
        <th>CAnt. Temporadas</th>
        <th>Operaciones</th>
        </thead>
        <tbody>
        @forelse($competencias as $competencia)
            <tr>
                <td>{{$competencia->nombre}}</td>
                <td>
                    @if($competencia->users->count()>0)
                        {{$competencia->users->implode('email',' , ')}}
                    @else
                        Sin administrador
                    @endif
                </td>
                <td>{{count($competencia->temporadas)}}</td>
                <td>
                    <a class="btn btn-info" href="{{route('admin.competencia.show',['competencia'=>$competencia->id])}}">Ver</a>
                    <a class="btn btn-success edit" data-toggle="modal" data-target="#myModal" data-link="/admin/competencia/{{$competencia->id}}/edit">Editar</a>
                    <a class="btn btn-danger delete" data-link="/admin/competencia/{{$competencia->id}}/deleteMsg" data-toggle="modal" data-target="#myModal" >Eliminar</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">
                    sin competencias
                </td>
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