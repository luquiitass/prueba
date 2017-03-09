@extends('imagen.app_crop')

@section('htmlheader')
    @parent

@endsection

@section('content')

    <center class="resaltar">
        <h3>Seleccionar Imagen</h3>
        <hr>

        {{Form::open(array('url'=>url('imagen/recortar'),'files'=>true,'onsubmit'=>"return checSelect();"))}}
            <div class="form-group">
                {{Form::label('Seleccionar Imagen')}}
                {{Form::file('imagen',array('id'=>'imagen'))}}
            </div>

            {{Form::submit('Cortar',array('class'=>'btn btn-primary'))}}

        {{Form::close()}}
    </center>

@endsection

@section('scripts')
    @parent
    <script>
        function checSelect() {
            if ($('#imagen').val().length) return true;
            alert('Debe Seleccionar una Imagen.');
            return false;
        }
    </script>

@endsection