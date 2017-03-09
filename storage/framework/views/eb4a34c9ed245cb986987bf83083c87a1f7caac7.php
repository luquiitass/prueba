
            <div class="">
                <h3>Modificar Competencia</h3>

                 <?php echo $__env->make('mensajes.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <?php echo e(Form::open()); ?>


                    <div class="form-group">
                        <?php echo e(Form::label('nombre')); ?>

                        <?php echo e(Form::text('nombre',$competencia->nombre,array('class'=>'form-control'))); ?>

                    </div>

                    <div class="form-group">
                        <?php echo e(Form::label('descripción')); ?>

                        <?php echo e(Form::textArea('descripcion',$competencia->descripcion,array('class'=>'form-control'))); ?>

                    </div>

                    <?php echo $competencia->html_selectUser(); ?>

                    <div class="centered">
                        <a class="manita save_edit btn btn-primary" data-link="/admin/competencia/<?php echo e($competencia->id); ?>" >Modificar</a>
                    </div>

                <?php echo e(Form::close()); ?>



            </div>
    <script>
        cargarSelect2();
    </script>