<?php if(isset($partido)): ?>
    <div>
        <?php echo e(Form::open()); ?>

            <div class="centered">
                <h3>
                    <?php echo e($partido->equipo1->nombre); ?> <strong>vs</strong> <?php echo e($partido->equipo2->nombre); ?>

                </h3>
            </div>

            <div class="form-group">
                <?php echo e(Form::label('Fecha')); ?>

                <?php echo e(Form::text('date',$partido->date(),array('class'=>'form-control datepicker'))); ?>

            </div>

            <div class="form-group">
                <?php echo e(Form::label('Fecha')); ?>

                <div class="input-group bootstrap-timepicker timepicker">
                    <?php echo e(Form::text('date',$partido->time(),array('class'=>'form-control input-small timepicker'))); ?>

                    <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                </div>
            </div>

            <?php echo $__env->make('partido.comp_select_equipos_partido', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <div class="form-group"></div>
            <div class="form-group"></div>

            <div class="centered">
                <a class="manita save_edit btn btn-primary" data-link="/admin/partido/<?php echo e($partido->id); ?>">Modificar</a>
            </div>

        <?php echo e(Form::close()); ?>

    </div>
<?php else: ?>
    Faalta el partido
<?php endif; ?>