@if(!isset($equipo) && !isset($jugador))
    <div class="alert alert-danger">Falta pasar el equipo o jugador</div>
@else
    <div>
        <div>
            <div class="centered">
                <h3>Modificar jugador</h3>
            </div>
            <hr>

            {{Form::open(array('id'=>'form_edit_jugador'))}}

            @if(!is_null($jugador->user_id))
                <div class="alert alert-info">
                    <p>Este jugador fue asignado a un usuario, Usted puede modificar solo la "posición" y el "número" del jugador.</p>
                </div>
            @endif

            {{Form::hidden('equipo_id',$equipo->id)}}

            {{Form::hidden('user_id',$jugador->id)}}

            <div class="row-fluid">

                @include('imagen.perfil.imagen_perfil',['foto'=>$jugador->getFotoPerfilThumb()])


                <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                        {{Form::label('nombre')}}
                        {{Form::text('nombre',$jugador->nombre,array('class'=>'form-control'))}}
                    </div>

                    <div class="form-group">
                        {{Form::label('apellido')}}
                        {{Form::text('apellido',$jugador->apellido,array('class'=>'form-control'))}}
                    </div>
                    <div class="form-group">
                        {{Form::label('alias')}}
                        {{Form::text('alias',$jugador->alias,array('class'=>'form-control'))}}
                    </div>
                    <div class="form-group">
                        {{Form::label('altura')}}
                        {{Form::text('altura',$jugador->altura,array('class'=>'form-control'))}}
                    </div>
                </div>


                <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                        {{Form::label('peso')}}
                        {{Form::text('peso',$jugador->peso,array('class'=>'form-control'))}}
                    </div>
                    <div class="form-group">
                        {{Form::label('Fecha nacimiento')}}
                        {{Form::text('fecha_nacimiento',$jugador->fecha_nacimiento,array('class'=>'form-control datepicker'))}}
                    </div>

                    <div class="form-group">
                        {{Form::label('posición')}}
                        {{Form::select('posicion_id',App\Posicion::forSelect(),App\Posicion::forSelect()['seleccionar'],array('class'=>'form-control'))}}
                    </div>

                    <div class="form-group">
                        {{Form::label('numero')}}
                        {{Form::select('numero',$equipo->getNumerosDisponibles($jugador->numero),$jugador->numero,array('class'=>'form-control'))}}
                    </div>
                </div>
            </div>


            <div class="centered">
                <a id="btn-guardar" class="btn btn-primary save_edit" data-link="/jugador/{{$jugador->id}}">Modificar</a>
            </div>

            {{Form::close()}}
        </div>
    </div>
    @if(is_null($jugador->user_id))
        <script>sinUsuario('#form_edit_jugador')</script>
    @else
        <script>conUsuario('#form_edit_jugador')</script>
    @endif

@endif