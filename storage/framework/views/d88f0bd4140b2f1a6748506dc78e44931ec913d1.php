<div class="form-group">
    <?php echo e(Form::label('administrador/es')); ?>

    <?php echo e(Form::select('administradores[]',isset($users)?$users:array(),null,array('class'=>'form-control  select2','multiple'=>'multiple','data-id_selects'=>json_encode(isset($us)?$us:array()),'data-holder'=>'Buscar usuario','data-url'=>'/usersSelect2'))); ?>

</div>

<script>cargarSelect2()</script>