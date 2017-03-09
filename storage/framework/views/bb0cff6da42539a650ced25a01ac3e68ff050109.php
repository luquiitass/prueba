<?php if($errors->has()): ?>
	<div class="alert alert-danger">
		<?php foreach($errors->all() as $error): ?>
			<li><?php echo e($error); ?></li>
		<?php endforeach; ?>
	</div>
<?php endif; ?>