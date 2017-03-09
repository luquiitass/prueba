<div>
    <a class="btn btn-primary create" data-toggle="collapse" href="#collapse_equipo_nuevo">Asignar Equipo</a>
    <div class="collapse" id="collapse_equipo_nuevo">
        <div class="" id="contenedor_nuevo_torneo">
            <div class="bg-white resaltar">
                <a  data-toggle="collapse" href="#collapse_equipo_nuevo" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                <div class="alert bg-info">
                    <h4>Asociar Equipo</h4>
                    <p>Si el equipo que usted quiere añadir a este torneo ya se encuentra registrado, solamente debe seleccionarlo y los datos del equipo se auto completaran.</p>
                    <p>Si el equipo no se encuentra registrado, puede registrar un <a class="cl-azul manita edit ajax " data-toggle="modal" data-target="#myModal" data-link="/admin/equipo/create">Nuevo Equipo</a></p>
                    <hr>
                    <?php echo e(Form::open()); ?>

                        <?php echo $__env->make('otros.selectEquipo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <a class="save_ajax btn btn-primary pull-right" data-link="/admin/torneo/<?php echo e($torneo->id); ?>/addEquipo">Añadir</a>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>
</div>
