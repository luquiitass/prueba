<div class="form-group">
    {{Form::label('Categoria/s')}}
    {{Form::select('categorias[]',\App\Categoria::select(),isset($categorias)?\App\Funciones::t_array_id($categorias):null,array('class'=>'form-control select2-basic-multiple','multiple'=>"multiple",'data-placeholder'=>'Seleccionar Categoria'))}}
</div>


    <script type="text/javascript">
        $(".select2-basic-multiple").select2({
            placeholder: $(this).data('placeholder')
        });
    </script>