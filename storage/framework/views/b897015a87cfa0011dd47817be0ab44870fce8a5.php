<div>
    <div class="">
        <div id="form_create_equipo">
            <?php echo e(Form::open(array('url'=>url('equipo'),'id'=>'form_equipo'))); ?>

            <?php echo e(Form::token()); ?>

            <div class="form-group">
                <?php echo $__env->make('crop.otros.escudo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo e(Form::label('nombre')); ?>

                <?php echo e(Form::text('nombre',null,array('class'=>'form-control'))); ?>

            </div>

            <div class="form-group">
                <?php echo e(Form::label('alias')); ?>

                <?php echo e(Form::text('alias',null,array('class'=>'form-control'))); ?>

            </div>


            <?php echo $__env->make('otros.selectUser', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <?php echo $__env->make('categoria.comp_select', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


            <a class="manita save_ajax btn btn-primary center-block" data-link="/admin/equipo"  >Crear</a>

            <?php /*Form::submit('Crear',array('class'=>'fomr-control btn btn-primary center-block'))*/ ?>
            <?php echo e(Form::close()); ?>

        </div>


        <?php /*<?php echo $__env->make('otros.direccion.direccion', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>*/ ?>

    </div>
</div>
