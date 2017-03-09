@php($id_select = str_random(10))
<div class="form-group">
    {{Form::label('Categoría')}}
    {{Form::select('categoria',\App\Categoria::select(),null,array('class'=>'form-control','id'=>$id_select,'data-placeholder'=>'Seleccionar Categoria','style'=>'width: 75%'))}}
</div>


<script type="text/javascript">
    $("#{{$id_select}}").select2({
        placeholder: $(this).data('placeholder')
    });
</script>
