@extends('layouts.app'){{--Extiende del blade app--}}

@section('titulo','Estados')

@section('htmlheader')
    @parent
    {{--Vincular los css--}}
@endsection

@section('menu_estados','active')

@section('main-content')


<div class="resaltar bg-white">
    <h3>Estados</h3>
    <p><br></p>
    <button class="btn btn-primary create"  data-toggle="modal" data-target="#modal_create_estado" data-link="/estado/create">Nuevo Estado</button>
    @if($estados->count()>0)
        <div>
            <table class="table">
                @foreach($estados as $key=> $tabla)
                    <tr>
                    <td colspan="4">
                        <h3>{{$key}}</h3>
                    </td>
                    </tr>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Tabla</th>
                        <th>Operaciones</th>
                    </tr>
                    <tr>
                        @foreach($tabla as $estado)
                            <tr id="tr_estado_{{$estado->id}}">
                                <td>{{$estado->nombre}}</td>
                                <td>{{$estado->descripcion}}</td>
                                <td>{{$estado->tabla}}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="glyphicon glyphicon-cog"></i>
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="manita edit" data-toggle="modal" data-target="#myModal" data-link="/estado/{{$estado->id}}/edit">Editar</a></li>
                                            <li><a class="manita edit" data-toggle="modal" data-target="#myModal" data-link="/estado/{{$estado->id}}/deleteMsg" >Eliminar</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tr>

                @endforeach
            </table>
        </div>
    @else
        <div class="alert alert-info">
            Sin Estados
        </div>
    @endif
</div>

@endsection


@section('modals')
    @parent
    <div id="modal_create_estado" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div>
            @include('modals.modal2',array('body'=>view('estado.comp_create')->render()))
        </div>
    </div>
@endsection



@section('scripts')
    @parent

    <script>

    </script>
    {!! JsValidator::formRequest('App\Http\Requests\EstadoRequestStore', '#form_create_estado') !!}
@endsection