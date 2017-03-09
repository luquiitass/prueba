@foreach($telefonos as $telefono)
    <div class="form-group dimissable">
        <span class="glyphicon glyphicon-remove borrar"></span>
        {{Form::label("Telefono")}}
        {{Form::text('telefono[]',$telefono->numero,array('class'=>'form-control valid'))}}
    </div>
@endforeach
