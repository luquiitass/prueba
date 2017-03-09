<?php $__env->startSection('htmlheader'); ?>
    @parent
    <style>
        .equipos  a{
            color: #5FA0BF;;
            text-decoration: none;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subemenu_liga_configuraciones','active'); ?>

<?php $__env->startSection('configuraciones_liga_content'); ?>
    <div>
        <?php if(!count($liga->fase())>0): ?>

            <?php if(count($liga->equipos)>0): ?>
                <?php if(count($liga->equipos) < 3): ?>
                    <div class="alert alert-info">
                        <p>
                            <i class="fa fa-info-circle"></i>
                            Como minimo esta liga debe tener 3 equipos asociados para generar el fixture
                        </p>
                        <a class="btn btn-primary" href="<?php echo e(route('admin.liga.equipos',['liga'=>$liga->id])); ?>"></a>
                    </div>
                <?php else: ?>
                    <p><i class="fa fa-thumbs-o-up"></i> Felicidades ya posee los equipos necesarios para poder generar el fixture</p>

                    <div class="alert bg-info">
                        <h4 class=""><i class=" fa fa-info-circle"></i> Importante:</h4>
                        <p><i class="cl-negro-claro fa fa-asterisk"></i>Recuerde que al generar el fixture las fechas y los partidos se generaran automaticamente </p>
                        <p><i class="cl-negro-claro fa fa-asterisk"></i>Una ves creado el fixture no se podran asociar o quitar equiposa a ésta liga </p>

                        <hr>
                        <div class="row resaltar bg-white equipos">
                            <div class="col-xs-12 col-md-6">
                                <h4>Equipos asociados</h4>
                                <table>
                                    <?php foreach($liga->equipos as $equipo): ?>
                                        <tr>
                                            <td>
                                                <?php echo $__env->make('equipo.comp_unEquipo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="centered">

                                    <a class="btn btn-app cl-negro-claro edit " data-link="/admin/liga/<?php echo e($liga->id); ?>/generarFixture">
                                        <i class="fa fa-table"></i>
                                        Generar Fixture
                                    </a>

                                </div>
                            </div>
                        </div>

                    </div>
                <?php endif; ?>
            <?php else: ?>
                <div class="alert alert-info">
                    <p>
                        <i class="fa fa-info-circle"></i>
                        Para generar el fixture de la Liga, primero de debe <a class="cl-azul" href="<?php echo e(route('admin.liga.equipos',['liga'=>$liga->id])); ?>">asociar los equipos</a>
                    </p>
                </div>

            <?php endif; ?>
        <?php else: ?>
            Otras configuraciones porque ya esta creado el fixture


        <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.liga.root', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>