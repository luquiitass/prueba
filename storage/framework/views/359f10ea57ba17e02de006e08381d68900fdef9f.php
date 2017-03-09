
<div class="centered" id="div_imagen_jcrop">
    <a class="manita alfa" data-img="img_escudo"  data-input="#input_img_escudo" data-link="/crop/escudo" onclick="init_jcrop(this);">
        <img width="128px" height="128px" id="img_escudo" src="<?php echo e(isset($foto)?$foto : asset('/img/pictures.png')); ?>">
    </a>
    <h2>Escudo del equipo</h2>
    <?php echo e(Form::hidden('img_escudo',isset($foto)?$foto :'',array('id'=>'input_img_escudo'))); ?>

</div>
