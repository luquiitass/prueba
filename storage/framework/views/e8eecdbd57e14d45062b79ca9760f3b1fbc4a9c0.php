<?php $__env->startSection('admin_competencia_migas'); ?>
    <li><a href="#"><i class="fa fa-dashboard"></i> Configuraciones</a></li>
    <li class="active">Competencia <?php echo e($competencia->nombre); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('admin_competencia_content'); ?>

    <?php if(isset($competencia)): ?>
        <div class="resaltar bg-info" id="cong_general_general">
            <div class="resaltar bg-white">
                <h3>Nombre: <strong><?php echo e($competencia->nombre); ?></strong></h3>
                <p><strong>Descripción: </strong><?php echo e($competencia->descripcion); ?></p>
                <p><strong>Administrador/es: </strong><?php echo e($competencia->users->implode('email',', ')); ?></p>
                <p><strong>Número de temporadas: </strong><?php echo e(count($competencia->temporadas)); ?></p>

                <div>
                    <a class="btn btn-primary create" data-toggle="collapse" href="#collapse_competencia_editar">Editar Datos</a>
                    <div class="collapse" id="collapse_competencia_editar">
                        <div class="" id="contenedor_editar_competencia">
                            <div class="bg-white resaltar">
                                <a  data-toggle="collapse" href="#collapse_competencia_editar" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                                <?php echo $__env->make('admin.competencia.comp_edit',compact('competencia'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php ($temporadas = $competencia->temporadas); ?>

        <div class="resaltar bg-info" id="temporadas">
            <div class="resaltar bg-white">
                <h3>Temporadas</h3>
                <?php if(!empty($temporadas)): ?>
                        <a class="btn btn-primary create" data-toggle="collapse" href="#collapse_temporada_nueva">Nueva Temporada</a>
                        <div class="collapse" id="collapse_temporada_nueva">
                            <div class="resaltar" id="contenedor_nueva_temporada">
                                <a  data-toggle="collapse" href="#collapse_temporada_nueva" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                                <?php echo $__env->make('admin.temporada.comp_create',compact('competencia'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </div>
                        </div>
                        <hr>
                        <?php if(count($temporadas) > 0): ?>
                            <table class="table">
                            <thead>
                            <th>N°</th>
                            <th>Nombre</th>
                            <th>Estado</th>
                            <th>Inicio</th>
                            <th>Fin</th>
                            <th>N° Torneos</th>
                            <th class="text-center">Operaciones</th>
                            </thead>
                                <?php for($i=0;$i < count($temporadas); $i++): ?>
                                    <tr id="temporada_<?php echo e($temporadas->all()[$i]->id); ?>">
                                        <td>
                                            <?php echo e(count($temporadas) - $i); ?>

                                        </td>
                                        <td style="padding-right: 20px">
                                            <?php echo e($temporadas->all()[$i]->nombre); ?>

                                            <?php echo e($temporadas->all()[$i]->sub>1?"-".$temporadas->all()[$i]->sub:''); ?>

                                        </td>
                                        <td>
                                            <?php echo e($temporadas->all()[$i]->str_activo()); ?>

                                        </td>
                                        <td>
                                            <?php echo e($temporadas->all()[$i]->inicio_con_formato()); ?>

                                        </td>
                                        <td>
                                            <?php echo e($temporadas->all()[$i]->fin_con_formato()); ?>

                                        </td>
                                        <td>
                                            <?php echo e(count($temporadas->all()[$i]->torneos)); ?>

                                        </td>
                                        <td class="centered">
                                            <a class="manita" href="<?php echo e(url('/admin/temporada/'.$temporadas->all()[$i]->id)); ?>">Administrar</a>
                                            <span class="separador"></span>
                                            <?php /*<a class="manita edit" data-toggle="modal" data-target="#myModal" data-link="/temporada/<?php echo e($temporadas->all()[$i]->id); ?>/edit" href="">Editar</a>*/ ?>
                                            <?php /*<span class="separador"></span>*/ ?>
                                            <a class="manita delete" data-toggle="modal" data-target="#myModal" data-link="/admin/temporada/<?php echo e($temporadas->all()[$i]->id); ?>/deleteMgs" href="">Eliminar</a>

                                        </td>
                                    </tr>
                                <?php endfor; ?>
                            </table>

                        <?php else: ?>
                            <div class="alert alert-warning">
                                Sin temporadas
                            </div>
                        <?php endif; ?>
                <?php else: ?>
                    <div class="alert bg-info">
                        <p> <i class="fa fa-thumbs-o-up"></i>  Felicidades ya se ha creado su competencia.</p>
                        <p>El siguiente paso es crear una nueva temporada para esta competencia</p>
                    </div>

                    <a class="btn btn-primary create" data-toggle="collapse" href="#collapse_temporada_nueva">Nueva Temporada</a>
                    <div class="collapse" id="collapse_temporada_nueva">
                        <div class="resaltar" id="contenedor_nueva_temporada">
                            <a  data-toggle="collapse" href="#collapse_temporada_nueva" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                            <?php echo $__env->make('temporada.comp_create',compact('competencia'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                    </div>
                    <hr>
                <?php endif; ?>
            </div>
    </div>
    <?php else: ?>
        falta pasar la competencia
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
@parent
    <script>
        cargarSelect2();
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.competencia.root', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>