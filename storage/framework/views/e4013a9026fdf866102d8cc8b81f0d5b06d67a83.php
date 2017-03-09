<?php $__env->startSection('subemenu_liga_resultados','active'); ?>

<?php $__env->startSection('configuraciones_liga_content'); ?>

    <div id="resultados">
        <!-- /.box-header -->
        <div class="box-body">
            <div id="carousel-example-generic" class="carousel" data-ride="">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">
                    <?php ($fechas = $liga->fechas()); ?>
                    <?php foreach($fechas as $fecha): ?>
                        <div class="item <?php echo e($fecha->id==$fechas->first()->id?'active':''); ?>">
                            <div class="centered box-header with-border">
                                <h3 class="box-title"><?php echo e($fecha->nombre); ?></h3>
                            </div>

                            <?php if(!empty($fecha->equipoLibre)): ?>
                                <div>
                                    <h3><?php echo e($fecha->equipoLibre->nombre); ?> <strong>(libre)</strong></h3>
                                </div>
                            <?php endif; ?>

                            <div class="centered borde-bottom">
                                    <?php foreach($fecha->partidos as $partido): ?>


                                        <div class="centered text-muted">
                                            Local: <?php echo e(empty($partido->equipoLocal)?'no definido':$partido->equipoLocal->nombre); ?>

                                            <a class="manita edit" data-toggle="modal" data-target="#myModal" data-link="/admin/partido/<?php echo e($partido->id); ?>/editEquipoLocal"> <i class="fa fa-home" data-toggle="tooltip" title="Modificar equipo Local"></i></a>
                                        </div>

                                        <div class="centered text-muted">
                                            <?php echo e($partido->date()); ?> <?php echo e($partido->time()); ?>

                                            <a class="delete manita" data-toggle="modal" data-target="#myModal" data-link="/admin/partido/<?php echo e($partido->id); ?>/editFechaHora" ><i class="fa fa-calendar" data-toggle="tooltip" title="Modificar fecha y hora"></i> <i class="fa fa-clock-o" data-toggle="tooltip" title="Modificar fecha y hora"></i></a>
                                        </div>

                                        <?php echo $__env->make('admin.partido.comp_show', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                                    <?php endforeach; ?>

                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <span class="fa fa-angle-right"></span>
                </a>
            </div>
        </div>
        <!-- /.box-body -->
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.liga.root', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>