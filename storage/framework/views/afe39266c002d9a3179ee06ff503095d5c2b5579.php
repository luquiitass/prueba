<?php if(isset($equipo)): ?>
    <div class="user-block">
        <img class="img-circle img-bordered-sm" src="<?php echo e($equipo->foto_escudo); ?>" alt="Escudo">
        <span class="username">
            <a href="#"><?php echo e($equipo->nombre); ?></a>
        </span>
        <span class="description"><?php echo e(!empty($equipo->alias)?'Alias '.$equipo->alias:''); ?> - categoría <?php echo e($equipo->categoria->nombre); ?></span>
    </div>
<?php else: ?>
    faltaEquipo
<?php endif; ?>