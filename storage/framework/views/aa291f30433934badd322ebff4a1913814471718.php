<div class="form-group">
    <?php echo e(Form::label('Equipos')); ?>

    <?php echo e(Form::select('equipos[]',isset($equipos)?$equipos:array(),null,array('class'=>'form-control  select2','multiple'=>'multiple','data-id_selects'=>json_encode(isset($eq)?$eq:array()),'data-holder'=>'Nombre o Alias','data-url'=>'/equiposSelect2/'.$torneo->id,'data-consultas'=>''))); ?>

    <p style="color: #428d40;"><b>Formato:</b>Nombre Equipo (Alias) Categoria</p>
    <a class="manita edit cl-azul" data-toggle="modal" data-target="#myModal" data-link="/equiposPorCategoria?categorias=<?php echo e($torneo->categorias->implode('id',',')); ?>">Ver equpos disponibles</a>
</div>