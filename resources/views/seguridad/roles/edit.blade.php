@extends('layouts.app'){{--Extiende del blade app--}}

@section('titulo','Seguridad')

@section('htmlheader')
    @parent
    {{--Vincular los css--}}

    <style>
        #div_permisos{
            max-height: 500px;
            overflow: auto;
        }

    </style>

@endsection

@section('menu_parametros','active')

@section('menu2_seguridad','active')


@section('main-content')

    <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
            <div class="well">
                <h3 class="">Editar Rol</h3>
                {{Form::open(array('url'=>url('rol/'.$role->id.'/update')))}}
                {{Form::token()}}
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            {{Form::label('nombre')}}
                            {{Form::text('nombre',$role->name, array('class' =>'form-control'))}}
                        </div>

                        <div class="form-group">
                            {{Form::label('slug')}}
                            {{Form::text('slug',$role->slug, array('class' =>'form-control'))}}
                        </div>

                        <div class="form-group">
                            {{Form::label('descripcion')}}
                            {{Form::textArea('descripcion',$role->description, array('class' =>'form-control'))}}
                        </div>
                    </div>
                    <div id="div_permisos" class="col-xs-6">
                        Permisos
                        @foreach($permisos as $permiso)
                            <div class="box" style="padding-left: 5px;">
                                {{Form::checkbox('permisos['.$permiso->id.']',$permiso->name,$role->has($permiso->id))}}
                                {{Form::label($permiso->name)}}
                            </div>
                        @endforeach
                    </div>
                </div>


                {{Form::submit('Modificar',array('class'=>'btn btn-primary'))}}

                {{Form::close()}}
            </div>
        </div>
    </div>

@endsection



@section('scripts')
    @parent

    <script>

    </script>

@endsection