<div class="col-form">

    <div class="editar-switch">
        <h3>Editar Estadio
            @include('otros.switch_edit_form')
        </h3>
    </div>

    @if($estadio->tipo == 'estadio')
    <div>
        {{Form::open(array("onsubmit"=>"return false;",'id'=>'form_edit_estadio'))}}
        {{Form::token()}}

        <div class="form-group">
            {{Form::label("nombre")}}
            {{Form::text('nombre',$estadio->nombre,array('class'=>'form-control'))}}
        </div>

        <div class="form-group">
            {{Form::label("alias")}}
            {{Form::text('alias',$estadio->alias,array('class'=>'form-control'))}}
        </div>

        <div class="form-group">
            {{Form::label("capasidad")}}
            {{Form::text('capasidad',$estadio->capasidad,array('class'=>'form-control'))}}
        </div>

        <div class="form-group">
            {{Form::label("arquitectos")}}
            {{Form::text('arquitectos',$estadio->arquitectos,array('class'=>'form-control'))}}
        </div>

        <div class="form-group">
            {{Form::label("dueños")}}
            {{Form::text('dueños',$estadio->dueños,array('class'=>'form-control'))}}
        </div>

        <div class="form-group">
            {{Form::label("inauguracion")}}
            {{Form::text('inauguracion',$estadio->inauguracion,array('class'=>'form-control'))}}
        </div>

        <div class="form-group">
            {{Form::label("iluminado")}}
            {{Form::text('iluminado',$estadio->iluminado,array('class'=>'form-control'))}}
        </div>

        @include('otros.direccion.direccion')

        <div class="centered">
            <a  class="btn btn-primary save_edit" data-link="/estadio/{{$estadio->id}}">Modificar</a>
        </div>

        {{Form::close()}}
    </div>

    @else
        {{Form::open(array("onsubmit"=>"return false;",'id'=>'form_edit_estadio'))}}
        {{Form::token()}}

        <div class="form-group">
            {{Form::label("nombre")}}
            {{Form::text('nombre',$estadio->nombre,array('class'=>'form-control'))}}
        </div>

        <div class="form-group">
            {{Form::label("capasidad")}}
            {{Form::text('capasidad',$estadio->capasidad,array('class'=>'form-control'))}}
        </div>

        <div class="form-group">
            {{Form::label("iluminado")}}
            {{Form::text('iluminado',$estadio->iluminado,array('class'=>'form-control'))}}
        </div>

        @include('otros.direccion.direccion')

        <div class="centered">
            <a  class="btn btn-primary save_edit " data-link="/estadio/{{$estadio->id}}">Modificar</a>
        </div>

        {{Form::close()}}

    @endif
</div>
