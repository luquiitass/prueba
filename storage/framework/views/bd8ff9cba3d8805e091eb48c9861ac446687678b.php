<?php if(!isset($temporada)): ?>
    <div class="alert alert-danger">
        Falta pasar la temporada
    </div>
<?php else: ?>

    <div class="">
        <div class="centered">
            <h3>Editar Temporada</h3>
        </div>
        <div>
            <?php echo e(Form::open(array('id'=>'form_create_temporada','class'=>'form-inline'))); ?>


            <?php /*Form::hidden('competencia_id',$temporada->competencia->id)*/ ?>

            <?php echo e(Form::hidden('sub',$temporada->sub)); ?>


            <div class="form-group">
                <?php echo e(Form::label('nombre')); ?>

                <?php echo e(Form::text('nombre',$temporada->nombre,array('class'=>'form-control'))); ?>

            </div>

            <span class="separador"></span>

            <div class="form-group">
                <?php echo e(Form::label('Inicio')); ?>

                <?php echo e(Form::text('inicio',$temporada->inicio->format('d-m-Y'),array('class'=>'form-control datepicker'))); ?>

            </div>

            <span class="separador"></span>

            <div class="form-group">
                <?php echo e(Form::label('Fin')); ?>

                <?php echo e(Form::text('fin',$temporada->fin->format('d-m-Y'),array('class'=>'form-control datepicker'))); ?>

            </div>

            <span class="separador"></span>

            <div class="form-group">
                <a class="save_edit btn btn-primary manita text-center" data-link="/admin/temporada/<?php echo e($temporada->id); ?>" >Guardar</a>
            </div>

            <?php echo e(Form::close()); ?>

        </div>

    </div>

<?php endif; ?>
