
<div class="centered">
    <h3>Modificar Equipo Local</h3>
</div>

{{Form::open()}}

    @include('partido.comp_select_equipos_partido')

    <div class="centered">
        <a class="btn btn-primary save_edit" data-link="/admin/partido/{{$partido->id}}/equipoLocal">Modificar</a>
    </div>
{{Form::close()}}