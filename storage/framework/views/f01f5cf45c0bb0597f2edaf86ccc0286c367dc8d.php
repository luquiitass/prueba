<!DOCTYPE html>
<html>

<?php $__env->startSection('htmlheader'); ?>
    <?php echo $__env->make('layouts.partials.htmlheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldSection(); ?>

<?php echo $__env->yieldContent('content'); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo $__env->make('layouts.partials.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldSection(); ?>

</html>