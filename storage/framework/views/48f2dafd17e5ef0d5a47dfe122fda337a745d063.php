<div class="">
    <h3>Nueva Competencia</h3>
    <?php echo $__env->make('mensajes.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo e(Form::open(array())); ?>

        <div class="form-group">
            <?php echo e(Form::label('nombre')); ?>

            <?php echo e(Form::text('nombre',null,array('class'=>'form-control'))); ?>

        </div>

        <div class="form-group">
            <?php echo e(Form::label('descripción')); ?>

            <?php echo e(Form::textArea('descripcion',null,array('class'=>'form-control'))); ?>

        </div>

        <?php echo $__env->make('otros.selectUser', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="centered">
            <a class="manita save_ajax btn btn-primary" data-link="/admin/competencia"> Guardar</a>
        </div>

    <?php echo e(Form::close()); ?>

</div>