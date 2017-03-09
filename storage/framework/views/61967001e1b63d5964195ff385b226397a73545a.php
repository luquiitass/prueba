<?php if(isset($partido)): ?>
    <div class="border partido">
        <div style="display: inline-flex">
            <div class="eq1 inline">
                <p class="imagen_equipo">
                    <img src="<?php echo e(asset($partido->eq1_escudo)); ?>" alt="Escudo">
                    <span ><?php echo e($partido->eq1); ?></span>
                </p>
            </div>
            <?php if($partido->isPendiente()): ?>
                <div class="vs">
                    Vs
                </div>
            <?php else: ?>
                <div class="resultado">
                    4
                </div>
                <div class="vs">
                    -
                </div>
                <div class="resultado">
                    5
                </div>
            <?php endif; ?>
            <div class="eq2 inline">
                <p class="imagen_equipo">
                    <img src="<?php echo e(asset($partido->eq2_escudo)); ?>" alt="Escudo">
                    <span ><?php echo e($partido->eq2); ?></span>
                </p>
            </div>
            <br class="clearBoth">
        </div>
    </div>
<?php else: ?>
    falta pasar partido
<?php endif; ?>