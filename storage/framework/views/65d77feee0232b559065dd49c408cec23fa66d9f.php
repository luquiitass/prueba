<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<?php $__env->startSection('htmlheader'); ?>
    <?php echo $__env->make('layouts.partials.htmlheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldSection(); ?>

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="skin-blue sidebar-mini sidebar-collapse">

<div class="wrapper">
    <?php echo $__env->make('layouts.partials.mainheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('layouts.partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <?php /*<?php echo $__env->make('layouts.partials.contentheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>*/ ?>


            <!-- Main content -->
                <section class=" content content-alignment">
                    <section class="content-header">
                        <?php echo $__env->yieldContent('titulo_seccion'); ?>
                    </section>
                    <!-- Your Page Content Here -->
                <div id="mensaje" class="mensaje_flot">
                    <?php echo $__env->make('mensajes.msj', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>


                <?php echo $__env->yieldContent('main-content'); ?>
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->


        <?php echo $__env->make('layouts.partials.controlsidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php echo $__env->make('layouts.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</div><!-- ./wrapper -->

<?php $__env->startSection('modals'); ?>
    <?php echo $__env->make('layouts.partials.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo $__env->make('layouts.partials.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldSection(); ?>

<div id="temp" style="display: none">
    <?php echo $__env->make('layouts.partials.cargando', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>

</body>
</html>
