<?php if(isset($tabla)): ?>
    <table id="<?php echo e($tabla->tabla_id); ?>" class="table table-hover table-striped datatable" value="<?php echo e($tabla->url); ?>" >
        <thead>
        <tr>
            <?php foreach($tabla->columnas as $columna): ?>
                <th class="col_table" data-name="<?php echo e($columna->nombre); ?>" data-searchable="<?php echo e($columna->searchable); ?>" data-ordetable="<?php echo e($columna->orderable); ?>"><?php echo e($columna->nombre_col); ?></th>
            <?php endforeach; ?>
        </tr>
        </thead>
    </table>
<?php else: ?>
    <div class="alert alert-danger">
        Falta los datos de la tabla
    </div>
<?php endif; ?>
