@if(!isset($equipo))
    <div class="alert alert-danger">Falta pasar el equipo</div>
@else
    <div>
        <div>

            {{Form::open(array('id'=>'form_create_jugador'))}}

            <div class="resaltar">
                <h4>Asignar usuario</h4>
                <div class="alert alert-info">
                    <p>Si asigna este jugador a un usuario,los datos del mismo se auto completaran y podrán ser modificados por el mismo mas tarde</p>
                </div>

                <div class="input-group" style="width: 80%;margin: auto;">
                    <input style="width: 100%" type="text" class="form-control autocomplete"  name="country" id="" placeholder="Nombre, Apellido o Email"data-link="/usersSelect" data-form="#form_create_jugador"/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div><!-- /input-group -->
            </div>


                {{Form::hidden('equipo_id',$equipo->id)}}

                {{Form::hidden('user_id',null)}}

                <div class="row-fluid">

                    <div class="col-xs-12 centered">
                        <a id="" class="btn btn-warning con_usuario" onclick="conUsuario('#form_create_jugador');">con usuario</a>
                        <a id="" class="btn btn-warning sin_usuario" onclick="sinUsuario('#form_create_jugador')">sin usuario</a>
                    </div>

                    <hr>

                    @include('crop.perfil.imagen')

                    <div class="col-xs-12 col-md-6">

                        <div class="form-group">
                            {{Form::label('nombre')}}
                            {{Form::text('nombre',null,array('class'=>'form-control'))}}
                        </div>

                        <div class="form-group">
                            {{Form::label('apellido')}}
                            {{Form::text('apellido',null,array('class'=>'form-control'))}}
                        </div>
                        <div class="form-group">
                            {{Form::label('alias')}}
                            {{Form::text('alias',null,array('class'=>'form-control'))}}
                        </div>
                        <div class="form-group">
                            {{Form::label('altura')}}
                            {{Form::text('altura',null,array('class'=>'form-control'))}}
                        </div>
                    </div>


                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            {{Form::label('peso')}}
                            {{Form::text('peso',null,array('class'=>'form-control'))}}
                        </div>
                        <div class="form-group">
                            {{Form::label('Fecha nacimiento')}}
                            {{Form::text('fecha_nacimiento',null,array('class'=>'form-control datepicker'))}}
                        </div>

                        <div class="form-group">
                            {{Form::label('posición')}}
                            {{Form::select('posicion_id',App\Posicion::forSelect(),App\Posicion::forSelect()['seleccionar'],array('class'=>'form-control'))}}
                        </div>

                        <div class="form-group">
                            {{Form::label('numero')}}
                            {{Form::select('numero',$equipo->getNumerosDisponibles(),null,array('class'=>'form-control'))}}
                        </div>
                    </div>
                </div>


                <div class="centered">
                    <a id="btn-guardar" class="btn btn-primary save_ajax" data-link="/jugador/{{$equipo->id}}">Guardar</a>
                </div>

            {{Form::close()}}
        </div>
    </div>
    <script>conUsuario('#form_create_jugador');</script>

@endif