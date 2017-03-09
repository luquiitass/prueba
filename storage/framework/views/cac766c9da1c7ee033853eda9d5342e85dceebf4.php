
<div class="centered">
    <h3>Modificar Equipo Local</h3>
</div>

<?php echo e(Form::open()); ?>


    <?php echo $__env->make('partido.comp_select_equipos_partido', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="centered">
        <a class="btn btn-primary save_edit" data-link="/admin/partido/<?php echo e($partido->id); ?>/equipoLocal">Modificar</a>
    </div>
<?php echo e(Form::close()); ?>