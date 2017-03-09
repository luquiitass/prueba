<?php $__env->startSection('subemenu_liga_caledario','active'); ?>

<?php $__env->startSection('configuraciones_liga_content'); ?>

    <div id="calendario">
        <div class="box-body">
            <div id="carousel-example-generic" class="carousel" data-ride="" data-interval="false">
                <?php ($fechas = $liga->fechas()); ?>
                <ol class="carousel-indicators">
                    <?php for($i =0 ;$i>count($fechas);$i++): ?>
                    <li data-target="#carousel-example-generic" data-slide-to="<?php echo e($i); ?>" class="<?php echo e($i==0?'active':''); ?>"    ></li>
                    <?php endfor; ?>
                </ol>
                <div class="carousel-inner">
                    <?php foreach($fechas as $fecha): ?>
                        <div class="item <?php echo e((isset($fechaActiva) && $fechaActiva->id==$fecha->id)?'active':$fecha->id==$fechas->first()->id?'active':''); ?>">

                            <div class="centered box-header with-border">
                                <h3 class="box-title"><?php echo e($fecha->nombre); ?></h3>
                                <p>
                                    <a href="">Asignar fecha a los partidos</a>
                                    <span class="separador"></span>

                                    <a href="">Editar datos de fechas</a>
                                </p>
                                <?php if(!empty($fecha->equipoLibre)): ?>
                                <div>
                                    <h3><?php echo e($fecha->equipoLibre->nombre); ?> <strong>(libre)</strong></h3>
                                </div>
                                <?php endif; ?>
                            </div>

                            <div class="centered borde-bottom">

                                    <?php foreach($fecha->partidos as $partido): ?>
                                        <div id="partido_id_<?php echo e($partido->id); ?>">
                                            <div class="centered text-muted">
                                                Local: <?php echo e(empty($partido->equipoLocal)?'no definido':$partido->equipoLocal->nombre); ?>

                                                <a class="manita edit" data-toggle="modal" data-target="#myModal" data-link="/admin/partido/<?php echo e($partido->id); ?>/editEquipoLocal"> <i class="fa fa-home" data-toggle="tooltip" title="Modificar equipo Local"></i></a>
                                            </div>

                                            <div class="centered text-muted">
                                                <?php echo e($partido->date()); ?> <?php echo e($partido->time()); ?>

                                                <a class="delete manita" data-toggle="modal" data-target="#myModal" data-link="/admin/partido/<?php echo e($partido->id); ?>/editFechaHora" ><i class="fa fa-calendar" data-toggle="tooltip" title="Modificar fecha y hora"></i> <i class="fa fa-clock-o" data-toggle="tooltip" title="Modificar fecha y hora"></i></a>
                                            </div>

                                            <?php echo $__env->make('admin.partido.comp_show', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                                            <hr>
                                        </div>
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
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.liga.root', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>