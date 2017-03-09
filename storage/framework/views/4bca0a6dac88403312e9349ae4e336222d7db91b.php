<?php if(isset($temporada)): ?>
    <div>
        <h3 class="text-center">Nueva Liga</h3>

        <?php echo e(Form::open()); ?>

            <?php echo e(Form::hidden('temporada_id',$temporada->id)); ?>


            <div class="form-group">
                <?php echo e(Form::label('nombre')); ?>

                <?php echo e(Form::text('nombre',$temporada->competencia->nombre,array('class'=>'form-control'))); ?>

            </div>

            <div class="form-group">
                <?php echo e(Form::label('Fecha inicio')); ?>

                <?php echo e(Form::text('inicio',null,array('class'=>'form-control datepicker'))); ?>

                <p class="text-danger"> <i class="fa fa-info-circle"></i> La fecha de inicio debe ser postereios a <strong><?php echo e($temporada->inicio->format('d-m-Y')); ?></strong> , es cuando inicia la temporada</p>

            </div>

            <div class="form-group">
                <?php echo e(Form::label('Fecha a finalizar')); ?>

                <?php echo e(Form::text('fin',null,array('class'=>'form-control datepicker'))); ?>

                <p class="text-danger"><i class="fa fa-info-circle"></i> La fecha de finalización debe ser menor a <strong><?php echo e($temporada->fin->format('d-m-Y')); ?></strong> , es cuando finaliza la temporada</p>
            </div>

            <div class="form-group">
                <?php echo e(Form::label('descripción')); ?>

                <?php echo e(Form::textArea('descripcion',null,array('class'=>'form-control'))); ?>

            </div>

            <?php echo $__env->make('otros.selectUser', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <?php echo $__env->make('categoria.comp_select_multiple', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


            <a class="manita" data-toggle="collapse" data-target="#configuraciones_liga">Mas configuraciones +</a>

            <div id="configuraciones_liga" class="collapse">
                no posee mas configuraciones
            </div>

            <div class="centered">
                <a class="btn btn-primary save_ajax " data-link="/admin/liga">Guardar</a>
            </div>


        <?php echo e(Form::close()); ?>


    </div>
<?php else: ?>
    Falta temporada
<?php endif; ?>

