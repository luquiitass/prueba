<?php if(isset($liga)): ?>
    <div>
        <h3 class="text-center">Nueva Liga</h3>

        <?php echo e(Form::open()); ?>

            <?php echo e(Form::hidden('temporada_id',$liga->temporada->id)); ?>


            <div class="form-group">
                <?php echo e(Form::label('nombre')); ?>

                <?php echo e(Form::text('nombre',$liga->nombre,array('class'=>'form-control'))); ?>

            </div>

            <div class="form-group">
                <?php echo e(Form::label('Fecha inicio')); ?>

                <?php echo e(Form::text('inicio',$liga->inicio->format('d-m-Y'),array('class'=>'form-control datepicker'))); ?>

                <p class="text-danger"> <i class="fa fa-info-circle"></i> La fecha de inicio debe ser postereios a <strong><?php echo e($liga->temporada->inicio->format('d-m-Y')); ?></strong> , es cuando inicia la temporada</p>

            </div>

            <div class="form-group">
                <?php echo e(Form::label('Fecha a finalizar')); ?>

                <?php echo e(Form::text('fin',$liga->fin->format('d-m-Y'),array('class'=>'form-control datepicker'))); ?>

                <p class="text-danger"><i class="fa fa-info-circle"></i> La fecha de finalización debe ser menor a <strong><?php echo e($liga->temporada->fin->format('d-m-Y')); ?></strong> , es cuando finaliza la temporada</p>
            </div>

            <div class="form-group">
                <?php echo e(Form::label('descripción')); ?>

                <?php echo e(Form::textArea('descripcion',$liga->descripcion,array('class'=>'form-control'))); ?>

            </div>

            <?php echo $liga->html_selectAdministradoes($liga); ?>


            <?php echo $__env->make('categoria.comp_select_multiple',['categorias'=>$liga->categorias], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


            <a class="manita" data-toggle="collapse" data-target="#configuraciones_liga">Mas configuraciones +</a>

            <div id="configuraciones_liga" class="collapse">
                no posee mas configuraciones
            </div>

            <div class="centered">
                <a class="btn btn-primary save_edit " data-link="/admin/liga/<?php echo e($liga->id); ?>">Modificar</a>
            </div>


        <?php echo e(Form::close()); ?>


    </div>
<?php else: ?>
    Falta unaLiga
<?php endif; ?>

