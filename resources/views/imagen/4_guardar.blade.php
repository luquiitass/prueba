@extends('imagen.app_crop')

@section('htmlheader')
    @parent

@endsection

@section('content')
    <div class="page-header centered">
        <h1>Guardar imagen</h1>
    </div>

    <!-- This is the image we're attaching Jcrop to -->
    <img style="max-width: 90%" src="{{asset($ruta_imagen)}}" id="cropbox" />

    <div class="centered">
        <a href="">Guardar</a>
    </div>

@endsection

@section('scripts')
    @parent

@endsection