<?php /*Extiende del blade app*/ ?>

<?php $__env->startSection('titulo','Competencias'); ?>

<?php $__env->startSection('htmlheader'); ?>
    @parent
    <?php /*Vincular los css*/ ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu_competencias','active'); ?>

<?php $__env->startSection('menu2_admCompetencias','active'); ?>


<?php $__env->startSection('main-content'); ?>
    <h3>Competencias</h3>
    <a class="btn btn-primary manita edit" data-toggle="modal" data-target="#myModal" data-link="/admin/competencia/create" style="margin-bottom: 10px;">Nueva Competencia</a>
    <table class="table table-striped table-bordered" style="background-color: white">
        <thead>
        <th>Nombre</th>
        <th>Administrador</th>
        <th>CAnt. Temporadas</th>
        <th>Operaciones</th>
        </thead>
        <tbody>
        <?php $__empty_1 = true; foreach($competencias as $competencia): $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($competencia->nombre); ?></td>
                <td>
                    <?php if($competencia->users->count()>0): ?>
                        <?php echo e($competencia->users->implode('email',' , ')); ?>

                    <?php else: ?>
                        Sin administrador
                    <?php endif; ?>
                </td>
                <td><?php echo e(count($competencia->temporadas)); ?></td>
                <td>
                    <a class="btn btn-info" href="<?php echo e(route('admin.competencia.show',['competencia'=>$competencia->id])); ?>">Ver</a>
                    <a class="btn btn-success edit" data-toggle="modal" data-target="#myModal" data-link="/admin/competencia/<?php echo e($competencia->id); ?>/edit">Editar</a>
                    <a class="btn btn-danger delete" data-link="/admin/competencia/<?php echo e($competencia->id); ?>/deleteMsg" data-toggle="modal" data-target="#myModal" >Eliminar</a>
                </td>
            </tr>
        <?php endforeach; if ($__empty_1): ?>
            <tr>
                <td colspan="4">
                    sin competencias
                </td>
            </tr>
        <?php endif; ?>

        </tbody>
    </table>


<?php $__env->stopSection(); ?>



<?php $__env->startSection('scripts'); ?>
    @parent

    <script>

    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>