<?php if(!isset($competencia)): ?>
    <div class="alert alert-danger">
        Falta pasar la competencia
    </div>
<?php else: ?>

    <div class="">
        <div class="centered">
            <h3>Nueva Temporada</h3>
        </div>
        <div class="centered">
            <?php echo e(Form::open(array('id'=>'form_create_temporada','class'=>'form-inline','id'=>'form_create_temporada'))); ?>


                <?php echo e(Form::hidden('competencia_id',$competencia->id)); ?>


                <div class="form-group">
                    <?php echo e(Form::label('nombre')); ?>

                    <?php echo e(Form::text('nombre',null,array('class'=>'form-control'))); ?>

                </div>
                <span class="separador"></span>
                <div class="form-group">
                    <?php echo e(Form::label('Inicio')); ?>

                    <?php echo e(Form::text('inicio',null,array('class'=>'form-control datepicker'))); ?>

                </div>
                <span class="separador"></span>
                <div class="form-group">
                    <?php echo e(Form::label('Fin')); ?>

                    <?php echo e(Form::text('fin',null,array('class'=>'form-control datepicker'))); ?>

                </div>
                <span class="separador"></span>
                <div class="form-group">
                    <a class="save_ajax btn btn-primary manita form-control" data-link="/admin/temporada" >Guardar</a>
                </div>

            <?php echo e(Form::close()); ?>

        </div>

    </div>

<?php endif; ?>
