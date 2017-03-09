<div class="col-form">
    <div class="centered">
        <h3>Nuevo Estadio</h3>
    </div>

    <ul class="nav nav-tabs nav-pills nav-justified">
        <li><a data-toggle="tab" href="#creat_estadio">Estadio</a></li>
        <li><a data-toggle="tab" href="#creat_predio">Predio </a></li>
    </ul>

    <!-- Centered Pills -->
    <div class="tab-content">
        <div id="creat_estadio" class="tab-pane ">

            {{Form::open(array("onsubmit"=>"return false;"))}}
            {{Form::token()}}

            {{Form::hidden('equipo_id',$equipo->id)}}
            {{Form::hidden('tipo','estadio')}}

            <div class="form-group">
                {{Form::label("nombre")}}
                {{Form::text('nombre',null,array('class'=>'form-control'))}}
            </div>

            <div class="form-group">
                {{Form::label("alias")}}
                {{Form::text('alias',null,array('class'=>'form-control'))}}
            </div>

            <div class="form-group">
                {{Form::label("capasidad")}}
                {{Form::text('capasidad',null,array('class'=>'form-control'))}}
            </div>

            <div class="form-group">
                {{Form::label("iluminado")}}
                {{Form::text('iluminado',null,array('class'=>'form-control'))}}
            </div>

            <div class="form-group">
                {{Form::label("arquitectos")}}
                {{Form::text('arquitectos',null,array('class'=>'form-control'))}}
            </div>

            <div class="form-group">
                {{Form::label("dueños")}}
                {{Form::text('dueños',null,array('class'=>'form-control'))}}
            </div>

            <div class="form-group">
                {{Form::label("inauguracion")}}
                {{Form::text('inauguracion',null,array('class'=>'form-control'))}}
            </div>

            @include('otros.direccion.direccion')

            <div class="centered">
                <a class="btn btn-primary save_ajax" data-link="/estadio">Guardar</a>
            </div>


            {{Form::close()}}
        </div>




        <div id="creat_predio" class="tab-pane fade">

            {{Form::open(array("onsubmit"=>"return false;"))}}
            {{Form::token()}}

            {{Form::hidden('tipo','predio')}}
            {{Form::hidden('equipo_id',$equipo->id)}}

            <div class="form-group">
                {{Form::label("nombre")}}
                {{Form::text('nombre',null,array('class'=>'form-control'))}}
            </div>

            <div class="form-group">
                {{Form::label("iluminado")}}
                {{Form::text('iluminado',null,array('class'=>'form-control'))}}
            </div>

            @include('otros.direccion.direccion')

            <div class="centered">
                <a class="btn btn-primary save_ajax" data-link="/estadio">Guardar</a>
            </div>

            {{Form::close()}}
        </div>
    </div>

</div>