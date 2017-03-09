<?php
    $roles = \Bican\Roles\Models\Role::orderBy('name')->get();

    if (!isset($tabSeleccionado) && $roles->count()>0){
            $tabSeleccionado = $roles->first()->id;
        }
    ?>
<div class="row bg-white">
    <div class="col-xs-12 col-md-6 ">

        <h3>Roles</h3>
        <hr>

        <button style="margin-bottom: 5px" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_create_role">
            Nuevo
        </button>

        <ul id="ul_roles" class="nav nav-pills nav-stacked roles">
            @forelse($roles as $rol)
                <li id="li_rol_id_{{$rol->id}}" class="li_roles {{$tabSeleccionado == $rol->id?'in active':''}}"><a href="#tab_rol_{{$rol->id}}" data-toggle="tab">{{$rol->name}}</a></li>
            @empty
                <li class="alert bg-success"> Sin Roles</li>
            @endforelse
        </ul>

    </div>

    <div class="col-xs-12 col-md-6 ">

        <h3 >Datos del rol</h3>
        <hr>

        <div class="tab-content">
            @foreach($roles as $rol)
                <div id="tab_rol_{{$rol->id}}" class="tab-pane fade well description {{$tabSeleccionado == $rol->id?'in active':''}}">
                    <h3>{{$rol->name}}</h3>

                    <p>Descripcion: <strong>{{$rol->description}}</strong></p>
                    <p>Slug: <strong>{{$rol->slug}}</strong></p>
                    <hr>
                    <h4>Permisos</h4>
                    <ul class="">
                        @forelse($rol->permissions as $permiso)
                            <li>{{$permiso->name}}</li>
                        @empty
                            <li>Sin Permisos</li>
                        @endforelse
                    </ul>

                    <button data-toggle="modal" data-target="#myModal"  class="edit btn btn-success btn-block" data-link="/role/{{$rol->id}}/edit">
                        Edit
                    </button>

                    <button data-toggle="modal" data-target="#myModal"  class="delete btn btn-danger btn-block" data-link="/role/{{$rol->id}}/deleteMsg">
                        Eliminar <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                </div>
            @endforeach
        </div>

    </div>

</div>

@section('modals')
    @parent
    <div id="modal_create_role" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div>
            @include('modals.modal2',array('body'=>view('seguridad.roles.comp_create')->render()))
        </div>
    </div>
@endsection