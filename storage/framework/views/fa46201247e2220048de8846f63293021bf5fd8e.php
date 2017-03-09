
<div class="centered">
    <h3>Modificar fecha y hora</h3>
</div>

<?php echo e(Form::open()); ?>

    <div class="form-group">
        <?php echo e(Form::label('Fecha')); ?>

        <?php echo e(Form::text('date',$partido->date(),array('class'=>'form-control datepicker'))); ?>

    </div>

    <div class="form-group">
        <?php echo e(Form::label('Fecha')); ?>

        <div class="input-group bootstrap-timepicker timepicker">
            <?php echo e(Form::text('time',$partido->time(),array('class'=>'form-control input-small timepicker'))); ?>

            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
        </div>
    </div>
    <div class="centered">
        <a class="btn btn-primary save_edit" data-link="/admin/partido/<?php echo e($partido->id); ?>/fechaHora">Modificar</a>
    </div>
<?php echo e(Form::close()); ?>