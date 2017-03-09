<div>
    <div class="dropdown" >
        <div class="title">
            Seleccione tipo de Torneo
        </div>
        <button class="dropbtn radius_4p" style="padding-right: 20px;padding-left: 20px;">
                Liga
            <span class="caret"></span>
        </button>
        <ul class="dropdown-content">
            <ul class="list-group list-unstyled">
                <li><a data-toggle="tab" href="#liga">Liga</a></li>
                <li><a data-toggle="tab" href="#copa">Copa</a></li>
                <li><a data-toggle="tab" href="#desafio">Desafio</a></li>
            </ul>
        </ul>
    </div>
    <hr>

    <div class="tab-content">
        <div id="liga" class="tab-pane fade in active">
            <div class="centered">
                <h3>Liga</h3>
                <img src="<?php echo e(asset('img/liga.jpg')); ?>" height="300px" title="Imagen de una liga">
            </div>
            <p class="text-center">
                Explicacion copada de xq una liga
            </p>
            <hr>
            <div class="text-center">
                <a class="manita disabled edit " data-toggle="modal" data-target="#myModal" data-link="/admin/liga/create?temporada=<?php echo e($temporada->id); ?>">Siguiente</a>
            </div>

        </div>
        <div id="copa" class="tab-pane fade">
            <div class="centered">
                <h3>Copa</h3>
                <img src="<?php echo e(asset('img/copa.jpg')); ?>" height="300px" title="Imagen de una liga">
            </div>
            <p class="text-center">
                Explicacion copada de xq una copa
            </p>
            <hr>
            <div class="text-center">
                <a class="manita disabled">Atras</a>
                <span class="separador"></span>
                <a class="manita disabled">Siguiente</a>

            </div>
        </div>
        <div id="desafio" class="tab-pane fade">
            <div class="centered">
                <h3>Desafio</h3>
                <img src="<?php echo e(asset('img/desafio.png')); ?>" height="300px" title="Imagen de una liga">
            </div>
            <p class="text-center">
                Explicacion copada de xq una liga
            </p>
            <hr>
            <div class="text-center">
                <a class="manita disabled edit " data-toggle="modal" data-target="#myModal" data-link="/admin/liga/create?temporada=<?php echo e($temporada->id); ?>">Siguiente</a>
            </div>
        </div>
    </div>
</div>