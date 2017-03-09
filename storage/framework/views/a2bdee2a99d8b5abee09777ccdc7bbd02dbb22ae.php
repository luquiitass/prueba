<?php /*Extiende del blade app*/ ?>

<?php $__env->startSection('titulo','Competencias'); ?>

<?php $__env->startSection('htmlheader'); ?>
    @parent
    <?php /*Vincular los css*/ ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu_competencias','active'); ?>

<?php $__env->startSection('menu2_admCompetencias','active'); ?>


<?php $__env->startSection('main-content'); ?>
    <div class="centered resaltar bg-white">
        <h2 class="Heading--Fancy">
            <span class="linea"><?php echo e($competencia->nombre); ?></span>
        </h2>
    </div>

    <div>
        <ol class="breadcrumb">
            <?php echo $__env->yieldContent('admin_competencia_migas'); ?>
        </ol>
    </div>


    <?php echo $__env->yieldContent('admin_competencia_content'); ?>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('scripts'); ?>
    @parent

    <script>

    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>