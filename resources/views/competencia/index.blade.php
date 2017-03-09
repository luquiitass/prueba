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
    <a class="btn btn-primary" href="{{route('competencia.create')}} " style="margin-bottom: 10px;">Nueva Competencia</a>
        <table class="table table-striped table-bordered" style="background-color: white">
            <thead>
            <th>Nombre</th>
            <th>Administrador</th>
            <th>Org. de partidos</th>
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
                        <td>{{$competencia->org_partidos}}</td>
                        <td>{{$competencia->org_partidos}}</td>
                        <td>

                            <a class="btn btn-success" href="{{route('competencia.edit',array('competencia'=>$competencia->id))}}">Editar</a>
                            <a class="btn btn-danger delete" data-link="/competencia/{{$competencia->id}}/deleteMsg" data-toggle="modal" data-target="#myModal" >Eliminar</a>
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