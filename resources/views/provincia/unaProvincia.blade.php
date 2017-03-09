<li id="li_provincia_id_{{$provincia->id}}" class="list-group-item provincia {{isset($provinciaActiva) && $provinciaActiva == $provincia->id?' active':''}}">
    <div class="form-line">
        <label class="text-left" >{{$provincia->nombre}}</label>

        <button data-toggle="modal" data-target="#myModal"  class="delete btn btn-danger pull-right btn-xs" data-link="/provincia/{{$provincia->id}}/deleteMsg">
            <i class="fa fa-trash" aria-hidden="true"></i>
        </button>
        <button data-toggle="modal" data-target="#myModal" class="edit btn btn-info pull-right btn-xs" data-link="/provincia/{{$provincia->id}}/edit">
            <i class="fa fa-pencil" aria-hidden="true"></i>
        </button>
        <button onclick="mostrarLocalidades();" class="btn btn-success pull-right btn-xs"  data-prov="{{$provincia->id}}" href="#pr_{{$provincia->id}}" data-toggle="tab">
            <strong>{{$provincia->localidades->count()}}</strong>
            Localidades
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
        </button>
    </div>
</li>