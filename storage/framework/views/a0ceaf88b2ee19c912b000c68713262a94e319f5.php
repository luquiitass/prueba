<?php echo $__env->make('imagen.incluir_librerias_jcrop', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('admin_competencia_migas'); ?>
    <li><a href="#"><i class="fa fa-dashboard"></i> Configuraciones</a></li>
    <li><a href="<?php echo e(url('/admin/competencia/'.$competencia->id)); ?>"><i class="fa fa-dashboard"></i> Competencia <?php echo e($competencia->nombre); ?></a></li>
    <li><a href="<?php echo e(url('/admin/temporada/'.$liga->temporada->id)); ?>"><i class="fa fa-dashboard"></i> Temporada <?php echo e($liga->temporada->nombre); ?></a></li>
    <li class="active">Liga <?php echo e($liga->nombre); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('admin_competencia_content'); ?>
    <?php if(isset($liga)): ?>
            <div class="resaltar bg-info" id="torneo">
                <div class="resaltar bg-white">
                    <h3><?php echo e($liga->nombre); ?></h3>
                    <p><strong>Descripción: </strong><?php echo e($liga->descripcion); ?></p>
                    <p><strong>Inicia: </strong><?php echo e($liga->inicio->format('d/m/Y')); ?></p>
                    <p><strong>Finaliza: </strong><?php echo e($liga->fin->format('d/m/Y')); ?></p>
                    <p><strong>Administrador/es: </strong><?php echo e($liga->administradores->implode('email',',  ')); ?></p>
                    <p><strong>Equipos Asociados: </strong><?php echo e($liga->equipos->count()); ?></p>
                    <p><strong>Categoría/as: </strong><?php echo e($liga->categorias->implode('nombre',',  ')); ?></p>
                    <div>
                        <a class="btn btn-primary create" data-toggle="collapse" href="#collapse_torneo_editar">Editar Datos</a>
                        <div class="collapse" id="collapse_torneo_editar">
                            <div class="" id="contenedor_editar_torneo">
                                <div class="bg-white resaltar">
                                    <?php echo $__env->make('admin.liga.comp_edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        <ul class="nav nav-tabs" id="menu">
            <?php if(!$liga->fases->count() > 0): ?>
                <li role="presentation" class="<?php echo $__env->yieldContent('subemenu_liga_configuraciones',''); ?>"><a href="<?php echo e(url('/admin/'.$liga->tipoTorneo->nombre.'/'.$liga->id)); ?>">Configuracioes</a></li>
                <li role="presentation" class="<?php echo $__env->yieldContent('subemenu_liga_equipos',''); ?>"><a href="<?php echo e(route('admin.liga.equipos',['liga'=>$liga->id])); ?>">Equipos</a></li>

            <?php else: ?>
                <li role="presentation" class="<?php echo $__env->yieldContent('subemenu_liga_tabla',''); ?>"><a href="<?php echo e(route('admin.liga.tablePosiciones',['liga'=>$liga->id,'#menu'])); ?>">Tabla de Posiciones</a></li>
                <li role="presentation" class="<?php echo $__env->yieldContent('subemenu_liga_resultados',''); ?>"><a href="<?php echo e(route('admin.liga.resultados',['liga'=>$liga->id,'#menu'])); ?>">Resultados</a></li>
                <li role="presentation" class="<?php echo $__env->yieldContent('subemenu_liga_caledario',''); ?>"><a href="<?php echo e(route('admin.liga.calendario',['liga'=>$liga->id,'#menu'])); ?>">Calendario</a></li>
                <li role="presentation" class="<?php echo $__env->yieldContent('subemenu_liga_equipos',''); ?>"><a href="<?php echo e(route('admin.liga.equipos',['liga'=>$liga->id,'#menu'])); ?>">Equipos</a></li>
                <li role="presentation" class="<?php echo $__env->yieldContent('subemenu_liga_configuraciones',''); ?>"><a href="<?php echo e(url('/admin/'.$liga->tipoTorneo->nombre.'/'.$liga->id.'#menu')); ?>">Configuracioes</a></li>
            <?php endif; ?>
        </ul>

        <div class="resaltar bg-white">
            <?php echo $__env->yieldContent('configuraciones_liga_content'); ?>
        </div>

    <?php else: ?>
        <div class="alert alert-danger">
            Falta pasar la Liga
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