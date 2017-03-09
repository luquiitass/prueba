<div class="form-group">
    <?php echo e(Form::label('Categoria/s')); ?>

    <?php echo e(Form::select('categorias[]',\App\Categoria::select(),isset($categorias)?\App\Funciones::t_array_id($categorias):null,array('class'=>'form-control select2-basic-multiple','multiple'=>"multiple",'data-placeholder'=>'Seleccionar Categoria'))); ?>

</div>


    <script type="text/javascript">
        $(".select2-basic-multiple").select2({
            placeholder: $(this).data('placeholder')
        });
    </script>