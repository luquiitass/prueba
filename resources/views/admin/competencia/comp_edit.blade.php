
            <div class="">
                <h3>Modificar Competencia</h3>

                 @include('mensajes.error')

                {{Form::open()}}

                    <div class="form-group">
                        {{Form::label('nombre')}}
                        {{Form::text('nombre',$competencia->nombre,array('class'=>'form-control'))}}
                    </div>

                    <div class="form-group">
                        {{Form::label('descripción')}}
                        {{Form::textArea('descripcion',$competencia->descripcion,array('class'=>'form-control'))}}
                    </div>

                    {!! $competencia->html_selectUser() !!}
                    <div class="centered">
                        <a class="manita save_edit btn btn-primary" data-link="/admin/competencia/{{$competencia->id}}" >Modificar</a>
                    </div>

                {{Form::close()}}


            </div>
    <script>
        cargarSelect2();
    </script>