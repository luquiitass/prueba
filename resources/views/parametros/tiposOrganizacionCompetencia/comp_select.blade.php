@php($id_select = str_random(10))
<div class="form-group">
    {{Form::label('Tipo de competencia')}}
    {{Form::select('tipo_organizacion_competencia_id',\App\TipoOrganizacionCompetencia::select(),!empty($tipo->tipoOrganizarCompetencia)?$tipo->tipoOrganizarCompetencia->id:'null',array('class'=>'form-control custom-select','id'=>$id_select,'data-placeholder'=>'Seleccionar Tipo','style'=>'width: 100%'))}}
    {{--<a class="manita edit" data-toggle="modal" data-target="#myModal" data-link="/categoria/create" >+ Categoría</a>--}}
</div>


<script type="text/javascript">
    $("#{{$id_select}}").select2({
        placeholder: $(this).data('placeholder')
    });
</script>