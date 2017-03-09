<?php $__env->startSection('subemenu_liga_equipos','active'); ?>

<?php $__env->startSection('configuraciones_liga_content'); ?>

    <div id="equipos">
        <div>
            <?php echo $__env->make('equipo.comp_asociar_equipo',['torneo'=>$liga], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <hr>

        <div>
            <?php if(count($liga->equipos)==0): ?>
                <hr>
                <div class="alert bg-info">
                    <p> Felicidades <i class="fa fa-thumbs-o-up"></i></p>
                    <p>Ya has creado una Liga correctamente , ahora debes asociar equipos a esta Liga</p>
                </div>

            <?php else: ?>
                <h4>Equipos Asociados</h4>
                <?php if(count($liga->equipos)>0): ?>
                    <table class="table">
                        <?php foreach($liga->equipos as $equipo): ?>
                            <tr id="id_fila_equipo_<?php echo e($equipo->id); ?>">
                                <td>
                                    <?php echo $__env->make('equipo.comp_unEquipo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                </td>
                                <td>
                                    <a class="manita delete" data-toggle="modal" data-target="#myModal" data-link="/admin/torneo/<?php echo e($liga->id); ?>/quitarEquipo/<?php echo e($equipo->id); ?>">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.liga.root', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>