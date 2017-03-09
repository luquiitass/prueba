
@php($id_select = str_random(10))
<div class="form-group">
    {{Form::label('Equipo Local')}}
    {{Form::select('eq_local_id',$partido->selectEquipos(),!empty($partido->equipoLocal)?[$partido->eq_local_id]:null,array('class'=>'form-control','id'=>$id_select,'data-placeholder'=>'Seleccionar Categoria','style'=>'width: 75%'))}}
</div>


<script type="text/javascript">
    $("#{{$id_select}}").select2({
        placeholder: $(this).data('placeholder')
    });
</script>
