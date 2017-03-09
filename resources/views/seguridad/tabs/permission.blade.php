<?php

    $permission = \Bican\Roles\Models\Permission::orderBy('model')->get();

    if (!isset($tabSeleccionado) && $permission->count()>0){
        $tabSeleccionado = $permission->first()->id;
    }
?>
<div class="row bg-white">
    <div class="col-xs-12 col-md-6 ">

        <h3>Permisos</h3>
        <hr>

        <button style="margin-bottom: 5px" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_create_permission">
            Nuevo
        </button>

        <ul class="nav nav-pills nav-stacked permission">
            @forelse($permission as $permiso)
                <a name="select_permiso_{{$permiso->id}}"></a>
                <li class="li_permission {{$permiso->id == $tabSeleccionado?' in active':''}}"><a href="#tab_permiso_{{$permiso->id}}" data-toggle="tab">{{$permiso->name}}</a></li>
            @empty
                <li class="alert bg-success">Sin permission</li>
            @endforelse

        </ul>
    </div>


    <div class="col-xs-12 col-md-6 ">
        <div class="tab-content">

            <h3>Descrpcion</h3>

            @foreach($permission as $permiso)
                <div id="tab_permiso_{{$permiso->id}}" class="tab-pane fade well description {{$permiso->id == $tabSeleccionado?' in active':''}}">

                    <h4 class="resaltar bg-white">{{$permiso->name}}</h4>
                    <p>descripcion: <strong>{{$permiso->description}}</strong></p>
                    <p>modelo: <strong>{{$permiso->model}}</strong></p>
                    <p>slug: <strong>{{$permiso->slug}}</strong></p>

                    <button data-toggle="modal" data-target="#myModal"  class="edit btn btn-success btn-block" data-link="/permission/{{$permiso->id}}/edit">
                        Editar</i>
                    </button>

                    <button data-toggle="modal" data-target="#myModal"  class="delete btn btn-danger btn-block" data-link="/permission/{{$permiso->id}}/deleteMsg">
                        Eliminar <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>

                </div>
            @endforeach
        </div>
    </div>
</div>


@section('modals')
    @parent

    <div id="modal_create_permission" class="modal fade" tabindex="-1" role="dialog" aria-hidden="false" aria-labelledby="myModalLabel">
        <div id="otro">
            @include('modals.modal2',array('body'=>view('seguridad.permiso.comp_create')->render()))
        </div>
    </div>

@endsection
