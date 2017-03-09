@if(isset($equipo))
    <div>
        <div class="col-form">
            <div class="">
                <h3>
                    Editar Datos de Equipo
                    @include('otros.switch_edit_form')
                </h3>
            </div>

            {{Form::open(array('id'=>'form_edit_equipo'))}}
            {{Form::token()}}

            <div class="form-group">
                {{Form::label('nombre')}}
                {{Form::text('nombre',$equipo->nombre,array('class'=>'form-control'))}}
            </div>

            <div class="form-group">
                {{Form::label('alias')}}
                {{Form::text('alias',$equipo->alias,array('class'=>'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('fundado')}}
                {{Form::text('fundado',$equipo->fundado,array('class'=>'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('fundadores')}}
                {{Form::text('fundadores',$equipo->fundadores,array('class'=>'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('descripción')}}
                {{Form::textArea('descripcion',$equipo->descripcion,array('class'=>'form-control'))}}
            </div>

            <div class="centered">
                <a class="btn btn-primary save_edit" data-link="/equipo/{{$equipo->id}}">Modificar</a>
            </div>
            {{Form::close()}}
        </div>
    </div>
@endif