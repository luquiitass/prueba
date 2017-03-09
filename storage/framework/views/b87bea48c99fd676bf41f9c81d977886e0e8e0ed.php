<?php $__env->startSection('admin_competencia_migas'); ?>
    <li><a href=""><i class="fa fa-dashboard"></i> Configuraciones</a></li>
    <li><a href="<?php echo e(url('/admin/competencia/'.$competencia->id)); ?>"><i class="fa fa-dashboard"></i> Competencia <?php echo e($temporada->competencia->nombre); ?></a></li>
    <li class="active">Temporada <?php echo e($temporada->nombre); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('admin_competencia_content'); ?>

    <?php if(isset($temporada)): ?>

        <div class="resaltar bg-success">
            <div class="resaltar bg-white">
                <h3>Temporada <?php echo e($temporada->nombre); ?></h3>
                <p><strong>Descripción: </strong><?php echo e($temporada->descripcion); ?></p>
                <p><strong>Fecha de Inicio:</strong> <?php echo e($temporada->inicio_con_formato()); ?></p>
                <p><strong>Fecha de Finalizacion:</strong> <?php echo e($temporada->fin_con_formato()); ?></p>
                <div>
                    <a class="btn btn-primary create" data-toggle="collapse" href="#collapse_temporada_editar">Editar Datos</a>
                    <div class="collapse" id="collapse_temporada_editar">
                        <div class="" id="contenedor_editar_temporada">
                            <a  data-toggle="collapse" href="#collapse_temporada_editar" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                            <div class="bg-white resaltar">
                                <?php echo $__env->make('admin.temporada.comp_edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="resaltar bg-success">
            <div class="resaltar bg-white">
                <h3>Torneos</h3>
                <div>
                    <a class="btn btn-primary create" data-toggle="collapse" href="#collapse_torneo_nuevo">Agregar Torneo</a>
                    <div class="collapse" id="collapse_torneo_nuevo">
                        <div class="" id="contenedor_nuevo_torneo">
                            <div class="bg-white resaltar">
                                <a  data-toggle="collapse" href="#collapse_torneo_nuevo" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                                <?php echo $__env->make('admin.torneo.comp_create', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if(empty($temporada->torneos)): ?>
                    <hr>
                    <div class="alert bg-info">
                        <p> Felicidades <i class="fa fa-thumbs-o-up"></i></p>
                        <p>Ya has creado la Temporada correctamente , ahora debes crear torneo/s</p>
                    </div>
                <?php else: ?>
                    <div id="contenedor_torneos">

                        <?php if(count($temporada->torneos) > 0): ?>
                            <table class="table">
                                <thead>
                                <th>Nombre</th>
                                <th>Inicio</th>
                                <th>Fin</th>
                                <th>Cant. Equipos</th>
                                <th>Tipo</th>
                                <th>Operaciones</th>
                                </thead>
                                <tbody>
                                <?php foreach($temporada->torneos as $torneo): ?>
                                    <tr id="torneo_id_<?php echo e($torneo->id); ?>">
                                        <td><?php echo e($torneo->nombre); ?></td>
                                        <td><?php echo e($torneo->inicio->format('d/m/Y')); ?></td>
                                        <td><?php echo e($torneo->fin->format('d/m/Y')); ?></td>
                                        <td>Posee <?php echo e($torneo->equipos->count()); ?> Equipos</td>
                                        <td><?php echo e($torneo->tipoTorneo->nombre); ?></td>
                                        <td>

                                            <a class="manita " href="<?php echo e(url('/admin/'.$torneo->tipoTorneo->nombre.'/'.$torneo->id)); ?>">Administrar</a>

                                            <span class="separador"></span>

                                            <a class="manita delete" data-toggle="modal" data-target="#myModal" data-link="/admin/<?php echo e($torneo->tipoTorneo->nombre); ?>/<?php echo e($torneo->id); ?>/deleteMsg">Eliminar</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <div class="alert alert-info">
                                Esta Temporada no posee Torneos
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>

    <?php else: ?>
        <div class="alert alert-danger">
            Falta pasar el Temporada
        </div>
    <?php endif; ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    @parent
    <script>
        cargarSelect2();
        cargarSelectCategoria();
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.competencia.root', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>