<?php ($id_select = str_random(10)); ?>
<div class="form-group">
    <?php echo e(Form::label('Categoría')); ?>

    <?php echo e(Form::select('categoria',\App\Categoria::select(),null,array('class'=>'form-control','id'=>$id_select,'data-placeholder'=>'Seleccionar Categoria','style'=>'width: 75%'))); ?>

</div>


<script type="text/javascript">
    $("#<?php echo e($id_select); ?>").select2({
        placeholder: $(this).data('placeholder')
    });
</script>
