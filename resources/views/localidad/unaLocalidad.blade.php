<li id="li_localidad_id_{{$localidad->id}}" class="localidad list-group-item {{isset($localidadActiva) && $localidadActiva==$localidad->id?' active':''}}" >
    <div class="form-line">
        <label class="text-left" >{{$localidad->nombre}}</label>

        <button data-toggle="modal" data-target="#myModal"  class="delete btn btn-danger pull-right btn-xs" data-link="/localidad/{{$localidad->id}}/deleteMsg">
            <i class="fa fa-trash" aria-hidden="true"></i>
        </button>
        <button data-toggle="modal" data-target="#myModal" class="edit btn btn-info pull-right btn-xs" data-link="/localidad/{{$localidad->id}}/edit">
            <i class="fa fa-pencil" aria-hidden="true"></i>
        </button>
    </div>
</li>