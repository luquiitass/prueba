@if(!isset($nombreBoton))
@if(!isset($body))
    @endif
<div>
    <a class="btn btn-primary create" data-toggle="collapse" href="#collapse_torneo_nuevo">Agregar Torneo</a>
    <div class="collapse" id="collapse_torneo_nuevo">
        <div class="" id="contenedor_nuevo_torneo">
            <div class="bg-white resaltar">
                <a  data-toggle="collapse" href="#collapse_torneo_nuevo" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                @include('torneo.comp_create',compact('temporadas'))
            </div>
        </div>
    </div>
</div>