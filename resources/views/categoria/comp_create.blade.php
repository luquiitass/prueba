<div class="">
    <div class="centered">
        <h3>Nueva Categoria</h3>
    </div>

        {{Form::open(array("onsubmit"=>"return false;"))}}


        <div class="form-group">
            {{Form::label("nombre")}}
            {{Form::text('nombre',null,array('class'=>'form-control'))}}
        </div>

        <div class="centered">
            <a class="btn btn-primary save_ajax" data-link="/categoria">Guardar</a>
        </div>
            {{Form::close()}}

</div>