<div class="centered">
    {{Form::open(array('url'=>url('imagen/recortar'),'files'=>true,'onsubmit'=>"return checSelect();"))}}
    <div class="form-group">
        {{Form::label('Seleccionar Imagen')}}
        {{Form::file('imagen',array('id'=>'imagen'))}}
    </div>

    {{Form::submit('Cortar',array('class'=>'btn btn-primary'))}}

    {{Form::close()}}
</div>