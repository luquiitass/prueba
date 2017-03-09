<?php $__env->startSection('htmlheader'); ?>
    @parent
    <link rel="stylesheet" href="<?php echo e(asset('/plugins/jcrop/css/jquery.Jcrop.css')); ?>" type="text/css" />

    <style>
        .modal-large {
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            padding: 5px;
        }
        .modal-content{
            width: 100%;
            height: 100%;
        }.modal-body{
             width: 100%;
             height: 100%;
         }
        #modal_body{
            height: 100%;
        }

        .height_cien {
            height: 100%;
        }

        #div_fot{
            vertical-align: middle;
            height: 90%;
        }

        #fot{
            height: auto;
            width: auto;
            max-height: 100%;
            max-width: 100%;
        }
        .group-a > a{
            margin-top: 10px;
            padding: 10px;
        }

        .foto_perfil{
            width: 128px;
            height: 128px;

        }
        #div_imagen_jcrop > a.disabled
        {
            cursor: not-allowed;
            background-color: #eeeeee;
            opacity: 1;

        }



    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    @parent
    <script src="<?php echo e(asset('/plugins/jcrop/js/jcrop.js')); ?>"></script>
    <script src="<?php echo e(asset('/plugins/jcrop/js/myjcrop.js')); ?>"></script>
<?php $__env->stopSection(); ?>