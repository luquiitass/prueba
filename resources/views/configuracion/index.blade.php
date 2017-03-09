@extends('layouts.app'){{--Extiende del blade app--}}

@section('titulo','Estados')

@section('htmlheader')
    @parent
    {{--Vincular los css--}}
@endsection

@section('menu_configuracions','active')

@section('main-content')


<div class="resaltar bg-white">
    <h3>Estados</h3>
    <p><br></p>
    <button class="btn btn-primary create"  data-toggle="modal" data-target="#modal_create_configuracion" data-link="/configuracion/create">Nuevo Estado</button>
    @if($configuraciones->count()>0)
        <div>
            <table class="table">
                @foreach($configuraciones as $key=> $tabla)
                    <tr>
                    <td colspan="4">
                        <h3>{{$key}}</h3>
                    </td>
                    </tr>
                    <tr>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th>Tabla</th>
                        <th>Operaciones</th>
                    </tr>
                    <tr>
                        @foreach($tabla as $configuracion)
                            <tr id="tr_configuracion_{{$configuracion->id}}">
                                <td>{{$configuracion->nombre}}</td>
                                <td>
                                    @if($configuracion->estado)
                                        <span class="label label-success">Activo</span>
                                    @else
                                        <span class="label label-danger">Inactivo</span>
                                    @endif

                                </td>
                                <td>{{$configuracion->tabla}}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="glyphicon glyphicon-cog"></i>
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="manita edit" data-toggle="modal" data-target="#myModal" data-link="/configuracion/{{$configuracion->id}}/edit">Editar</a></li>
                                            <li><a class="manita edit" data-toggle="modal" data-target="#myModal" data-link="/configuracion/{{$configuracion->id}}/deleteMsg" >Eliminar</a></li>
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
    <div id="modal_create_configuracion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div>
            @include('modals.modal2',array('body'=>view('configuracion.comp_create')->render()))
        </div>
    </div>
@endsection



@section('scripts')
    @parent

    <script>

    </script>
    {!! JsValidator::formRequest('App\Http\Requests\EstadoRequestStore', '#form_create_configuracion') !!}
@endsection