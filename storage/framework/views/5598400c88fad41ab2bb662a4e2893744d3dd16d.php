<?php /*Extiende del blade app*/ ?>

<?php $__env->startSection('titulo','Inicio'); ?>

<?php $__env->startSection('htmlheader'); ?>
    @parent
    <?php /*Vincular los css*/ ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu_inicio','active'); ?>



<?php $__env->startSection('main-content'); ?>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('scripts'); ?>
    @parent

    <script>

    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>