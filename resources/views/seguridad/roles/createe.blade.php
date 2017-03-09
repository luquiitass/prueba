<div class="well bg-success">
    Rol Nuevo
    <form id="form_rol">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" name="nombre" class="form-control">
        </div>

        <div class="form-group">
            <label for="">descripcion</label>
            <textarea type="text" name="descripcion" class="form-control"></textarea>
        </div>
        <a class="saveForm btn btn-primary btn-block" data-link="/rol/store" data-form="form_rol"> Crear</a>

    </form>
</div>