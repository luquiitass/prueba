{{Form::open(array())}}

    <div class="form-group">
        <input type="text" name="busqueda" class="form-control input_change_ajax" data-link="/pais/buscar" placeholder="Pais, Provincia o localidad">
    </div>

    <div id="tabla_busqueda">
        <div class="alert alert-info">
            Ingrese el nombre o parte del nombre del (país/provincia/localidad) que esta buscando.
        </div>
    </div>

{{Form::close()}}