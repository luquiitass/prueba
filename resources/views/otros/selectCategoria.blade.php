<div class="form-group">
    {{Form::label('categoria/s')}}
    {{Form::select('categorias',isset($categorias)?$categorias:array(),null,array('class'=>'form-control select2','multiple'=>'multiple','data-id_selects'=>json_encode(isset($us)?$us:array()),'data-holder'=>'Buscar categoria','data-url'=>'/categoriasSelect2'))}}
</div>