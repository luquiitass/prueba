<?php /*Extiende del blade app*/ ?>

<?php $__env->startSection('titulo','Inicio'); ?>

<?php $__env->startSection('htmlheader'); ?>
	@parent
	<?php /*Vincular los css*/ ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu_inicio','active'); ?>



<?php $__env->startSection('main-content'); ?>

	<a href="/rol" class="link btn btn-success btn-block">Probar class JSON_retoeno</a>

	<div id="id_0" class="col-xs-12">

	</div>
	<div class="row">
		<div id="id_1" class="colxs-6">

		</div>
		<div id="id_2" class="colxs-6"></div>
	</div>
	<ul class="nav">
		<li class="list-group-item-danger">success</li>
		<li class="list-group-item-success">danger</li>
	</ul>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('scripts'); ?>
	@parent

	<script>

	</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>