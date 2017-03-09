@extends('layouts.app'){{--Extiende del blade app--}}

@section('titulo','Categorias')

@section('htmlheader')
    @parent
    {{--Vincular los css--}}
@endsection

@section('menu_categorias','active')



@section('main-content')

    <div class="">
        <h3>Categorias</h3>
        <p><br></p>
        <button>
            <button class="btn btn-primary create" data-toggle="modal" data-target="#myModal" data-link="/categoria/create">Nueva Categoria</button>
        </button>
        <p><br></p>
        <div class="col-xs-4">
            <ul class="list-group">
                @forelse($categorias as $categoria)
                    <li class="list-group-item"><div>
                            <span class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="glyphicon glyphicon-cog"></i>
                                    <span class="caret"></span>
                            </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <li><a href="#">Ver</a></li>
                                    <li><a class="edit" data-toggle="modal" data-target="#myModal" data-link="/categoria/{{$categoria->id}}/{{$categoria->id}}">Editar</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#" class="delete" data-toggle="modal" data-target="#myModal" data-link="/categoria/{{$categoria->id}}/{{$categoria->id}}/bajaJugadorMsg">Eliminar</a></li>
                            </ul>
                        </span>
                            <label style="margin-left: 10px">{{$categoria->nombre}}</label>
                        </div>
                    </li>
                @empty
                    <div class="alert alert-danger">
                        Sin Categorias
                    </div>
                @endforelse

            </ul>
        </div>

    </div>

@endsection



@section('scripts')
    @parent

    <script>

    </script>

@endsection